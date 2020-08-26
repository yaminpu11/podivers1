<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_action1 extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_portal');
        header('Content-Type: application/json');
    }

    public function change_photo(){
        
        if (array_key_exists('Photo', $_FILES)) {
           $proc = $this->m_portal->change_photo();
           echo json_encode($proc);
        }
    }

    public function about_me(){
        $input = $this->getInputToken();
        $proc = $this->m_portal->save_biodata($input);
        echo json_encode($proc);
    }

    public function load_data_alumni(){
        $proc = $this->m_portal->load_data_alumni();
        echo json_encode($proc);
    }

    public function submit_biodata(){
        $input = $this->getInputToken();
        $db_alumni = $input['db_alumni'];
        $this->m_portal->save_biodata($db_alumni);
        $db_ta =  $input['db_ta'];
        $this->m_portal->save_tbl_ta($db_ta);
        echo json_encode(1);
    }

    public function load_data_education(){
        $proc = $this->m_portal->load_data_education();
        echo json_encode($proc);
    }

    public function submit_education(){
        $input = $this->getInputToken();
        $this->m_portal->submit_education($input);
        echo json_encode(1);
    }

    public function load_data_skills(){
        $proc = $this->m_portal->load_data_skills();
        echo json_encode($proc);
    }

    public function submit_skills(){
        $input = $this->getInputToken();
        $this->m_portal->submit_skills($input);
        echo json_encode(1);
    }

    public function load_data_forum(){
        $input = $this->getInputToken();
        $action = $input['action'];
        switch ($action) {
            case 'read_server_side':
                $proc = $this->m_portal->load_data_forum();
                echo json_encode($proc);
                break;
            
            default:
                # code...
                break;
        }
    }

    public function submit_forum_alumni(){
        $input = $this->getInputToken();
        $this->m_portal->submit_forum_alumni($input);
        echo json_encode(1);
    }

    public function get_detail_topic(){
        $input = $this->getInputToken();
       $proc= $this->m_portal->get_detail_topic($input);
        echo json_encode($proc);
    }

    public function submit_comment_forum(){
        $input = $this->getInputToken();
        $this->m_portal->submit_comment_forum($input);
        echo json_encode(1);
    }

    public function Testimony(){
         $input = $this->getInputToken();
         $proc= $this->m_portal->Testimony($input);
         echo json_encode($proc);
    }

    public function load_work_experience(){
        $proc = $this->m_portal->load_work_experience();
        echo json_encode($proc);
    }

    public function submit_work_experience(){
        $input = $this->getInputToken();
        $proc = $this->m_portal->submit_work_experience($input);
        echo json_encode($proc);
    }

    public function Form_addCompany(){
        $detailCompany = [];
        $data['detailCompany'] = $detailCompany;
        $page = $this->load->view('portal/profile/add_master_company',$data,true);
        echo json_encode($page);
    }


    public function submit_add_company(){
        $input = $this->getInputToken();
        $proc = $this->m_portal->submit_add_company($input);
        echo json_encode($proc);
    }
}
