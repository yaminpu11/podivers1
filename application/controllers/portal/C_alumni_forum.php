<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_alumni_forum extends MY_Controller {
	private $data = [];
	function __construct()
	{
	    parent::__construct();
	    $this->load->model('m_portal');
	}

    public function alumni_forum(){

        $content = $this->load->view('portal/alumni_forum/alumni_forum','',true);
        parent::template_portal($content);
    }

    public function detail_topic($token){
        $urlDecode = $this->decodeToken($token);
        $this->data['ID'] = $urlDecode;
        $content = $this->load->view('portal/alumni_forum/detail_topic',$this->data,true);
        parent::template_portal($content);
    }


}
