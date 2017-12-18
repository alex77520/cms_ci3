<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menus extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		if($this->session->userdata('user_id') <= 0 )
        {
            redirect('login');
        }
		$this->load->model('M_menus');
	}

	public function index()
	{
		$data['title'] = "Menus";
		$this->load->view('administrator/Header');
		$this->load->view('administrator/Sidebar');
		$this->load->view('administrator/Menus', $data, FALSE);
		$this->load->view('administrator/Footer');
		$this->load->view('administrator/script_menus');
	}

	public function ajax_list()
	{
		$list = $this->M_menus->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $menus) {
			$no++;
			$row = array();
			$row[] = $menus->menu_name;
			$row[] = $menus->position;
			$row[] = $menus->slug;
			$row[] = $menus->date;
			$row[] = $menus->status;
			
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_menus('."'".$menus->id_menus."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_menus('."'".$menus->id_menus."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->M_menus->count_all(),
						"recordsFiltered" => $this->M_menus->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id_menus)
	{
		$data = $this->M_menus->get_by_id($id_menus);
		$data->date = ($data->date == '0000-00-00') ? '' : $data->date; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		$data = array(
				'menu_name' => $this->input->post('menu_name'),
				'position' => $this->input->post('position'),
				'slug' => $this->input->post('slug'),
				'date' => $this->input->post('date'),
				'status' => $this->input->post('status'),
			);
		$insert = $this->M_menus->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
				'menu_name' => $this->input->post('menu_name'),
				'position' => $this->input->post('position'),
				'slug' => $this->input->post('slug'),				
				'date' => $this->input->post('date'),
				'status' => $this->input->post('status'),
			);
		$this->M_menus->update(array('id_menus' => $this->input->post('id_menus')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->M_menus->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('menu_name') == '')
		{
			$data['inputerror'][] = 'menu_name';
			$data['error_string'][] = 'Nombre de Menu es requerido';
			$data['status'] = FALSE;
		}

		if($this->input->post('position') == '')
		{
			$data['inputerror'][] = 'position';
			$data['error_string'][] = 'Posicion de Menu es requerido';
			$data['status'] = FALSE;
		}

		if($this->input->post('slug') == '')
		{
			$data['inputerror'][] = 'slug';
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

/* End of file Menus.php */
/* Location: ./application/controllers/Menus.php */
