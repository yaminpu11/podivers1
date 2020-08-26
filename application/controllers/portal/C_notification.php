<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_notification extends MY_Controller {

    public function notification(){

        $content = $this->load->view('portal/notification/notification','',true);
        parent::template_portal($content);
    }


}
