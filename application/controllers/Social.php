<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Social extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('user_id') <= 0 )
        {
            redirect('login');
        }
		$this->load->model('M_social');
	}

	public function index()
	{
		$data['title'] = "Sociales";
		$this->load->view('administrator/Header');
		$this->load->view('administrator/Sidebar');
		$this->load->view('administrator/Social', $data, FALSE);
		$this->load->view('administrator/Footer');
		$this->load->view('administrator/script_social');	
	}

	public function ajax_list()
	{

		$list_social = $this->M_social->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list_social as $social) {
			$no++;
			$row = array();
			$row[] = $social->name_social;
			$row[] = $social->url_social;

			if($social->imag_social)
				$row[] = '<a href="'.base_url('upload/'.$social->imag_social).'" target="_blank"><img src="'.base_url('upload/'.$social->imag_social).'" class="img-responsive" /></a>';
			else
				$row[] = '(No tiene imagen)';

			$row[] = $social->status;
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_social('."'".$social->id_social."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_social('."'".$social->id_social."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->M_social->count_all(),
						"recordsFiltered" => $this->M_social->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->M_social->get_by_id($id);

		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		
		$data = array(
				'name_social' => $this->input->post('name_social'),
				'url_social' => $this->input->post('url_social'),
				'status' => $this->input->post('status'),
			);

		if(!empty($_FILES['imag_social']['name']))
		{
			$upload = $this->_do_upload();
			$data['imag_social'] = $upload;
		}

		$insert = $this->M_social->save($data);

		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
				'name_social' => $this->input->post('name_social'),
				'url_social' => $this->input->post('url_social'),
				'status' => $this->input->post('status'),
			);

		if($this->input->post('remove_imag_social')) // if remove photo checked
		{
			if(file_exists('upload/'.$this->input->post('remove_imag_social')) && $this->input->post('remove_imag_social'))
				unlink('upload/'.$this->input->post('remove_imag_social'));
			$data['imag_social'] = '';
		}

		if(!empty($_FILES['imag_social']['name']))
		{
			$upload = $this->_do_upload();
			
			//delete file
			$social = $this->M_social->get_by_id($this->input->post('id_social'));
			if(file_exists('upload/'.$social->imag_social) && $social->imag_social)
				unlink('upload/'.$social->imag_social);

			$data['imag_social'] = $upload;
		}

		$this->M_social->update(array('id_social' => $this->input->post('id_social')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		//delete file
		$social = $this->M_social->get_by_id($id);
		if(file_exists('upload/'.$social->imag_social) && $social->imag_social)
			unlink('upload/'.$social->imag_social);
		
		$this->M_social->delete_by_id($id);
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

        if(!$this->upload->do_upload('imag_social')) //upload and validate
        {
            $data['inputerror'][] = 'imag_social';
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

		if($this->input->post('name_social') == '')
		{
			$data['inputerror'][] = 'name_social';
			$data['error_string'][] = 'Nombre es requerido';
			$data['status'] = FALSE;
		}

		if($this->input->post('url_social') == '')
		{
			$data['inputerror'][] = 'url_social';
			$data['error_string'][] = 'URL es requerido';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
}

/* End of file Social.php */
/* Location: ./application/controllers/Social.php */
