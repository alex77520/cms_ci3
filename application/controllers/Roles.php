<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('user_id') <= 0 )
        {
            redirect('login');
        }
		$this->load->model('M_roles');
	}

	public function index()
	{
		$data['title'] = "Roles";
		$this->load->view('administrator/Header');
		$this->load->view('administrator/Sidebar');
		$this->load->view('administrator/Roles', $data, FALSE);
		$this->load->view('administrator/Footer');
		$this->load->view('administrator/script_roles');
	}

	public function ajax_list()
	{
		$list = $this->M_roles->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $rol) {
			$no++;
			$row = array();
			$row[] = $rol->name;
			$row[] = $rol->description;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_rol('."'".$rol->id_rol."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_rol('."'".$rol->id_rol."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->M_roles->count_all(),
						"recordsFiltered" => $this->M_roles->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->M_roles->get_by_id($id);
		//$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		$data = array(
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description'),
			);
		$insert = $this->M_roles->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description'),
			);
		$this->M_roles->update(array('id_rol' => $this->input->post('id_rol')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->M_roles->delete_by_id($id);
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
			$data['error_string'][] = 'Nombre es requerido';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
}

/* End of file Roles.php */
/* Location: ./application/views/administrator/Roles.php */
