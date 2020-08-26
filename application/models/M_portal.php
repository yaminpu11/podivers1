<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_portal extends CI_Model {
    
    private $varClass = [];

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_master');
        $G_setting = $this->m_master->showData_array('db_alumni.rest_setting');
        $this->varClass = $G_setting[0];
        $this->varClass['customPost'] = [
            'get' => '?apikey='.$this->varClass['Apikey'],
            'header' => [
                'Hjwtkey' => $this->varClass['Hjwtkey'],
            ],
            
        ];
    }

    public function change_photo(){
        $pathtmpName = $_FILES['Photo']['tmp_name'][0];
        $mimeType = $this->m_master->MimeType($pathtmpName);
        if(in_array($mimeType, array('image/jpg','image/jpeg', 'image/gif', 'image/png'))) {
            $ext = explode('/', $mimeType);
            $filename = 'Alumni_Photo_'.$this->session->userdata('alumni_NPM').'.'.$ext[1];
            // upload photo to PUIS
            $fileattach = array(
                'file_name_with_full_path' => $pathtmpName,
                'MimeType' => $mimeType,
                'filename' => $filename,
                'varfiles' => 'Photo',
            );

            $url = url_server_ws.'rest_alumni/__change_photo';
            $data_post =  [
                'auth' => 's3Cr3T-G4N',
                'data' => [
                    'NPM' => $this->session->userdata('alumni_NPM'),
                    'UpdatedBy' =>  $this->session->userdata('alumni_NPM'),
                    'UpdatedAt' => date('Y-m-d H:i:s'),
                ],
            ];


            $postPcam = $this->m_master->PostSubmitAPIWithFile($url,$data_post,$fileattach,$this->varClass['customPost']);
            if ($postPcam['status'] != 1) {
                print_r('error');die();
            }
            else
            {
                return 1;
            }

        }

        return 0;
    }

    public function save_biodata($dataToken){
        $NPM = $this->session->userdata('alumni_NPM');
        $G_biodata = $this->m_master->caribasedprimary('db_alumni.biodata','NPM',$this->session->userdata('alumni_NPM'));
        $action = (count($G_biodata) > 0 ) ? 'edit' : 'add';
        $dataSave = $dataToken;
        $dataSave['NPM'] = $this->session->userdata('alumni_NPM');
        $dataSave['UpdatedBy'] = $this->session->userdata('alumni_NPM');
        $dataSave['UpdatedAt'] = date('Y-m-d H:i:s');

        $url = url_server_ws.'rest_alumni/__save_biodata';
        $data_post =  [
            'auth' => 's3Cr3T-G4N',
            'action' => $action,
            'data' => $dataSave,
            'NPM' => $this->session->userdata('alumni_NPM'),
        ];

       
        $postPcam = $this->m_master->PostSubmitAPIWithFile($url,$data_post,[],$this->varClass['customPost']);
        if ($postPcam['status'] != 1) {
            print_r('error');die();
        }
        else
        {
            return 1;
        }
    }

    public function load_data_alumni(){
        $NPM = $this->session->userdata('alumni_NPM');
        $url = url_server_ws.'rest_global/__api_Biodata_MHS';
        $data_post =  [
            'auth' => 's3Cr3T-G4N',
            'data' => [
                'NPM' => $NPM
            ],
        ];

       
        $postPcam = $this->m_master->PostSubmitAPIWithFile($url,$data_post,[],$this->varClass['customPost']);
        $G_biodata = $this->m_master->caribasedprimary('db_alumni.biodata','NPM',$this->session->userdata('alumni_NPM'));

        $postPcam[0]['TitleAhead'] =  (count($G_biodata) > 0 ) ?  $G_biodata[0]['TitleAhead'] : '';
        $postPcam[0]['TitleBehind'] =  (count($G_biodata) > 0 ) ? $G_biodata[0]['TitleBehind'] : '';
        return $postPcam;
    }

    public function save_tbl_ta($dataSave){
        $NPM = $this->session->userdata('alumni_NPM');
        $tbl  = 'ta_'.$this->session->userdata('alumni_ClassOf').'.students';

        $url = url_server_ws.'rest_alumni/__upd_tbl_ta';
        $data_post =  [
            'auth' => 's3Cr3T-G4N',
            'data' => $dataSave,
            'NPM' => $this->session->userdata('alumni_NPM'),
            'tbl' => $tbl
        ];

       
        $postPcam = $this->m_master->PostSubmitAPIWithFile($url,$data_post,[],$this->varClass['customPost']);
        if ($postPcam['status'] != 1) {
            print_r('error');die();
        }
        else
        {
            return 1;
        }
    }

    public function load_data_education(){
        $NPM = $this->session->userdata('alumni_NPM');

        $url = url_server_ws.'rest_alumni/__load_data_education';
        $data_post =  [
            'auth' => 's3Cr3T-G4N',
            'data' => [
                'NPM' => $NPM,
            ],
        ];

        $postPcam = $this->m_master->PostSubmitAPIWithFile($url,$data_post,[],$this->varClass['customPost']);

        if ($postPcam['status'] != 1) {
            print_r('error');die();
        }
        else
        {
            return $postPcam['callback'];
        }

    }

    public function submit_education($dataToken){
        // update NPM,updated by and updated at
        $dataToken['data']['NPM'] = $this->session->userdata('alumni_NPM');
        $dataToken['data']['UpdatedBy'] = $this->session->userdata('alumni_NPM');
        $dataToken['data']['UpdatedAt'] = date('Y-m-d H:i:s');
        $dataToken['auth'] = 's3Cr3T-G4N';

        $url = url_server_ws.'rest_alumni/submit_education';
        $data_post =  $dataToken;
        $postPcam = $this->m_master->PostSubmitAPIWithFile($url,$data_post,[],$this->varClass['customPost']);
        if ($postPcam['status'] != 1) {
            print_r('error');die();
        }
        else
        {
            return 1;
        }

    }

    public function load_data_skills(){
        $NPM = $this->session->userdata('alumni_NPM');

        $url = url_server_ws.'rest_alumni/__load_data_skills';
        $data_post =  [
            'auth' => 's3Cr3T-G4N',
            'data' => [
                'NPM' => $NPM,
            ],
        ];

        $postPcam = $this->m_master->PostSubmitAPIWithFile($url,$data_post,[],$this->varClass['customPost']);

        if ($postPcam['status'] != 1) {
            print_r('error');die();
        }
        else
        {
            return $postPcam['callback'];
        }
    }

    public function submit_skills($dataToken){
        $dataSave = [];
        $NPM = $this->session->userdata('alumni_NPM');
        $UpdatedBy = $NPM;
        $UpdatedAt = date('Y-m-d H:i:s');
        for ($i=0; $i < count($dataToken); $i++) { 
            $dataToken[$i]['SkillName'] = ucwords($dataToken[$i]['SkillName']);
            $dataSave[] = $dataToken[$i] + [
                'NPM' => $NPM,
                'UpdatedBy' => $UpdatedBy,
                'UpdatedAt' => $UpdatedAt,
            ];
        }


        $data_post =  [
            'auth' => 's3Cr3T-G4N',
            'data' => $dataSave,
        ];


        $url = url_server_ws.'rest_alumni/submit_skills';
        $postPcam = $this->m_master->PostSubmitAPIWithFile($url,$data_post,[],$this->varClass['customPost']);
        if ($postPcam['status'] != 1) {
            print_r('error');die();
        }
        else
        {
            return 1;
        }
    }

    public function load_data_forum(){
        $url = url_server_ws.'rest_alumni/__load_data_forum_server_side';
        $data_post =  [
            'auth' => 's3Cr3T-G4N',
            'data' => [
                'REQUEST' =>  $_REQUEST,
                'NPM' => $this->session->userdata('alumni_NPM'),
            ],
        ];

        $postPcam = $this->m_master->PostSubmitAPIWithFile($url,$data_post,[],$this->varClass['customPost']);
        // print_r($postPcam);die();
        if ($postPcam['status'] != 1) {
            print_r('error');die();
        }
        else
        {
            return $postPcam['callback'];
        }
    }

    public function submit_forum_alumni($dataToken){
        $action = $dataToken['action'];
        $dataToken['auth'] = 's3Cr3T-G4N';
        switch ($action) {
            case 'add':
               $dataToken['data']['forum']['CreateBy'] = $this->session->userdata('alumni_NPM');
               $dataToken['data']['forum']['CreateAt'] = date('Y-m-d H:i:s');
               $dataToken['data']['forum']['TypeUserID'] = 1;
               $dataToken['auth'] = 's3Cr3T-G4N';
               $ToUser = [];
               // $ToUser[] = $this->session->userdata('alumni_NPM');
               if (array_key_exists('toDepartment', $dataToken)) {
                   $DepartmentID = $dataToken['toDepartment'];
                   $G_dt = $this->m_master->getEmployeeByDepartment($DepartmentID);
                   for ($i=0; $i < count($G_dt); $i++) { 
                       $ToUser[]= $G_dt[$i]['NIP'];
                   }
               }

               // send to all student
               $G_std_alumni =  $this->m_master->showData_array('db_alumni.registration');
               for ($i=0; $i < count($G_std_alumni); $i++) { 
                   $ToUser[] = $G_std_alumni[$i]['NPM'];
               }

               if (array_key_exists('toUser', $dataToken)) {
                   $G_dt = $dataToken['toUser'];
                   for ($i=0; $i < count($G_dt); $i++) { 
                       $ToUser[] = $G_dt[$i];
                   }
               }

               if (!array_key_exists('toUser', $dataToken) && !array_key_exists('toDepartment', $dataToken)) {
                   $DepartmentID = 16; // kemahasiswaan
                   $G_dt = $this->m_master->getEmployeeByDepartment($DepartmentID);
                   for ($i=0; $i < count($G_dt); $i++) { 
                       $ToUser[]= $G_dt[$i]['NIP'];
                   }
               }

               $dataToken['data']['forum_user'] = $ToUser;

               $url = url_server_ws.'rest_alumni/__submit_forum_alumni';
               $data_post =  $dataToken;
               $postPcam = $this->m_master->PostSubmitAPIWithFile($url,$data_post,[],$this->varClass['customPost']);
               if ($postPcam['status'] != 1) {
                   print_r('error');die();
               }
               else
               {
                   return 1;
               }

                break;
            
            default:
                # code...
                break;
        }
        
    }

    public function get_detail_topic($dataToken){
        $dataToken['UserID'] = $this->session->userdata('alumni_NPM');
        $url = url_server_ws.'rest_alumni/__get_detail_topic';
        $data_post =  [
            'auth' => 's3Cr3T-G4N',
            'data' => $dataToken,
        ];

        $postPcam = $this->m_master->PostSubmitAPIWithFile($url,$data_post,[],$this->varClass['customPost']);
        // print_r($postPcam);die();
        if ($postPcam['status'] != 1) {
            print_r('error');die();
        }
        else
        {
            return $postPcam['callback'];
        }
    }

    public function submit_comment_forum($dataToken){
        $dataSave = [];
        $NPM = $this->session->userdata('alumni_NPM');
        $CreateAt = date('Y-m-d H:i:s');
        $dataToken['CreateAt'] = $CreateAt;
        $dataToken['UserID'] = $NPM;
        $data_post =  [
            'auth' => 's3Cr3T-G4N',
            'data' => $dataToken,
        ];


        $url = url_server_ws.'rest_alumni/__submit_comment_forum';
        $postPcam = $this->m_master->PostSubmitAPIWithFile($url,$data_post,[],$this->varClass['customPost']);
        if ($postPcam['status'] != 1) {
            print_r('error');die();
        }
        else
        {
            return 1;
        }
    }

    public function Testimony($dataToken){
        $NPM = $this->session->userdata('alumni_NPM');
        $UpdateBy = $NPM;
        $UpdateAt = date('Y-m-d H:i:s');
        $dataToken['data'] = (array_key_exists('data', $dataToken)) ? $dataToken['data'] : [];
        $dataToken['data']['UpdateBy'] = $UpdateBy;
        $dataToken['data']['UpdateAt'] = $UpdateAt;
        $dataToken['NPM'] = $NPM;
        $dataToken['auth'] = 's3Cr3T-G4N';

        $url = url_server_ws.'rest_alumni/__Testimony';
        $postPcam = $this->m_master->PostSubmitAPIWithFile($url,$dataToken,[],$this->varClass['customPost']);
        if ($postPcam['status'] != 1) {
            print_r('error');die();
        }
        else
        {
           return $postPcam['callback'];
        }
    }

    public function load_work_experience(){
        $NPM = $this->session->userdata('alumni_NPM');
        $data_post = [
            'action' => 'showExperience',
            'NPM' => $NPM,
        ];

        $url = url_server_ws.'api3/__crudTracerAlumni';
        $postPcam = $this->m_master->PostSubmitAPIWithFile($url,$data_post);
        return $postPcam;
    }

    public function submit_work_experience($dataToken){
        $NPM = $this->session->userdata('alumni_NPM');
        $data_post = $dataToken;
        $data_post['dataForm']['NPM'] = $NPM;
        if ($data_post['ID'] != '') {
           $data_post['dataForm']['UpdatedBy'] = $NPM;
        }
        else
        {
            $data_post['dataForm']['EntredBy'] = $NPM;
        }

        $url = url_server_ws.'api3/__crudTracerAlumni';
        $postPcam = $this->m_master->PostSubmitAPIWithFile($url,$data_post);
        return $postPcam;
    }

    public function submit_add_company($dataToken){
        $NPM = $this->session->userdata('alumni_NPM');
        $data_post = $dataToken;
        $data_post['action'] = 'saveMasterCompany';
        if ($data_post['ID'] != '') {
           $data_post['dataForm']['UpdatedBy'] = $NPM;
        }
        else
        {
            $data_post['dataForm']['EntredBy'] = $NPM;
        }

        $url = url_server_ws.'api3/__crudTracerAlumni';
        $postPcam = $this->m_master->PostSubmitAPIWithFile($url,$data_post);
        return $postPcam;
    }


}
