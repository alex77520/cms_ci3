<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend_model extends CI_Model {

	public function getID($url_category)
	{
		$this->db->like('url_category', $url_category);
		$result = $this->db->get('category');
		return $result->row();
	}

	public function getPermisos($category, $rol)
	{
		$this->db->where('id_category', $category);
		$this->db->where('id_rol', $rol);
		$resultado = $this->db->get('permissions');
		return $resultado->row();
	}

}

/* End of file Backend_model.php */
/* Location: ./application/models/Backend_model.php */