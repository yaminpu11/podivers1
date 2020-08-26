<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class C_login extends CI_Controller {
	
	function __construct()
	{
	    parent::__construct();
	    $this->load->model('m_master');
	    $this->load->library('JWT');
	}

	private function getInputToken2()
	{
	    $token = $this->input->post('token');
	    $key = "s3Cr3T-G4N";
	    $data_arr = (array) $this->jwt->decode($token,$key);
	    $data_arr = json_decode(json_encode($data_arr),true);
	    return $data_arr;
	}

	public function login(){
		// error_reporting(0);
		try {
			$input = $this->getInputToken2();

			// post API
			$url = url_server_ws.'rest_alumni/__authAlumniAPISession';
			$post = [
				'action' => 'authLogin',
				'data' => [
					'NPM' => $input['Username'],
					'Password' => $input['Token'],
				],
				'auth' => 's3Cr3T-G4N',
			];

			// custom post
			$Arr_Header = $this->m_master->showData_array('db_alumni.rest_setting');
			$Apikey = $Arr_Header[0]['Apikey'];
			$Hjwtkey = $Arr_Header[0]['Hjwtkey'];
			$customPost = [
			    'get' => '?apikey='.$Apikey,
			    'header' => [
			        'Hjwtkey' => $Hjwtkey,
			    ],
			    
			];

			$ApiPcam = $this->m_master->PostSubmitAPIWithFile($url,$post,[],$customPost);
			if (array_key_exists('alumni_loggedIn', $ApiPcam)) {
				$this->session->set_userdata($ApiPcam);
				$this->db->insert('db_alumni.log_login',['NPM' => $this->session->userdata('alumni_NPM'),'LastLogin' => date('Y-m-d H:i:s') ]);
			}

			redirect(base_url().'portal');
			
		} catch (Exception $e) {
			print_r(json_encode(array('status'=> '999','message' => 'Not Authorize')));
			print_r(json_encode($e));die();
		}
		
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(url_sign_out);
	}


}