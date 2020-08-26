<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_questionnaire extends MY_Controller {

    public function questionnaire(){

        $content = $this->load->view('portal/questionnaire/questionnaire','',true);
        parent::template_portal($content);
    }


}
