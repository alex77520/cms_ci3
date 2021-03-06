<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_news extends CI_Model {

	var $table = 'news';
	var $column_order = array('redaction','title','date','imag_news','description_short','description','url_news','status',null); //set column field database for datatable orderable
	var $column_search = array('title','description_short','description_full'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('id_news' => 'desc'); // default order 

   function __construct()
    {
            parent::__construct();
            // Your own constructor code
    }
   public function permission(){
    $data = array();
    $roldesconocido=$this->session->userdata('id_rol');
    $this->db->select('*');
    $this->db->from('permissions p');
    $this->db->where('p.id_rol', $roldesconocido);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row){
                    $data[] = $row;
                }
        }
        $query->free_result();
        return $data;
   }
	public function _get_datatables_query()
	{
		$roldesconocido=$this->session->userdata('id_rol');
		$this->db->select('*');
		$this->db->from('news n');
		$this->db->join('permissions p', 'n.category=p.id_category');
		$this->db->where('p.id_rol', $roldesconocido);
		//$this->db->where('status', 1);

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
		$this->db->where('id_news',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id_news', $id);
		$this->db->delete($this->table);
	}

}

/* End of file M_news.php */
/* Location: ./application/models/M_news.php */