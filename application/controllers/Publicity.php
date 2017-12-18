<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publicity extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('user_id') <= 0 )
        {
            redirect('login');
        }
		$this->load->model('M_publicity');
	}

	public function index()
	{
		$data['title'] = "Publicidad";
		$this->load->view('administrator/Header');
		$this->load->view('administrator/Sidebar');
		$this->load->view('administrator/Publicity', $data, FALSE);
		$this->load->view('administrator/Footer');
		$this->load->view('administrator/script_publicity');	
	}

	public function ajax_list()
	{

		$list_publi = $this->M_publicity->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list_publi as $publicity) {
			$no++;
			$row = array();
			$row[] = $publicity->date;
			$row[] = $publicity->description;
			$row[] = $publicity->url_publi;
			if($publicity->status==0)
			$row[] = '<span class="fa fa-times"></span>';
			else
			$row[] = '<span class="fa fa-check"></span>';
		
			if($publicity->imag_publi)
				$row[] = '<a href="'.base_url('upload/'.$publicity->imag_publi).'" target="_blank"><img src="'.base_url('upload/'.$publicity->imag_publi).'" class="img-responsive" /></a>';
			else
				$row[] = '(No tiene imagen)';

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_publicity('."'".$publicity->id_publicity."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_publicity('."'".$publicity->id_publicity."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->M_publicity->count_all(),
						"recordsFiltered" => $this->M_publicity->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->M_publicity->get_by_id($id);
		$data->date = ($data->date == '0000-00-00') ? '' : $data->date; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		
		$data = array(
				'date' => $this->input->post('date'),
				'description' => $this->input->post('description'),
				'url_publi' => $this->input->post('url_publi'),
				'status' => $this->input->post('status'),
			);

		if(!empty($_FILES['imag_publi']['name']))
		{
			$upload = $this->_do_upload();
			$data['imag_publi'] = $upload;
		}

		$insert = $this->M_publicity->save($data);

		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
				'date' => $this->input->post('date'),
				'description' => $this->input->post('description'),
				'url_publi' => $this->input->post('url_publi'),
				'status' => $this->input->post('status'),
			);

		if($this->input->post('remove_imag_publi')) // if remove photo checked
		{
			if(file_exists('upload/'.$this->input->post('remove_imag_publi')) && $this->input->post('remove_imag_publi'))
				unlink('upload/'.$this->input->post('remove_imag_publi'));
			$data['imag_publi'] = '';
		}

		if(!empty($_FILES['imag_publi']['name']))
		{
			$upload = $this->_do_upload();
			
			//delete file
			$publicity = $this->M_publicity->get_by_id($this->input->post('id_publicity'));
			if(file_exists('upload/'.$publicity->imag_publi) && $publicity->imag_publi)
				unlink('upload/'.$publicity->imag_publi);

			$data['imag_publi'] = $upload;
		}

		$this->M_publicity->update(array('id_publicity' => $this->input->post('id_publicity')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		//delete file
		$publicity = $this->M_publicity->get_by_id($id);
		if(file_exists('upload/'.$publicity->imag_publi) && $publicity->imag_publi)
			unlink('upload/'.$publicity->imag_publi);
		
		$this->M_publicity->delete_by_id($id);
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

        if(!$this->upload->do_upload('imag_publi')) //upload and validate
        {
            $data['inputerror'][] = 'imag_publi';
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

		if($this->input->post('date') == '')
		{
			$data['inputerror'][] = 'date';
			$data['error_string'][] = 'Fecha es requerido';
			$data['status'] = FALSE;
		}

		if($this->input->post('description') == '')
		{
			$data['inputerror'][] = 'description';
			$data['error_string'][] = 'Descripcion es requerido';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

}

/* End of file Publicity.php */
/* Location: ./application/controllers/Publicity.php */
