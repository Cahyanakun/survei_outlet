<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('m_admin');
	}

	public function index()
	{
		if ($this->input->post('submit') == 'Submit') 
		{
			$user = $this->input->post('username', TRUE);
			$pass = $this->input->post('password', TRUE);

			$cek = $this->m_admin->get_where('t_admin', array('username' => $user));

			if ($cek->num_rows() > 0) {
				$data = $cek->row();

				if (password_verify($pass, $data->password)) 
				{
					$datauser = array(
						'admin' => $data->id_admin,
						'user' 	=> $data->fullname,
						'level'	=> $data->level,
						'login'	=> TRUE
					);

					$this->session->set_userdata($datauser);

					if ($this->session->userdata('level') == 1) {
						redirect('super/admin');
					}elseif ($this->session->userdata('level') == 2) {
						redirect('tim_survei/admin');
					}else{
						echo "Anda Tidak Terdaftar";
					}
				}else{
					$this->session->set_flashdata('alert', 'Password Invalid!');
				}

				
			}else{
				$this->session->set_flashdata('alert', 'Username Or Password Invalid!');
			}
		}

		if ($this->session->userdata('level') == 1) 
		{
			redirect('super/admin');
		}elseif ($this->session->userdata('level') == 2) {
			redirect('tim_survei/admin');
		}

		 //echo password_hash('admin', PASSWORD_DEFAULT, ['cost' => 10]);
		 $this->load->view('login_form');
	}

	
	function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}




}
