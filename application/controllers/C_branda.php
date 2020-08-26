<?php defined("BASEPATH") OR exit("No direct script access allowed");

  class C_branda extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        // header('Access-Control-Allow-Origin: *');
        // header('Content-Type: application/json');
        $this->load->model('m_branda');       
        $this->load->helper('url');
        $this->load->library('JWT');

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

    // Testimonial
    function load_testimonial(){
        $data=$this->m_branda->getTestimonial();
        return print_r(json_encode($data));
    }

    // News BY Blog
    function load_newsbyblog(){
        $data=$this->m_branda->getNewsBloglimit();
        return print_r(json_encode($data));
    }

    //Content 
    function load_content(){
        $Input = $this->getInputToken();
        $type=$Input['type'];
        $data=$this->m_branda->getDataContent($type);        
        return print_r(json_encode($data));
    }

    // Load Detail
    function load_details(){

        $Input = $this->getInputToken();
        $type = $Input['type'];
        $ID = $Input['ID'];
        $data = $this->m_branda->GetDataContentDetails($type,$ID);   
        return print_r(json_encode($data));


    }

   

}

