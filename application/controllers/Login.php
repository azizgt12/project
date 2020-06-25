<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('login_model');
	}

	public function index()
	{
		$this->load->view('login');
	}
	public function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'uname' => $username,
			'pass' => $password
			);
		$cek = $this->login_model->cek_login("user",$where)->num_rows();
		if($cek > 0){
		$cek_role = $this->login_model->cek_login("user",$where)->result();
 
			$data_session = array(
				'nama' => $username,
				'status' => "login",
				'level' => $cek_role[0]->level
			);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url('index.php/dashboard'));
 
		}else{
			$this->session->set_flashdata('error', 'Login gagal cek username dan password'); 
			redirect (base_url());
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}

}
