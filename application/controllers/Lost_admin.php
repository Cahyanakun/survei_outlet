<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lost_admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('m_admin');
	}

	public function index(){

		if ($this->input->post('submit', TRUE) == 'Submit') 
		{
			$this->form_validation->set_rules('email', 'email', 'required|valid_email');
			if ($this->form_validation->run() == TRUE)
			{

				$get = $this->m_admin->get_where('t_admin', array('email' => 
						$this->input->post('email', TRUE)));
				if ($get->num_rows() > 0) 
				{
					$this->load->library('email');
					$config['charset'] = 'utf-8';
					$config['useragent'] = 'SISFO CEMANI';
					$config['protocol'] = 'smtp';
					$config['mailtype'] = 'html';
					$config['smtp_host'] = "ssl://smtp.gmail.com";
					$config['smtp_port'] = '465';
					$config['smpt_timeout'] = '5';
					$config['smtp_user'] = 'shinryuzhin@gmail.com';
					$config['smtp_pass'] = '24september';
					$config['crlf'] = "\r\n";
					$config['newline'] = "\r\n";
					$config['wordwrap'] = TRUE;

					$this->email->initialize($config);
					$key = md5(md5(time()));

					$this->email->from('cemanifriedchicken.com', "Cemani");
					$this->email->to($this->input->post('email', TRUE));
					$this->email->subject('Reset Password');
					$this->email->message('
						Apakah Anda Lupa dengan password Anda ? silahkan klik disini
						<a href="'.base_url().'lost_admin/reset/'.$key.'">Disini</a>
						Jika Anda Tidak Merequest Fitur ini Silahkan Abaikan pesan ini!
						');

					if ($this->email->send())
					{
						$data['reset'] = $key;
						$cond['email'] = $this->input->post('email', TRUE);
						$this->m_admin->update('t_admin', $data, $cond);
						$this->session->set_flashdata('success', 'E-Mail Terkirim. Silahkan Cek E-Mail anda!');
					}else{
						$this->session->set_flashdata('alert', 'E-Mail Gagal dikirim.');
					}
				}else{
					$this->session->set_flashdata('alert', 'E-Mail Tidak Terdaftar!');
				}

			}
		}

		$this->load->view('auth/lost_admin');
	}

	function reset()
	{
		if ($this->uri->segment(3)) {
			$this->load->view('auth/form_reset');

			if ($this->input->post('subit', TRUE) == 'Submit') {
				$this->form_validation->set_rules('pass1', 'Password Baru','required|min_length[5]');
				$this->form_validation->set_rules('pass2', 'Ketik Ulang Password','required|matches[pass1]');

				if ($this->form_validation->run() == TRUE) {
					$pass = $this->input->post('pass1', TRUE);
					$data['password'] = password_hash($pass, PASSWORD_DEFAULT, ['cost' => 10]);
					$data['reset'] = '';

					$cond = $this->uri->segment(3);
					$this->m_admin->update('t_admin', $data, $cond);
					$this->session->set_flashdata('success', "Password Berhasil Di perbaharui");
					redirect('login');
				}
			}
		}else{
			redirect('auth/lost_admin');
		}
	}

}
