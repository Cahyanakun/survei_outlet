<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cek_member extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('template', 'form_validation'));
		$this->load->model(array('m_admin', 'm_lokasi'));
	}
	function index()
	{
		$data['header'] = "Data Member";	
		$data['data'] = $this->m_admin->get_all('t_member');
		$this->template->admin('admin/manage_member', $data);
	}

}