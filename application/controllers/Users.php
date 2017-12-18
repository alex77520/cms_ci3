<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('user_id') <= 0 )
        {
            redirect('login');
        }
		$this->load->model('User_model');
	}

	// List all your items
	public function index( $offset = 0 )
	{
		$data['title'] = "Usuario";
		$data['rol'] = $this->User_model->get_rol();
		$this->load->view('administrator/Header');
		$this->load->view('administrator/Sidebar');
		$this->load->view('administrator/Users', $data, FALSE);
		$this->load->view('administrator/Footer');
		$this->load->view('administrator/script_users');	
	}

	public function ajax_list()
	{
		$list_users = $this->User_model->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list_users as $users) {
			$no++;
			$row = array();
			$row[] = $users->first_name;
			$row[] = $users->last_name;
			$row[] = $users->email;
			$row[] = $users->username;
			$row[] = $users->password;
			$row[] = $users->rol;
			if($users->status==0)
			$row[] = '<span class="fa fa-times"></span>';
			else
			$row[] = '<span class="fa fa-check"></span>';
			$row[] = $users->created;

			//add html for action
			$row[] = '<div class="btn-group">
                  <button type="button" class="btn btn-warning btn-sm">Opcion</button>
                  <button type="button" class="btn btn-warning dropdown-toggle btn-sm" data-toggle="dropdown">
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="javascript:void(0)" title="Edit" onclick="edit_users('."'".$users->user_id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a></li>
                    <li class="divider"></li>
                    <li><a href="javascript:void(0)" title="Hapus" onclick="delete_users('."'".$users->user_id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a></li>
                  </ul>
                </div>';

			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->User_model->count_all(),
						"recordsFiltered" => $this->User_model->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->User_model->get_by_id($id);
		$data->created = ($data->created == '0000-00-00') ? '' : $data->created; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		$data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'id_rol' => $this->input->post('rol'),
				'status' => $this->input->post('status'),
				'created' => $this->input->post('created'),
			);
		$insert = $this->User_model->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'id_rol' => $this->input->post('rol'),
				'status' => $this->input->post('status'),
				'created' => $this->input->post('created'),
			);
		$this->User_model->update(array('user_id' => $this->input->post('user_id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->User_model->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('first_name') == '')
		{
			$data['inputerror'][] = 'first_name';
			$data['error_string'][] = 'Nombre es requerido';
			$data['status'] = FALSE;
		}

		if($this->input->post('last_name') == '')
		{
			$data['inputerror'][] = 'last_name';
			$data['error_string'][] = 'Apellidos es requerido';
			$data['status'] = FALSE;
		}

		if($this->input->post('email') == '')
		{
			$data['inputerror'][] = 'email';
			$data['error_string'][] = 'Email es requerido';
			$data['status'] = FALSE;
		}

		if($this->input->post('username') == '')
		{
			$data['inputerror'][] = 'username';
			$data['error_string'][] = 'Usuario es requerido';
			$data['status'] = FALSE;
		}

		if($this->input->post('password') == '')
		{
			$data['inputerror'][] = 'password';
			$data['error_string'][] = 'Contraseña es requerido';
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
