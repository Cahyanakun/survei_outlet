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
		$this->template->admin('admin/home', $data);
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
					redirect('super/admin');
				}		
				
			}
		}

		$get = $this->m_admin->get_where('t_admin', array('id_admin' => 
		$this->session->userdata('admin')))->row();

		$data['username'] 	= $get->username;
		$data['fullname'] 	= $get->fullname;
		$data['email'] 		= $get->email;


		$data['header'] = 'Update Profil';
		$this->template->admin('auth/edit_profil', $data);
	}


	function cek_login()
	{
		if ($this->session->userdata('level') != 1) 
		{
			redirect('login');
		}
	}
	function delete_data()
	{
		$id_survei = $this->uri->segment(4);
		$this->m_admin->delete('t_admin', array('id_admin' => $id_survei ));
		redirect('super/cek_ts');
	}

}
