<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permissions extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('user_id') <= 0 )
        {
            redirect('login');
        }
		$this->load->model('M_permission');
	}

	// List all your items
	public function index( $offset = 0 )
	{
		$data['title'] = "Permisos";
		$data['rol'] = $this->M_permission->get_rol();
		$data['categoria'] = $this->M_permission->get_categoria();
		$this->load->view('administrator/Header');
		$this->load->view('administrator/Sidebar');
		$this->load->view('administrator/Permissions', $data, FALSE);
		$this->load->view('administrator/Footer');
		$this->load->view('administrator/script_permissions');	
	}

	public function ajax_list()
	{
		$list_perms = $this->M_permission->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list_perms as $permission) {
			$no++;
			$row = array();
			$row[] = $permission->id_rol;
			$row[] = $permission->id_category;

			if ($permission->inserted == 0)
			$row[] = '<span class="fa fa-times"></span>';
			else
			$row[] = '<span class="fa fa-check"></span>';

			if ($permission->readed == 0)
			$row[] = '<span class="fa fa-times"></span>';
			else
			$row[] = '<span class="fa fa-check"></span>';
			
			if ($permission->updated == 0)
			$row[] = '<span class="fa fa-times"></span>';
			else
			$row[] = '<span class="fa fa-check"></span>';

			if ($permission->deleted == 0)
			$row[] = '<span class="fa fa-times"></span>';
			else
			$row[] = '<span class="fa fa-check"></span>';

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_permission('."'".$permission->id_permissions."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_permission('."'".$permission->id_permissions."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->M_permission->count_all(),
						"recordsFiltered" => $this->M_permission->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->M_permission->get_by_id($id);
		//$data->created = ($data->created == '0000-00-00') ? '' : $data->created; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();

		$data = array(
				'id_rol' => $this->input->post('id_rol'),
				'id_category' => $this->input->post('id_category'),
				'inserted' => $this->input->post('inserted'),
				'readed' => $this->input->post('readed'),
				'updated' => $this->input->post('updated'),
				'deleted' => $this->input->post('deleted'),
			);
		$insert = $this->M_permission->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
	$datas = array(
	'id_rol' => $this->input->post('id_rol'),			
	'id_category' => $this->input->post('id_category'),
			);
	$this->M_permission->updates(array('id_permissions' => $this->input->post('id_permissions')), $datas);
//for permisos update
		$data = array(
				'inserted' => $this->input->post('inserted'),
				'readed' => $this->input->post('readed'),
				'updated' => $this->input->post('updated'),
				'deleted' => $this->input->post('deleted'),
			);
		$this->M_permission->update(array('id_rol' => $this->input->post('id_rol')), $data);
		//for update the categoria
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->M_permission->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('id_rol') == '')
		{
			$data['inputerror'][] = 'id_rol';
			$data['error_string'][] = 'Rol es requerido';
			$data['status'] = FALSE;
		}

		if($this->input->post('id_category') == '')
		{
			$data['inputerror'][] = 'id_category';
			$data['error_string'][] = 'Categoria es requerido';
			$data['status'] = FALSE;
		}

		if($this->input->post('inserted') == '')
		{
			$data['inputerror'][] = 'inserted';
			$data['error_string'][] = 'Insertar es requerido';
			$data['status'] = FALSE;
		}

		if($this->input->post('readed') == '')
		{
			$data['inputerror'][] = 'readed';
			$data['error_string'][] = 'Leer es requerido';
			$data['status'] = FALSE;
		}

		if($this->input->post('updated') == '')
		{
			$data['inputerror'][] = 'updated';
			$data['error_string'][] = 'Actualizar es requerido';
			$data['status'] = FALSE;
		}

		if($this->input->post('deleted') == '')
		{
			$data['inputerror'][] = 'deleted';
			$data['error_string'][] = 'Eliminar es requerido';
			$data['status'] = FALSE;
		}
		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}



}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */
