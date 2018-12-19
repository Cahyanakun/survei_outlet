<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_admin');
		$this->load->library(array('form_validation','template'));
		
	}

	public function index()
	{
		if ($this->input->post('submit') == 'Submit') 
		{
			$user = $this->input->post('username', TRUE);
			$pass = $this->input->post('password', TRUE);

			$cek = $this->m_admin->get_where('t_member', "username = '$user' || email = '$user'");

			if ($cek->num_rows() > 0) {
				$data = $cek->row();

				if (password_verify($pass, $data->password)) 
				{
					$datauser = array(
						'user_id' 		=> $data->id_member,
						'name' 			=> $data->fullname,
						'user_login'	=> TRUE
					);

					$this->session->set_userdata($datauser);

					redirect('member/profile');
				}else{
					$this->session->set_flashdata('alert', 'Password Invalid!');
				}

				
			}else{
				$this->session->set_flashdata('alert', 'Username Or Password Invalid!');
			}
		}

		if ($this->session->userdata('user_login') == TRUE) 
		{
			redirect('member/profile');
		}
		$this->load->view('member/login_form');
	}

	public function registrasi()
	{
		if ($this->input->post('submit') == 'Submit') {

			$this->form_validation->set_rules('nama1', 'Nama Depan', "required|min_length[5]|regex_match[/^[a-xA-z'. ]+$/]");
			$this->form_validation->set_rules('username', 'Username', "required|min_length[5]|regex_match[/^[a-xA-z0-9]+$/]");
			$this->form_validation->set_rules('email', 'E- Mail',"required|valid_email");
			$this->form_validation->set_rules('pass1', 'Password', "required|min_length[5]");
			$this->form_validation->set_rules('pass2', 'Ketik Ulang Password', "required|matches[pass1]");
			$this->form_validation->set_rules('jk', 'Jenis Kelamin', "required");
			$this->form_validation->set_rules('telp', 'Nomor Telepon', "required|min_length[10]|numeric");
			$this->form_validation->set_rules('alamat', 'Alamat', "required|min_length[10]");

			if ($this->form_validation->run() == TRUE) {
				$cek = $this->m_admin->get_where('t_member', array('username' => $this->input->post('username')));
				if ($cek->num_rows() > 0) {
					$this->session->set_flashdata('alert', 'Nama Sudah Digunakan');
				}else{
					$data = array(
					'username' => $this->input->post('username', TRUE),
					'fullname' => $this->input->post('nama1', TRUE),
					'email' => $this->input->post('email', TRUE),
					'password' => password_hash($this->input->post('pass1', TRUE), PASSWORD_DEFAULT,['cost' => 10]),
					'jk' => $this->input->post('jk', TRUE),
					'telp' => $this->input->post('telp', TRUE),
					'alamat' => $this->input->post('alamat', TRUE),
					'status' => 1
					);
					if($this->m_admin->insert('t_member',$data)){
						$this->session->set_flashdata('alert', 'Terimakasih Silahkan Login');
						redirect('member');
					}else{
						$this->session->set_flashdata('alert', 'E-Mail Sudah Ada Ganti E-Mail Anda ');
					}

				}
				
			// 	if ($this->m_admin->insert('t_member',$data)) {
					
			// 		$this->load->library('email');
			// 		$config['charset'] = 'utf-8';
			// 		$config['useragent'] = 'SISFO CEMANI';
			// 		$config['protocol'] = 'smtp';
			// 		$config['mailtype'] = 'html';
			// 		$config['smtp_host'] = "ssl://smtp.gmail.com";
			// 		$config['smtp_port'] = '465';
			// 		$config['smpt_timeout'] = '5';
			// 		$config['smtp_user'] = 'shinryuzhin@gmail.com';
			// 		$config['smtp_pass'] = '24september';
			// 		$config['crlf'] = "\r\n";
			// 		$config['newline'] = "\r\n";
			// 		$config['wordwrap'] = TRUE;

			// 		$this->email->initialize($config);

			// 		$this->email->from('cemanifriedchicken.com', "Cemani");
			// 		$this->email->to($this->input->post('email', TRUE));
			// 		$this->email->subject('Verifikasi Pendaftran');
			// 		$this->email->message('
			// 			Terima Kasih Telah mendaftarkan Akun Anda ? silahkan klik disini
			// 			<a href="'.base_url().'member">Disini</a>
			// 			Untuk Aktivasi Akun Anda dan memulainya.
			// 			');

			// 		if ($this->email->send())
			// 		{
			// 			$this->session->set_flashdata('success', 'E-Mail Terkirim. Silahkan Cek E-Mail anda!');
			// 		}else{
			// 			$this->session->set_flashdata('alert', 'E-Mail Gagal dikirim.');
			// 		}
			// 		$this->load->view('member/login_form');
			// 	}else{
			// 		echo '<script type="text/javascript"> alert("Username/Email Tidak Tersedia");</script>';
			// 	}

			 }
		}
		if ($this->session->userdata('user_login') == TRUE) 
		{
			redirect('member/profile');
		}
				$data = array(
					'username' => $this->input->post('username', TRUE),
					'nama1' => $this->input->post('nama1', TRUE),
					'nama2' =>$this->input->post('nama2', TRUE),
					'email' => $this->input->post('email', TRUE),
					'jk' => $this->input->post('jk', TRUE),
					'telp' => $this->input->post('telp', TRUE),
					'alamat' => $this->input->post('alamat', TRUE),
					'status' => 1
				);

		$this->load->view('member/registrasi', $data);

	}

	function profile()
	{
		$this->cek_login();
		$data['you'] = "Selamat Datang";
		$get = $this->m_admin->get_where('t_member', array('id_member' => 
		$this->session->userdata('user_id')))->row();
		$uid = $this->session->userdata('user_id');
		$data['username'] 	= $get->username;
		$data['fullname'] 	= $get->fullname;
		$data['email'] 		= $get->email;
		$data['jk'] 		= $get->jk;
		$data['telp'] 		= $get->telp;
		$data['alamat'] 		= $get->alamat;
		$data['tanggal'] 		= $get->tanggal;

		$sql = "select jn.* from (select @f_id_member := $uid p) parm, jumlah_nilai jn";
		$data['query'] = $this->db->query($sql);

		$this->template->member('member/home', $data);

	}

	function edit_profil_member()
	{
		$this->cek_login();
		if ($this->input->post('submit') == 'Submit')
		{
			$this->form_validation->set_rules('username', 'Useraname', 'trim|required|min_length[5]');
			$this->form_validation->set_rules('fullname', 'fullname', "required|trim|min_length[5]|regex_match[/^[a-z A-Z.']+$/]");
			$this->form_validation->set_rules('email', 'email', 'trim|required|min_length[5]|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');

			if ($this->form_validation->run() == TRUE) {

				$get_data = $this->m_admin->get_where('t_member', array('id_member' => 
						$this->session->userdata('user_id')))->row();
				if (!password_verify($this->input->post('password', TRUE), $get_data->password))
				{
					echo '<script type="text/javascript">alert("password yang Anda Masukkan Salah!"); window.location.replace("'.base_url().'login/logout")</script>';
				}else{

					$data = array(
					'username' 	=>$this->input->post('username', TRUE),
					'fullname' 	=>$this->input->post('fullname', TRUE),
					'jk' 		=>$this->input->post('jk', TRUE),
					'email' 	=>$this->input->post('email', TRUE),
					'telp' 	=>$this->input->post('telp', TRUE),
					'alamat' 	=>$this->input->post('alamat', TRUE)
				);

				$con = array('id_member' => $this->session->userdata('user_id'));
				$this->m_admin->update('t_member', $data, $con);
					redirect('member');
				}		
				
			}
		}

		$get = $this->m_admin->get_where('t_member', array('id_member' => 
		$this->session->userdata('user_id')))->row();

		$data['username'] 		= $get->username;
		$data['fullname'] 		= $get->fullname;
		$data['email'] 			= $get->email;
		$data['telp'] 			= $get->telp;
		$data['jk'] 			= $get->jk;
		$data['alamat'] 		= $get->alamat;


		$data['header'] = 'Update Profil';
		$this->template->member('member/edit_profil', $data);
	}

		function logout()
	{
		$this->session->sess_destroy();
		redirect('member');
	}

	function detail()
	{
		
		$id = $this->uri->segment(3);
		$hasil = $this->m_admin->get_where('t_member', array('id_member' => $id));
		foreach ($hasil->result() as $key) {
			$data['username'] = $key->username;
			$data['fullname'] = $key->fullname;
			$data['jk'] = $key->jk;
			$data['email'] = $key->email;
			$data['telp'] = $key->telp;
			$data['alamat'] = $key->alamat;
			$data['tanggal'] = $key->tanggal_member;
		}
		$sql = "select jn.* from (select @f_id_member := $id p) parm, jumlah_nilai jn";
		$data['query1'] = $this->db->query($sql);

		$data['header'] = "Detail Member";
		if ($this->session->userdata('level') == 1) {
			$this->template->admin('member/detail_member', $data);
		}else{
			$this->template->survei('member/detail_member', $data);
		}
		
	}

	function hasil_survei()
	{
		$get = $this->m_admin->get_where('t_member', array('id_member' => 
		$this->session->userdata('user_id')))->row();
		$uid = $this->session->userdata('user_id');
		$data['header'] = "Hasil Survei Data Anda";
		$data['listing'] = $this->m_admin->s_name_id(md5($uid));
		$this->template->member('member/manage_survei', $data);
	}

	function detail_survei()
	{	
		$this->cek_login();
		$data['header'] = "Detail Survei";
		$id_survei = $this->uri->segment(3);
		$listing = $this->m_admin->s_name_id($id_survei);
		foreach ($listing as $key) {
			$data['fullname'] = $key->fullname;
		}
		$survei = $this->m_admin->get_where('t_survei', array('md5(id_survei)' => $id_survei));
		foreach ($survei->result() as $key) {
			$data['member'] = $key->member;
			$data['tanggal'] = $key->tanggal;
			$data['spd'] = $key->spd;
			$data['spkn'] = $key->spkn;
			$data['spki'] = $key->spki;
			$data['rmb'] = $key->rmb;
			$data['shr'] = $key->shr;
			$data['sdp'] = $key->sdp;
			$data['sim'] = $key->sim;
			$data['kbs'] = $key->kbs;
			$data['kdsp'] = $key->kdsp;
			$data['ksdn'] = $key->ksdn;
			$data['cs'] = $key->cs;
			$data['kta'] = $key->kta;
			$data['tdp'] = $key->tdp;
			$data['kg'] = $key->kg;
			$data['bsm'] = $key->bsm;
			$data['wjn'] = $key->wjn;
			$data['sdt'] = $key->sdt;
			$data['kpr'] = $key->kpr;
			$data['cpn'] = $key->cpn;
			$data['ema'] = $key->ema;
			$data['lkn'] = $key->lkn;
			$data['lkc'] = $key->lkc;
			$data['bgn'] = $key->bgn;
			$data['tcs'] = $key->tcs;
			$data['mgdw'] = $key->mgdw;
			$data['ulasan'] = $key->ulasan;
			$data['catatan'] = $key->catatan;
			$data['gambar'] = $key->gambar;
			$data['gambar1'] = $key->gambar1;
			$data['gambar2'] = $key->gambar2;
			$data['gambar3'] = $key->gambar3;
			$data['val1'] = $key->val1;
			$data['id_survei'] = $key->id_survei;
		}
			$this->template->member('member/detail_survei', $data);
	}

	function cek_login()
	{
		if (!$this->session->userdata('user_id')) 
		{
			redirect('member');
		}

	}

	function delete_data()
	{
		$id_survei = $this->uri->segment(3);
		$res = $this->m_admin->delete('t_member', array('id_member' => $id_survei));
		if ($this->session->userdata('level') == 1) {
			redirect('super/cek_member');
		}else{
			redirect('tim_survei/cek_member');
		}
	}


}
