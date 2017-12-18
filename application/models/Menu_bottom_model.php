<?php
class Menu_bottom_model extends CI_Model {

	public function all()
	{
		$this->db->where('status', 1);
		return $this->db->get("menus_bottom")
					->result_array();
	}

}