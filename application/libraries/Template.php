<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template
{
	function __construct()
	{
		$this->ci =&get_instance();
	}

	function admin($template, $data= '')
	{
		$data['content'] = $this->ci->load->view($template, $data, TRUE);
		$data['nav'] = $this->ci->load->view('admin/nav', $data, TRUE);

		$this->ci->load->view('admin/dashboard', $data);
	}
	function survei($template, $data= '')
	{
		$data['content'] = $this->ci->load->view($template, $data, TRUE);
		$data['nav'] = $this->ci->load->view('tim_survei/nav', $data, TRUE);

		$this->ci->load->view('tim_survei/dashboard', $data);
	}
	function member($template, $data= '')
	{
		$data['content'] = $this->ci->load->view($template, $data, TRUE);
		$data['nav'] = $this->ci->load->view('member/nav', $data, TRUE);

		$this->ci->load->view('member/dashboard', $data);
	}
}
