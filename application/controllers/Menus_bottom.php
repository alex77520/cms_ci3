<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menus_bottom extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		if($this->session->userdata('user_id') <= 0 )
        {
            redirect('login');
        }
		$this->load->model('M_menus_bottom');
		$this->load->model('Model_public');

	}

	public function index()
	{
		$data['title'] = "Menu Principal";
		$data["category"] = $this->Model_public->get_categorys();
		$this->load->view('administrator/Header');
		$this->load->view('administrator/Sidebar');
		$this->load->view('administrator/Menus_bottom', $data, FALSE);
		$this->load->view('administrator/Footer');
		$this->load->view('administrator/script_menus_bottom');
	}

	public function ajax_list()
	{
		$list = $this->M_menus_bottom->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $menus) {
			$no++;
			$row = array();
			$row[] = $menus->name;
			$row[] = $menus->icon;
			$row[] = $menus->slug;
			$row[] = $menus->number;
			if($menus->status==0)
			$row[] = '<span class="fa fa-times"></span>';
			else
			$row[] = '<span class="fa fa-check"></span>';
			
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_menus_bottom('."'".$menus->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_menus_bottom('."'".$menus->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->M_menus_bottom->count_all(),
						"recordsFiltered" => $this->M_menus_bottom->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->M_menus_bottom->get_by_id($id);
		//$data->date = ($data->date == '0000-00-00') ? '' : $data->date; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		$data = array(
				'name' => $this->input->post('name'),
				'icon' => $this->input->post('icon'),
				'slug' => $this->input->post('slug'),
				'number' => $this->input->post('number'),
				'status' => $this->input->post('status'),
			);
		$insert = $this->M_menus_bottom->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
				'name' => $this->input->post('name'),
				'icon' => $this->input->post('icon'),
				'slug' => $this->input->post('slug'),
				'number' => $this->input->post('number'),
				'status' => $this->input->post('status'),
			);
		$this->M_menus_bottom->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->M_menus_bottom->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('name') == '')
		{
			$data['inputerror'][] = 'name';
			$data['error_string'][] = 'Nombre de Menu es requerido';
			$data['status'] = FALSE;
		}

		if($this->input->post('slug') == '')
		{
			$data['inputerror'][] = 'slug';
			$data['error_string'][] = 'La URL del Menu es requerido';
			$data['status'] = FALSE;
		}

		if($this->input->post('number') == '')
		{
			$data['inputerror'][] = 'number';
			$data['error_string'][] = 'Posicion de Menu es requerido';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

}

/* End of file Menus_top.php */
/* Location: ./application/controllers/Menus_top.php */
