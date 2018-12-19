<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		
	}


	function insert($table='', $data='')
	{
		return $this->db->insert($table, $data);
	}

	function get_all($table)
	{
		$this->db->from($table);

		return $this->db->get();
	}

	function listing()
	{
		$this->db->from('t_nilai');

		return $this->db->get();
	}

	function get_where($table=null, $where=null)
	{
		$this->db->from($table);
		$this->db->where($where);

		return $this->db->get();

	}

	 function row($table= null)
	{
		$hasil = $this->db->get($table);
		return $hasil->num_rows();
	}
	function update($table = null, $data= null, $where= null)
	{
		$this->db->update($table, $data, $where);

	}
	function delete($table = null, $where= null)
	{
		$this->db->delete($table, $where);
		return TRUE;

	}

	function s_name()
	{
		$this->db->select('*');
		$this->db->from('t_survei');
		$this->db->join('t_member', 't_member.id_member = t_survei.member');
		$data = $this->db->get();
		return $data->result();
	}

	

	function s_name_id($id)
	{
		$this->db->select('*');
		$this->db->from('t_survei');
		$this->db->join('t_member', 't_member.id_member = t_survei.member');
		$this->db->where(array('md5(id_survei)' => $id));
		$data = $this->db->get();
		return $data->result();
	}



	function get_value($id)
	{
		$sql = "select jn.* from (select @f_id_member := $id p) parm, jumlah_nilai jn";
		$query1 = $this->db->query($sql);
		return $query1->result();

	}

	function delete_member($id){
		$this->db->where('id',$id)
				 ->delete('t_admin');
	}

}
