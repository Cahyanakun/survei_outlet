<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cek_ts extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('template'));
		$this->load->model('m_admin');
	}
	function index()
	{
		$data['header'] = "Data Tim Survei";	
		$data['data'] = $this->m_admin->get_where('t_admin', array('level' => 2));
		$this->template->admin('admin/manage_ts', $data);
	}
	

}