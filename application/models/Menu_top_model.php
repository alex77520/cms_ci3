<?php
class Menu_top_model extends CI_Model {

	public function all()
	{
		$this->db->where('status', 1);
		return $this->db->get("menus_top")
					->result_array();
	}

}