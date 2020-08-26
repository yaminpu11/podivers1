<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_portal extends MY_Controller {
    private $data = [];
    function __construct()
    {
        parent::__construct();
        $this->data['G_biodata'] = $this->m_master->caribasedprimary('db_alumni.biodata','NPM',$this->session->userdata('alumni_NPM'));
    }

    private function left_menu_profile($page){

        $data['page'] = $page;
        $content = $this->load->view('portal/profile/left_menu',$data,true);
        parent::template_portal($content);
    }

    public function profile(){

        $page = $this->load->view('portal/profile/profile',$this->data,true);
        $this->left_menu_profile($page);
    }

    public function about_me(){
        $page = $this->load->view('portal/profile/about_me',$this->data,true);
        $this->left_menu_profile($page);
    }

    public function biodata(){
        $this->data['LoadSelectCountry'] = $this->m_master->caribasedprimary('db_admission.country','ctr_active',1);
        $page = $this->load->view('portal/profile/biodata',$this->data,true);
        $this->left_menu_profile($page);
    }

    public function education(){
        $page = $this->load->view('portal/profile/education','',true);
        $this->left_menu_profile($page);
    }

    public function skills(){
        $page = $this->load->view('portal/profile/skills','',true);
        $this->left_menu_profile($page);
    }



    public function work_experience(){
        $page = $this->load->view('portal/profile/work_experience','',true);
        $this->left_menu_profile($page);
    }

    public function setting(){
        $page = $this->load->view('portal/profile/setting','',true);
        $this->left_menu_profile($page);
    }

    public function get_picture(){
        $urlImageDefault = base_url().'images/icon/alumni.png';
        $urlImage = url_server_ws;
        // $urlImage = url_server_live;
        $urlImageStd = $urlImage.'uploads/students/ta_'.$this->session->userdata('alumni_ClassOf').'/'.$this->session->userdata('alumni_Photo');
        if ($this->m_master->is_url_exist($urlImageStd)) {

            // check data photo alumni ada atau tidak
            $G_dt = $this->data['G_biodata'];
            if (count($G_dt) > 0  && ($G_dt[0]['Photo'] != '' && $G_dt[0]['Photo'] != NULL )  ) {
                $urlImageAlumni= $urlImage.'uploads/document/'.$this->session->userdata('alumni_NPM').'/'.$G_dt[0]['Photo'];
                if ($this->m_master->is_url_exist($urlImageAlumni)) {
                        $urlImageStd = $urlImageAlumni;
                }
            }
           
        }
        else
        {
            // check data photo alumni ada atau tidak
            $G_dt = $this->data['G_biodata'];
            if (count($G_dt) > 0  && ($G_dt[0]['Photo'] != '' && $G_dt[0]['Photo'] != NULL )  ) {
                $urlImageAlumni= $urlImage.'uploads/document/'.$this->session->userdata('alumni_NPM').'/'.$G_dt[0]['Photo'];
                if ($this->m_master->is_url_exist($urlImageAlumni)) {
                    $urlImageStd = $urlImageAlumni;
                }
            }
            else
            {
                $urlImageStd = $urlImageDefault;
            }
        }

        $arrContextOptions=array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        );  
        $response = file_get_contents($urlImageStd, false, stream_context_create($arrContextOptions));
        $imageData = base64_encode($response);
        // echo '<img src="data:image/jpeg;base64,'.$imageData.'" style="max-width: 90px;">';
        echo $imageData;

    }

    public function detail_topic($token){
        $urlDecode = $this->decodeToken($token);
    }

}
