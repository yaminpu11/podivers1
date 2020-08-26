<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_testimony extends MY_Controller {

    public function testimony(){

        $content = $this->load->view('portal/testimony/testimony','',true);
        parent::template_portal($content);
    }


}
