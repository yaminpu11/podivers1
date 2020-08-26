<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_branda extends CI_Model{

	public function __construct()
    {
        parent::__construct();
        // Load database prodi
        $this->load->library('JWT');
        
    }

    private function getInputToken2()
    {
        $token = $this->input->post('token');
        $key = "UAP)(*";
        $data_arr = (array) $this->jwt->decode($token,$key);
        return $data_arr;
    }
	
	public function is_url_exist($url){
	    $ch = curl_init($url);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($ch, CURLOPT_NOBODY, true);
	    curl_exec($ch);
	    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

	    if($code == 200){
	        $status = true;
	    }else{
	        $status = false;
	    }
	    curl_close($ch);
	    return $status;
	}

	public function getTestimonial(){
		$hasil= $this->db->query('select tes.Testimony,tes.NPM ,auns.Name 
                from db_alumni.testimony tes
                INNER JOIN db_academic.auth_students as auns 
                on auns.npm=tes.NPM 
                where tes.Status=1
                order by tes.ID desc limit 28');
		return $hasil->result_array();	
	}

    public function getNewsBloglimit (){
    	$hasil= $this->db->query('select * from db_blogs.article as art
                LEFT JOIN db_blogs.set_group as sg on (art.ID_set_group = sg.ID_set_group)
                where art.ID_set_group=3 AND art.status="Published"
                order by art.ID_title desc limit 12')->result();

		// return $hasil->result();

		for ($i=0; $i < count($hasil); $i++) { 
			$hasil[$i]->CreateAT=date("d M, Y", strtotime($hasil[$i]->CreateAT));
			$string=$hasil[$i]->Title;
	        $replace = '-';         
	        $string = strtolower($string);     
	        //replace / and . with white space     
	        $string = preg_replace("/[\/\.]/", " ", $string);     
	        $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);     
	        //remove multiple dashes or whitespaces     
	        $string = preg_replace("/[\s-]+/", " ", $string);     
	        //convert whitespaces and underscore to $replace     
	        $string = preg_replace("/[\s_]/", $replace, $string);

	        $slug=$string;
	        $hasil[$i]->SEO_title=$slug;
			$url=url_blog_admin.'upload/'.$hasil[$i]->Images;
			
			$cek=$this->is_url_exist($url);
			if(!$cek){
				$hasil[$i]->Images='default.png';
			}

		}

		return $hasil;	
    }

    public function getDataContent($type){		
		
        $data_arr = $this->getInputToken2();
        $IDType = $data_arr['type'];

        $sql = 'select ci.* from db_alumni.alumni_content_index AS ci
                WHERE ci.SegmentMenu="'.$IDType.'" ';
        $query=$this->db->query($sql, array())->result_array();
        $idindex = $query[0]['ID'];
        
        // print_r($IDType).die();
        if($IDType=='event'){

            $data = $this->db->query('SELECT c.* , ci.SegmentMenu , e.Name
            FROM db_alumni.alumni_content c 
            LEFT JOIN db_alumni.alumni_content_index ci ON (ci.ID = c.IDindex)
            LEFT JOIN db_employees.employees e ON (e.NIP=c.CreateBy)
            WHERE c.IDindex ='.$idindex.' and c.Status="Yes" ORDER BY c.AddDate ASC')->result_array();

        }else{
            $data = $this->db->query('SELECT c.*, ci.SegmentMenu , e.Name
            FROM db_alumni.alumni_content c 
            LEFT JOIN db_alumni.alumni_content_index ci ON (ci.ID = c.IDindex)
            LEFT JOIN db_employees.employees e ON (e.NIP=c.CreateBy)
            WHERE c.IDindex ='.$idindex.' and c.Status="Yes" ')->result_array();
        }        

        for ($i=0; $i < count($data); $i++) {
            $string=$data[$i]['TitleContent'];
            $replace = '-';         
            $string = strtolower($string);     
            //replace / and . with white space     
            $string = preg_replace("/[\/\.]/", " ", $string);     
            $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);     
            //remove multiple dashes or whitespaces     
            $string = preg_replace("/[\s-]+/", " ", $string);     
            //convert whitespaces and underscore to $replace     
            $string = preg_replace("/[\s_]/", $replace, $string);

            $slug=$string;
            $data[$i]['SEO_title']=$slug;
            // print_r($data);die();
            // $url=url_blog_admin.'upload/alumni'.$data[$i]['File'];
            // $cek=$this->is_url_exist($url);
            //     if(!$cek){
            //         $data[$i]['File']='Default.png';
            //     }
            
        }
        // print_r($data);die();
        return $data;
	}


    public function GetDataContentDetails($type,$ID){
        $data_arr = $this->getInputToken2();
        $IDType = $data_arr['type'];
        $ID = $data_arr['ID'];

        $sql = 'select ci.* from db_alumni.alumni_content_index AS ci
                WHERE ci.SegmentMenu="'.$IDType.'" ';
        $query=$this->db->query($sql, array())->result_array();
        $idindex = $query[0]['ID'];
        
        // print_r($IDType).die();
        $data = $this->db->query('SELECT c.* , ci.SegmentMenu , e.Name
            FROM db_alumni.alumni_content c 
            LEFT JOIN db_alumni.alumni_content_index ci ON (ci.ID = c.IDindex)
            LEFT JOIN db_employees.employees e ON (e.NIP=c.CreateBy)
            WHERE c.ID_Content="'.$ID.'" and c.IDindex ='.$idindex.' and c.Status="Yes" ')->result_array();
        return $data;
    }

    
}

?>