<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cek_member extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('template', 'form_validation'));
		$this->load->model('m_admin');
	}
	function index()
	{
		$data['header'] = "Data Member";	
		$data['data'] = $this->m_admin->get_all('t_member');
		$this->template->survei('tim_survei/manage_member', $data);
	}


}