<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('template','form_validation'));
		$this->load->model('m_admin');
	}

	public function index()
	{
		$this->cek_login();
		$data['survei'] = $this->m_admin->row('t_survei');
		$data['ts'] = $this->m_admin->row('t_admin');
		$data['member'] = $this->m_admin->row('t_member');
		$this->template->survei('tim_survei/home', $data);
	}


	function edit_profil()
	{
		$this->cek_login();

		if ($this->input->post('submit') == 'Submit')
		{
			$this->form_validation->set_rules('username', 'Useraname', 'trim|required|min_length[5]');
			$this->form_validation->set_rules('fullname', 'fullname', "required|trim|min_length[5]|regex_match[/^[a-z A-Z.']+$/]");
			$this->form_validation->set_rules('email', 'email', 'trim|required|min_length[5]|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');

			if ($this->form_validation->run() == TRUE) {

				$get_data = $this->m_admin->get_where('t_admin', array('id_admin' => 
						$this->session->userdata('admin')))->row();
				if (!password_verify($this->input->post('password', TRUE), $get_data->password))
				{
					echo '<script type="text/javascript">alert("password yang Anda Masukkan Salah!"); window.location.replace("'.base_url().'login/logout")</script>';
				}else{

					$data = array(
					'username' 	=>$this->input->post('username', TRUE),
					'fullname' 	=>$this->input->post('fullname', TRUE),
					'email' 	=>$this->input->post('email', TRUE)
				);

				$con = array('id_admin' => $this->session->userdata('admin'));
				$this->m_admin->update('t_admin', $data, $con);
					redirect('tim_survei/admin');
				}		
				
			}
		}

		$get = $this->m_admin->get_where('t_admin', array('id_admin' => 
		$this->session->userdata('admin')))->row();

		$data['username'] 	= $get->username;
		$data['fullname'] 	= $get->fullname;
		$data['email'] 		= $get->email;


		$data['header'] = 'Update Profil';
		$this->template->survei('auth/edit_profil', $data);
	}

	function cek_login()
	{
		if ($this->session->userdata('level') != 2) 
		{
			redirect('login');
		}
	}

	public function registrasi()
	{
		if ($this->input->post('submit') == 'Submit') {

			$this->form_validation->set_rules('fullname', 'Nama Lengkap', 'required');
			$this->form_validation->set_rules('username', 'Username', "required|min_length[5]|regex_match[/^[a-xA-z0-9]+$/]");
			$this->form_validation->set_rules('email', 'E- Mail',"required|valid_email");
			$this->form_validation->set_rules('pass1', 'Password', "required|min_length[5]");
			$this->form_validation->set_rules('pass2', 'Ketik Ulang Password', "required|matches[pass1]");

			if ($this->form_validation->run() == TRUE) {
					$cek = $this->m_admin->get_where('t_admin', array('username' => $this->input->post('username')));
					if ($cek->num_rows() > 0) {
						$this->session->set_flashdata('alert', 'Nama Sudah Digunakan');
					}else{
					$data = array(
						'fullname' => $this->input->post('fullname', TRUE),
						'username' => $this->input->post('username', TRUE),
						'email' => $this->input->post('email', TRUE),
						'password' => password_hash($this->input->post('pass1', TRUE), PASSWORD_DEFAULT,['cost' => 10]),
						'level' => 2

					);

					if ($this->m_admin->insert('t_admin',$data)) {
						$this->session->set_flashdata('alert', 'Terimakasih Silahkan Login');
						redirect('login');
					}else{
						$this->session->set_flashdata('alert', 'E-Mail Sudah Ada Ganti E-Mail Anda ');
					}
				}

			}
		}
		if ($this->session->userdata('user_login') == TRUE) 
		{
			redirect('tim_survei/profile');
		}
				$data = array(
					'username' => $this->input->post('username', TRUE),
					'fullname' => $this->input->post('fullname', TRUE),
					'email' => $this->input->post('email', TRUE),
					'level' => 2
				);

		$this->load->view('tim_survei/registrasi', $data);

	}
}
