<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	private $permission;
	public function __construct()
	{
		parent::__construct();
		///Load Dependencies
		if($this->session->userdata('user_id') <= 0 )
        {
            redirect('login');
        }
		$this->permission = $this->backend_lib->control();
		$this->load->model('M_category');
	}

	// List all your items
	public function index()
	{
		$data['title'] = "Category";
		//$data['rol'] = $this->M_category->get_rol();
		$data['permisos'] = $this->permission;
		$this->load->view('administrator/Header');
		$this->load->view('administrator/Sidebar');
		$this->load->view('administrator/Category', $data, FALSE);
		$this->load->view('administrator/Footer');
		$this->load->view('administrator/script_category');	
		
	}

	public function ajax_list()
	{
		$list_cat = $this->M_category->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list_cat as $category) {
			$no++;
			$row = array();
			$row[] = $category->name_cat;
			$row[] = $category->date;

			if($category->imag_category)
			$row[] = '<a href="'.base_url('upload/'.$category->imag_category).'" target="_blank"><img src="'.base_url('upload/'.$category->imag_category).'" class="img-responsive" /></a>';
			else
			$row[] = '(No Category)';	

			$row[] = $category->description;
			$row[] = $category->url_category;
			if($category->status==0)
			$row[] = '<span class="fa fa-times"></span>';
			else
			$row[] = '<span class="fa fa-check"></span>';

			$row[] = '<div class="btn-group">
                  <button type="button" class="btn btn-warning btn-sm">Opcion</button>
                  <button type="button" class="btn btn-warning dropdown-toggle btn-sm" data-toggle="dropdown">
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="javascript:void(0)" title="Edit" onclick="edit_category('."'".$category->id_category."'".')">Editar</a></li>
                    <li class="divider"></li>
                    <li><a href="javascript:void(0)" title="Hapus" onclick="delete_category('."'".$category->id_category."'".')">Eliminar</a></li>
                  </ul>
                </div>';
	
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->M_category->count_all(),
						"recordsFiltered" => $this->M_category->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->M_category->get_by_id($id);
		$data->date = ($data->date == '0000-00-00') ? '' : $data->date; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		
		$url = $this->input->post('url_category');

		$data = array(
				'name_cat' => $this->input->post('name_cat'),
				'date' => $this->input->post('date'),
				'description' => $this->input->post('description'),
				'url_category' => strtolower(convert_accented_characters(url_title($url))),
				'status' => $this->input->post('status'),
			);

		if(!empty($_FILES['imag_category']['name']))
		{
			$upload = $this->_do_upload();
			$data['imag_category'] = $upload;
		}

		$insert = $this->M_category->save($data);

		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
				'name_cat' => $this->input->post('name_cat'),
				'date' => $this->input->post('date'),
				'description' => $this->input->post('description'),
				'url_category' => $this->input->post('url_category'),
				'status' => $this->input->post('status'),
			);

		if($this->input->post('remove_category')) // if remove imag_category checked
		{
			if(file_exists('upload/'.$this->input->post('remove_category')) && $this->input->post('remove_category'))
				unlink('upload/'.$this->input->post('remove_category'));
			$data['imag_category'] = '';
		}

		if(!empty($_FILES['imag_category']['name']))
		{
			$upload = $this->_do_upload();
			
			//delete file
			$category = $this->M_category->get_by_id($this->input->post('id_category'));
			if(file_exists('upload/'.$category->imag_category) && $category->imag_category)
				unlink('upload/'.$category->imag_category);

			$data['imag_category'] = $upload;
		}

		$this->M_category->update(array('id_category' => $this->input->post('id_category')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		//delete file
		$category = $this->M_category->get_by_id($id);
		if(file_exists('upload/'.$category->imag_category) && $category->imag_category)
			unlink('upload/'.$category->imag_category);
		
		$this->M_category->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	private function _do_upload()
	{
		$config['upload_path']          = 'upload/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 500; //set max size allowed in Kilobyte
        $config['max_width']            = 2000; // set max width image allowed
        $config['max_height']           = 2200; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('imag_category')) //upload and validate
        {
            $data['inputerror'][] = 'imag_category';
			$data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
		return $this->upload->data('file_name');
	}

	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('name_cat') == '')
		{
			$data['inputerror'][] = 'name_cat';
			$data['error_string'][] = 'Nombre de categoría es requerido';
			$data['status'] = FALSE;
		}

		if($this->input->post('date') == '')
		{
			$data['inputerror'][] = 'date';
			$data['error_string'][] = 'Fecha es requerido';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
}

/* End of file Category.php */
/* Location: ./application/controllers/Category.php */
