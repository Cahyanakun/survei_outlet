<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Survei extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('template', 'form_validation'));
		$this->load->model('m_admin');
		$this->cek_login();
	}
	public function index(){
		$data['header'] = "Manage Data Survei";
		$data['listing'] = $this->m_admin->s_name();
		if ($this->session->userdata('level') == 1) {
			$this->template->admin('survei/manage_survei', $data);
		}else{
			$this->template->survei('survei/manage_survei', $data);
		}
		
	}

	public function add_data()
	{

		$data['listing'] = $this->m_admin->get_all('t_member');

		if ($this->input->post('submit', TRUE) == 'Submit')
		{
			$this->form_validation->set_rules('member', 'Nama Member', 'required',
				array('required' => 'Nama Member Belum Diisi'));
			$this->form_validation->set_rules('tanggal', 'Tanggal', 'required',
				array('required' => 'Tanggal Belum Diisi'));
			$this->form_validation->set_rules('spd', 'Spanduk Depan', 'required',
				array('required' => 'Spanduk Depan Belum Diisi'));
			$this->form_validation->set_rules('spkn', 'Spanduk Samping Kanan', 'required',
				array('required' => 'Spanduk Samping Kanan Belum Diisi'));
			$this->form_validation->set_rules('spki', 'Spanduk Samping Kiri', 'required',
				array('required' => 'Spanduk Samping Kanan Belum Diisi'));
			$this->form_validation->set_rules('rmb', 'Rumbai', 'required',
				array('required' => 'Rumbai Belum Diisi'));
			$this->form_validation->set_rules('shr', 'Stiker Harga', 'required',
				array('required' => 'Stiker Harga Belum Diisi'));
			$this->form_validation->set_rules('sdp', 'Stiker Depan', 'required',
				array('required' => 'Stiker Depan Belum Diisi'));
			$this->form_validation->set_rules('sim', 'Stiker Info Mitra', 'required',
				array('required' => 'Stiker Info Mitra Belum Diisi'));
			$this->form_validation->set_rules('kbs', 'Kaca Display Depan', 'required',
				array('required' => 'Kaca Display Depan Belum Diisi'));
			$this->form_validation->set_rules('kdsp', 'Kaca Dapur Depan dan Samping', 'required', 
				array('required' => 'Kaca Dapur Depan dan Samping Belum Diisi'));
			$this->form_validation->set_rules('ksdn', 'Kaca Sleding Depan', 'required',
				array('required' => 'Kaca Sleding Depan Belum Diisi'));
			$this->form_validation->set_rules('cs', 'Cermin Sleding', 'required', 	
				array('required' => 'Cermin Sleding Belum Diisi'));
			$this->form_validation->set_rules('kta', 'Kolong Tempat Adonan', 'required',
				array('required' => 'Kolong Tempat Adonan Belum Diisi'));
			$this->form_validation->set_rules('tdp', 'Tempat Dapur Penggorengan', 'required',
				array('required' => 'Tempat Dapur Penggorengan Belum Diisi'));
			$this->form_validation->set_rules('kg', 'Kolong Gerobak', 'required',	
				array('required' => 'Kolong Gerobak Belum Diisi'));
			$this->form_validation->set_rules('bsm', 'Baskom', 'required',
				array('required' => 'Baskom Belum Diisi'));
			$this->form_validation->set_rules('wjn', 'Wajan', 'required',
				array('required' => 'Wajan Belum Diisi'));
			$this->form_validation->set_rules('sdt', 'Sodet', 'required',
				array('required' => 'Sodet Belum Diisi'));
			$this->form_validation->set_rules('kpr', 'Kompor', 'required',
				array('required' => 'Kompor Belum Diisi'));
			$this->form_validation->set_rules('cpn', 'Capitan', 'required',
				array('required' => 'Capitan Belum Diisi'));
			$this->form_validation->set_rules('ema', 'Ember Air', 'required',
				array('required' => 'Ember Air Belum Diisi'));
			$this->form_validation->set_rules('lkn', 'Lap Kain', 'required',
				array('required' => 'Lap Kain Belum Diisi'));
			$this->form_validation->set_rules('lkc', 'Lap Kaca', 'required',
				array('required' => 'Lap Kaca Belum Diisi'));
			$this->form_validation->set_rules('bgn', 'Bentuk Gorengan', 'required',
				array('required' => 'Bentuk Gorengan Belum Diisi'));
			$this->form_validation->set_rules('tcs', 'Tepung Crispy', 'required',
				array('required' => 'Tepung Crispy Belum Diisi'));
			$this->form_validation->set_rules('mgdw', 'Minyak Goreng Di Wajan', 'required',
				array('required' => 'Minyak Goreng Di Wajan Belum Diisi'));
			$this->form_validation->set_rules('ulasan', 'Ulasan', 'required|min_length[10]',
				array('required' => 'Ulasan Belum Diisi',
					  'min_length' => 'Panjang Ulasan Kurang Dari 10 Huruf'
					));
			$this->form_validation->set_rules('catatan', 'Catatan', 'required|min_length[10]',
				array('required' => 'Catatan Belum Diisi',
					  'min_length' => 'Panjang Catatan Kurang Dari 10 Huruf'
					));
			
			if ($this->form_validation->run() == TRUE) 
			{
				$config['upload_path'] ='./assets/survei';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size'] = '2048';
				$config['file_name'] = 'gambar'.time();

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('foto')) 
				{ 
					$gbr  = $this->upload->data(); 
					if ($this->upload->do_upload('foto1'))
				{ 	
					$gbr1 = $this->upload->data(); 
					if ($this->upload->do_upload('foto2')) 
				{ 	
					$gbr2 = $this->upload->data();
					if ($this->upload->do_upload('foto3')) 
				{
					$gbr3 = $this->upload->data(); 

					$survei_data = array(
					'member' 		=> $this->input->post('member', TRUE),
					'tanggal' 		=> $this->input->post('tanggal', TRUE),
					'spd' 		=> $this->input->post('spd', TRUE),
					'spkn' 		=> $this->input->post('spkn', TRUE),
					'spki' 		=> $this->input->post('spki', TRUE),
					'rmb' 		=> $this->input->post('rmb', TRUE),
					'shr' 		=> $this->input->post('shr', TRUE),
					'sdp' 		=> $this->input->post('sdp', TRUE),
					'sim' 		=> $this->input->post('sim', TRUE),
					'kbs' 		=> $this->input->post('kbs', TRUE),
					'kdsp' 		=> $this->input->post('kdsp', TRUE),
					'ksdn' 		=> $this->input->post('ksdn', TRUE),
					'cs' 		=> $this->input->post('cs', TRUE),
					'kta' 		=> $this->input->post('kta', TRUE),
					'tdp' 		=> $this->input->post('tdp', TRUE),
					'kg' 		=> $this->input->post('kg', TRUE),
					'bsm' 		=> $this->input->post('bsm', TRUE),
					'wjn' 		=> $this->input->post('wjn', TRUE),
					'sdt' 		=> $this->input->post('sdt', TRUE),
					'kpr' 		=> $this->input->post('kpr', TRUE),
					'cpn' 		=> $this->input->post('cpn', TRUE),
					'ema' 		=> $this->input->post('ema', TRUE),
					'lkn' 		=> $this->input->post('lkn', TRUE),
					'lkc' 		=> $this->input->post('lkc', TRUE),
					'bgn' 		=> $this->input->post('bgn', TRUE),
					'tcs' 		=> $this->input->post('tcs', TRUE),
					'mgdw' 		=> $this->input->post('mgdw', TRUE),
					'ulasan' 		=> $this->input->post('ulasan', TRUE),
					'catatan' 		=> $this->input->post('catatan', TRUE),
					'gambar'		=> $gbr['file_name'],
					'gambar1'		=> $gbr1['file_name'],
					'gambar2'		=> $gbr2['file_name'],
					'gambar3'		=> $gbr3['file_name'],
					'val1' 			=> ($this->input->post('spd')+$this->input->post('spkn')+
										$this->input->post('spki')+$this->input->post('rmb')+
										$this->input->post('shr')+$this->input->post('sdp')+
										$this->input->post('sim')+$this->input->post('kbs')+
										$this->input->post('kdsp')+$this->input->post('ksdn')+
										$this->input->post('cs')+$this->input->post('kta')+
										$this->input->post('tdp')+$this->input->post('kg')+
										$this->input->post('bsm')+$this->input->post('wjn')+
										$this->input->post('sdt')+$this->input->post('kpr')+
										$this->input->post('cpn')+$this->input->post('ema')+
										$this->input->post('lkn')+$this->input->post('lkc')+
										$this->input->post('bgn')+$this->input->post('tcs')+
										$this->input->post('mgdw'))/25,
				);

				$this->m_admin->insert('t_survei', $survei_data);
				redirect('survei');
				}else{
					$this->session->set_flashdata('alert', 'Anda Belum Memilih Foto');
				}
				}else{
					$this->session->set_flashdata('alert', 'Anda Belum Memilih Foto');
				}
				}else{
					$this->session->set_flashdata('alert', 'Anda Belum Memilih Foto');
				}
				}else{
					$this->session->set_flashdata('alert', 'Anda Belum Memilih Foto');
				}
			}					
		}

		$data['member'] = $this->input->post('member', TRUE);
		$data['tanggal'] = $this->input->post('tanggal', TRUE);
		$data['spd'] = $this->input->post('spd', TRUE);
		$data['spkn'] = $this->input->post('spkn', TRUE);
		$data['spki'] = $this->input->post('spki', TRUE);
		$data['rmb'] = $this->input->post('rmb', TRUE);
		$data['shr'] = $this->input->post('shr', TRUE);
		$data['sdp'] = $this->input->post('sdp', TRUE);
		$data['sim'] = $this->input->post('sim', TRUE);
		$data['kbs'] = $this->input->post('kbs', TRUE);
		$data['kdsp'] = $this->input->post('kdsp', TRUE);
		$data['ksdn'] = $this->input->post('ksdn', TRUE);
		$data['cs'] = $this->input->post('cs', TRUE);
		$data['kta'] = $this->input->post('kta', TRUE);
		$data['tdp'] = $this->input->post('tdp', TRUE);
		$data['kg'] = $this->input->post('kg', TRUE);
		$data['bsm'] = $this->input->post('bsm', TRUE);
		$data['wjn'] = $this->input->post('wjn', TRUE);
		$data['sdt'] = $this->input->post('sdt', TRUE);
		$data['kpr'] = $this->input->post('kpr', TRUE);
		$data['cpn'] = $this->input->post('cpn', TRUE);
		$data['ema'] = $this->input->post('ema', TRUE);
		$data['lkn'] = $this->input->post('lkn', TRUE);
		$data['lkc'] = $this->input->post('lkc', TRUE);
		$data['bgn'] = $this->input->post('bgn', TRUE);
		$data['tcs'] = $this->input->post('tcs', TRUE);
		$data['mgdw'] = $this->input->post('mgdw', TRUE);
		$data['ulasan'] = $this->input->post('ulasan', TRUE);
		$data['catatan'] = $this->input->post('catatan', TRUE);

		$data['header'] = "Form Survei Member";
		if ($this->session->userdata('level') == 1) {
			$this->template->admin('survei/form_input', $data);
		}else{
			$this->template->survei('survei/form_input', $data);
		}
	}




	function update_data(){
		$id_survei = $this->uri->segment(3);
		$data['listing'] = $this->m_admin->get_all('t_member');

		if ($this->input->post('submit', TRUE) == 'Submit')
		{
			$this->form_validation->set_rules('member', 'Nama Member', 'required',
				array('required' => 'Nama Member Belum Diisi'));
			$this->form_validation->set_rules('tanggal', 'Tanggal', 'required',
				array('required' => 'Tanggal Belum Diisi'));
			$this->form_validation->set_rules('spd', 'Spanduk Depan', 'required',
				array('required' => 'Spanduk Depan Belum Diisi'));
			$this->form_validation->set_rules('spkn', 'Spanduk Samping Kanan', 'required',
				array('required' => 'Spanduk Samping Kanan Belum Diisi'));
			$this->form_validation->set_rules('spki', 'Spanduk Samping Kiri', 'required',
				array('required' => 'Spanduk Samping Kanan Belum Diisi'));
			$this->form_validation->set_rules('rmb', 'Rumbai', 'required',
				array('required' => 'Rumbai Belum Diisi'));
			$this->form_validation->set_rules('shr', 'Stiker Harga', 'required',
				array('required' => 'Stiker Harga Belum Diisi'));
			$this->form_validation->set_rules('sdp', 'Stiker Depan', 'required',
				array('required' => 'Stiker Depan Belum Diisi'));
			$this->form_validation->set_rules('sim', 'Stiker Info Mitra', 'required',
				array('required' => 'Stiker Info Mitra Belum Diisi'));
			$this->form_validation->set_rules('kbs', 'Kaca Display Depan', 'required',
				array('required' => 'Kaca Display Depan Belum Diisi'));
			$this->form_validation->set_rules('kdsp', 'Kaca Dapur Depan dan Samping', 'required', 
				array('required' => 'Kaca Dapur Depan dan Samping Belum Diisi'));
			$this->form_validation->set_rules('ksdn', 'Kaca Sleding Depan', 'required',
				array('required' => 'Kaca Sleding Depan Belum Diisi'));
			$this->form_validation->set_rules('cs', 'Cermin Sleding', 'required', 	
				array('required' => 'Cermin Sleding Belum Diisi'));
			$this->form_validation->set_rules('kta', 'Kolong Tempat Adonan', 'required',
				array('required' => 'Kolong Tempat Adonan Belum Diisi'));
			$this->form_validation->set_rules('tdp', 'Tempat Dapur Penggorengan', 'required',
				array('required' => 'Tempat Dapur Penggorengan Belum Diisi'));
			$this->form_validation->set_rules('kg', 'Kolong Gerobak', 'required',	
				array('required' => 'Kolong Gerobak Belum Diisi'));
			$this->form_validation->set_rules('bsm', 'Baskom', 'required',
				array('required' => 'Baskom Belum Diisi'));
			$this->form_validation->set_rules('wjn', 'Wajan', 'required',
				array('required' => 'Wajan Belum Diisi'));
			$this->form_validation->set_rules('sdt', 'Sodet', 'required',
				array('required' => 'Wajan Belum Diisi'));
			$this->form_validation->set_rules('kpr', 'Kompor', 'required',
				array('required' => 'Kompor Belum Diisi'));
			$this->form_validation->set_rules('cpn', 'Capitan', 'required',
				array('required' => 'Capitan Belum Diisi'));
			$this->form_validation->set_rules('ema', 'Ember Air', 'required',
				array('required' => 'Ember Air Belum Diisi'));
			$this->form_validation->set_rules('lkn', 'Lap Kain', 'required',
				array('required' => 'Lap Kain Belum Diisi'));
			$this->form_validation->set_rules('lkc', 'Lap Kaca', 'required',
				array('required' => 'Lap Kaca Belum Diisi'));
			$this->form_validation->set_rules('bgn', 'Bentuk Gorengan', 'required',
				array('required' => 'Bentuk Gorengan Belum Diisi'));
			$this->form_validation->set_rules('tcs', 'Tepung Crispy', 'required',
				array('required' => 'Tepung Crispy Belum Diisi'));
			$this->form_validation->set_rules('mgdw', 'Minyak Goreng Di Wajan', 'required',
				array('required' => 'Minyak Goreng Di Wajan Belum Diisi'));
			$this->form_validation->set_rules('ulasan', 'Ulasan', 'required|min_length[10]',
				array('required' => 'Ulasan Belum Diisi',
					  'min_length' => 'Panjang Ulasan Kurang Dari 10 Huruf'
					));
			$this->form_validation->set_rules('catatan', 'Catatan', 'required|min_length[10]',
				array('required' => 'Catatan Belum Diisi',
					  'min_length' => 'Panjang Catatan Kurang Dari 10 Huruf'
					));
			
			if ($this->form_validation->run() == TRUE) 
			{
				$config['upload_path'] ='./assets/survei';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size'] = '2048';
				$config['file_name'] = 'gambar'.time();

				$this->load->library('upload', $config);

				$survei_data = array(
					'member' 		=> $this->input->post('member', TRUE),
					'tanggal' 		=> $this->input->post('tanggal', TRUE),
					'spd' 		=> $this->input->post('spd', TRUE),
					'spkn' 		=> $this->input->post('spkn', TRUE),
					'spki' 		=> $this->input->post('spki', TRUE),
					'rmb' 		=> $this->input->post('rmb', TRUE),
					'shr' 		=> $this->input->post('shr', TRUE),
					'sdp' 		=> $this->input->post('sdp', TRUE),
					'sim' 		=> $this->input->post('sim', TRUE),
					'kbs' 		=> $this->input->post('kbs', TRUE),
					'kdsp' 		=> $this->input->post('kdsp', TRUE),
					'ksdn' 		=> $this->input->post('ksdn', TRUE),
					'cs' 		=> $this->input->post('cs', TRUE),
					'kta' 		=> $this->input->post('kta', TRUE),
					'tdp' 		=> $this->input->post('tdp', TRUE),
					'kg' 		=> $this->input->post('kg', TRUE),
					'bsm' 		=> $this->input->post('bsm', TRUE),
					'wjn' 		=> $this->input->post('wjn', TRUE),
					'sdt' 		=> $this->input->post('sdt', TRUE),
					'kpr' 		=> $this->input->post('kpr', TRUE),
					'cpn' 		=> $this->input->post('cpn', TRUE),
					'ema' 		=> $this->input->post('ema', TRUE),
					'lkn' 		=> $this->input->post('lkn', TRUE),
					'lkc' 		=> $this->input->post('lkc', TRUE),
					'bgn' 		=> $this->input->post('bgn', TRUE),
					'tcs' 		=> $this->input->post('tcs', TRUE),
					'mgdw' 		=> $this->input->post('mgdw', TRUE),
					'ulasan' 		=> $this->input->post('ulasan', TRUE),
					'catatan' 		=> $this->input->post('catatan', TRUE),
					'val1' 			=> ($this->input->post('spd')+$this->input->post('spkn')+
										$this->input->post('spki')+$this->input->post('rmb')+
										$this->input->post('shr')+$this->input->post('sdp')+
										$this->input->post('sim')+$this->input->post('kbs')+
										$this->input->post('kdsp')+$this->input->post('ksdn')+
										$this->input->post('cs')+$this->input->post('kta')+
										$this->input->post('tdp')+$this->input->post('kg')+
										$this->input->post('bsm')+$this->input->post('wjn')+
										$this->input->post('sdt')+$this->input->post('kpr')+
										$this->input->post('cpn')+$this->input->post('ema')+
										$this->input->post('lkn')+$this->input->post('lkc')+
										$this->input->post('bgn')+$this->input->post('tcs')+
										$this->input->post('mgdw'))/25,
				);
				if ($this->upload->do_upload('foto')) 
				{
					$gbr = $this->upload->data();
					unlink('assets/survei/'.$this->input->post('old_pict', TRUE)); 
					$survei_data['gambar'] = $gbr['file_name'];
				$this->m_admin->update('t_survei', $survei_data, array('id_survei' => $id_survei));
				redirect('survei');
				}elseif ($this->upload->do_upload('foto1')) 
				{
					$gbr1 = $this->upload->data();
					unlink('assets/survei/'.$this->input->post('old_pict1', TRUE)); 
					$survei_data['gambar1'] = $gbr1['file_name'];
				$this->m_admin->update('t_survei', $survei_data, array('id_survei' => $id_survei));
				redirect('survei');
				}elseif ($this->upload->do_upload('foto2')) 
				{
					$gbr2 = $this->upload->data();
					unlink('assets/survei/'.$this->input->post('old_pict2', TRUE)); 
					$survei_data['gambar2'] = $gbr2['file_name'];
				$this->m_admin->update('t_survei', $survei_data, array('id_survei' => $id_survei));
				redirect('survei');
				}elseif ($this->upload->do_upload('foto3')) 
				{
					$gbr3 = $this->upload->data();
					unlink('assets/survei/'.$this->input->post('old_pict3', TRUE)); 
					$survei_data['gambar3'] = $gbr3['file_name'];
				$this->m_admin->update('t_survei', $survei_data, array('id_survei' => $id_survei));
				redirect('survei');
				}else{
				$this->m_admin->update('t_survei', $survei_data, array('id_survei' => $id_survei));
				redirect('survei');
				}
			}
		}

		$res = $this->m_admin->get_where('t_survei', array('id_survei' => $id_survei));
		foreach ($res->result() as $key) {
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
		}
		$data['header'] = "Update Data";
		if ($this->session->userdata('level') == 1) {
			$this->template->admin('survei/form_input', $data);
		}else{
			$this->template->survei('survei/form_input', $data);
		}

	}	

	function cek_login()
	{
		if (!$this->session->userdata('admin')) 
		{
			redirect('login');
		}

	}

	function detail()
	{
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


		if ($this->session->userdata('level') == 1) {
			$this->template->admin('survei/detail_survei', $data);
		}else{
			$this->template->survei('survei/detail_survei', $data);
		}
	}

	function delete_data()
	{
		$id_survei = $this->uri->segment(3);
		$res = $this->m_admin->get_where('t_survei', array('id_survei' => $id_survei));
		foreach ($res->result() as $key) {
			$data = $key->gambar;
			unlink('./assets/survei/'.$data);
			$data1 = $key->gambar1;
			unlink('assets/survei/'.$data1);
			$data2 = $key->gambar2;
			unlink('assets/survei/'.$data2);
			$data3 = $key->gambar3;
			unlink('assets/survei/'.$data3);
			
		}
		$this->m_admin->delete('t_survei', array('id_survei' => $id_survei ));
		redirect('survei');

	}


}
