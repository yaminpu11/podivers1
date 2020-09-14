<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_master');
        if($this->session->userdata('podivers_loggedIn')){
            date_default_timezone_set('Asia/Jakarta');
        } 
        else {
            redirect(url_sign_out);
        }
        
    }

    public function template_portal($content)
    {
        $data['content'] = $content;
        $this->load->view('portal/template',$data);
    }

    public function getDateTimeNow(){
        $dataTime = date('Y-m-d H:i:s') ;
        return $dataTime;
    }

    public function getTimeNow(){
        $dataTime = date('Y-m-d H:i:s') ;
        return $dataTime;
    }

    public function getDateNow(){
        $dataTime = date('Y-m-d') ;
        return $dataTime;
    }

    public function getInputToken()
    {
        $token = $this->input->post('token');
        $data_arr = $this->decodeToken($token);
        return $data_arr;
    }

    public function decodeToken($token){
        $key = "UAP)(*";
        $data_arr = json_decode(json_encode($this->jwt->decode($token,$key)),true);
        return $data_arr;
    }



}
