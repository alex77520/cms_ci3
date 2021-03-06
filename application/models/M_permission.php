<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_permission extends CI_Model {

	var $table = 'permissions';
	var $column_order = array('id_rol','id_category','inserted','readed','updated','deleted',null); //set column field database for datatable orderable
	var $column_search = array('id_rol','id_category'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('id_permissions' => 'desc'); // default order 

	public function __construct()
	{
		parent::__construct();
	}

	private function _get_datatables_query()
	{
		
		
       $this->db->select('u.id_permissions, r.name as id_rol, u.id_category, u.inserted, u.readed, u.updated, u.deleted');
		$this->db->from('permissions u');
		$this->db->join('rol r', 'u.id_rol = r.id_rol');
		//$this->db->where('status', 0);
		$i = 0;
	
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id_permissions',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

   public function updates($where, $datas)
	{
		$this->db->update($this->table, $datas, $where);
		return $this->db->affected_rows();
	}
	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id_permissions', $id);
		$this->db->delete($this->table);
	}
    public function get_rol($value='')
    {
    	$rol=$this->db->get('rol');
    	return $rol->result();
    }
    public function get_categoria($value='')
    {
    	$category=$this->db->get('category');
    	return $category->result();
    }

    public function getPermission($id)
    {
		$this->db->from($this->table);
		$this->db->where('id_permissions',$id);
		$query = $this->db->get();

		return $query->row();
    }
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */