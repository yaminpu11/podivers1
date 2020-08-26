<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_master extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
        $this->load->library('JWT');
    }

    public function showData_array($tabel)
    {
        $sql = "select * from ".$tabel;
        $query=$this->db->query($sql, array());
        return $query->result_array();
    }

    public function caribasedprimary($tabel,$fieldPrimary,$valuePrimary)
    {
        $sql = "select * from ".$tabel." where ".$fieldPrimary." = ?";
        $query=$this->db->query($sql, array($valuePrimary));
        return $query->result_array();
    }

    public function downloadByURL($url,$filenameRS = ''){
        $this->load->library('JWT');
        $result = ['status' => 0];
        //The resource that we want to download.
        $fileUrl = $url;
         
        //The path & filename to save to.
        $ex = explode('/', $url);
        $LastKey = count($ex) - 1 ;
        $key = "UAP)(*";
        error_reporting(0);
        try {
            $decode = $this->jwt->decode($ex[$LastKey],$key);
            $exExtension = explode('.', $decode);
        } catch (Exception $e) {
            $exExtension = explode('.', $ex[$LastKey]);
        }

        error_reporting(-1);
        if (count($exExtension) > 0) {
            $Extension = $exExtension[ count($exExtension) - 1 ];
        }
        else
        {
             $Extension = 'non';
        }
        

        $filenameRS =($filenameRS == '') ? uniqid().'.'.$Extension : $filenameRS;
        $pathFolder = FCPATH."uploads\\temp\\";
        $saveTo = $pathFolder.$filenameRS;
         
        //Open file handler.
        $fp = fopen($saveTo, 'w+');
         
        //If $fp is FALSE, something went wrong.
        if($fp === false){
            throw new Exception('Could not open: ' . $saveTo);
        }
         
        //Create a cURL handle.
        $ch = curl_init($fileUrl);
        
        // disable SSL
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_ENCODING, true);
        curl_setopt($ch, CURLOPT_AUTOREFERER, true);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 5);

        //Pass our file handle to cURL.
        curl_setopt($ch, CURLOPT_FILE, $fp);
         
        //Timeout if the file doesn't download after 20 seconds.
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
         
        //Execute the request.
        curl_exec($ch);
         
        //If there was an error, throw an Exception
        if(curl_errno($ch)){
            throw new Exception(curl_error($ch));
        }
         
        //Get the HTTP status code.
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
         
        //Close the cURL handler.
        curl_close($ch);
         
        //Close the file handler.
        fclose($fp);
        if($statusCode == 200){
            $result['status'] = 1;
            $result['URLGet'] = base_url().'uploads/temp/'.$filenameRS;
            $result['path'] = $saveTo;
            $result['filename'] = $filenameRS;
        }
        return $result; 
    }

    public function MimeType($path){
        return mime_content_type($path);
    }

    public function PostSubmitAPIWithFile($url,$post,$fileattach=[],$customPost=[])
    {

        /*
            fileattach = array(
                'file_name_with_full_path' => {any},
                'MimeType' => {any},
                'filename' => {any},
                'varfiles' => {any},
            );

            $customPost = [
                'get' => $Apikey,   // value = '?apikey='.Apikey,
                'header' => [
                    'Hjwtkey' => $Hjwtkey,
                ],
                
            ];


        */

        $header[] = "Content-type: multipart/form-data";
        $header[] = "Origin: ".base_url()."";
        $header[] = "Cache-Control: max-age=0";
        $header[] = "Connection: keep-alive";
        $header[] = "Accept-Language: en-US,en;q=0.8,id;q=0.6";

        if (!empty($customPost) && array_key_exists('get', $customPost)) {
            $url = $url.$customPost['get'];
            if (array_key_exists('header', $customPost)) {
                $headerpost = $customPost['header'];
                foreach ($headerpost as $key => $value) {
                    $header[] = $key.':'.$value;
                }
            }
        }

        $ch = curl_init();
        $token = $this->jwt->encode($post,"UAP)(*");
        $Input = $token;
        $new_post_array  = ['token' => $Input];
        if (!empty($fileattach)) {
            $cfile = new CURLFile($fileattach['file_name_with_full_path'], $fileattach['MimeType'],$fileattach['filename']);
            $post = $new_post_array + array($fileattach['varfiles'].'[]' => $cfile);
        }
        else
        {
            $post = $new_post_array;
        }
        // print_r($post);die();

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_VERBOSE, false);
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $pr = curl_exec($ch);
        // print_r($pr);die();
        $rs = (array) json_decode($pr,true);
        curl_close ($ch);
        return $rs;
    }

    public function is_url_exist($url){
        $urlCheck = parse_url($url);

        if($urlCheck['scheme'] == 'https'){
           $arrContextOptions=array(
               "ssl"=>array(
                   "verify_peer"=>false,
                   "verify_peer_name"=>false,
               ),
           );
           if(@file_get_contents($url,0,stream_context_create($arrContextOptions)))
           {
               return true;
           }
           else
           { 
               return false;
           }
        }
        else
        {
            $urlGet=getimagesize($url);

            if(!is_array($urlGet))
            {
                return false;
                 // The image doesn't exist
            }
            else
            {
                return true;
                 // The image exists
            }
        }
    }

    public function getEmployeeByDepartment($IDDivision)
    {
        $sql = "select * from db_employees.employees
                where ( 
                        SPLIT_STR(PositionMain, '.', 1) = ?  or 
                        SPLIT_STR(PositionOther1, '.', 1) = ? or
                        SPLIT_STR(PositionOther2, '.', 1) = ? or
                        SPLIT_STR(PositionOther3, '.', 1) = ?
                      ) 
                      and StatusEmployeeID != -1
                ";
        $query=$this->db->query($sql, array($IDDivision,$IDDivision,$IDDivision,$IDDivision))->result_array();
        return $query;
    }


}
