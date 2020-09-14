<?php defined("BASEPATH") OR exit("No direct script access allowed");

  class C_dashboard extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        // header('Access-Control-Allow-Origin: *');
        // header('Content-Type: application/json');
        $this->load->model('m_branda');
    }

    public function template($content)
    {
        $data['content'] = $content;
        $this->load->view('template/blank',$data);
    }

    function index(){

        $page = '';
        $data["pageTitle"] = "Dashboard";
        // $data['record']=$this->m_branda->list_trending();
        // $data['getslider']=$this->m_branda->count_slider();

        $content = $this->load->view('template/V_home',$data,true);
        $this->template($content);
    }

    function page_404(){
        $content = $this->load->view("template/404",'',false);
    }

    function event()
    {
        $content = $this->load->view('template/V_event','',true);
        $this->template($content);
    }

    function news()
    {
        $content = $this->load->view('template/V_news','',true);
        $this->template($content);
    }

    function details()
    {
        $content = $this->load->view('template/V_detail','',true);
        $this->template($content);
    }

    function allevent()
    {
        $content = $this->load->view('template/V_allevent','',true);
        $this->template($content);
    }
    
    function about()
    {
        // print_r('ok');die();
        $content = $this->load->view('template/V_about','',true);
        $this->template($content);
    }

    function gallery()
    {
        // print_r('ok');die();
        $content = $this->load->view('template/V_gallery','',true);
        $this->template($content);
    }

    function contact()
    {
        $content = $this->load->view('template/V_contact','',true);
        $this->template($content);
    }

    public function search(){
        // $data['search'] = $this->input->get('value');
        $content = $this->load->view('template/V_search',$data,true);
        $this->template($content);
    }

}

?>