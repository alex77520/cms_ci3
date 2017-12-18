<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		if($this->session->userdata('user_id') <= 0 )
        {
            redirect('login');
        }
		$this->load->model('M_slider');
	}

	// List all your items
	public function index( $offset = 0 )
	{
		$data['title'] = "Slider";
		$this->load->view('administrator/Header');
		$this->load->view('administrator/Sidebar');
		$this->load->view('administrator/Slider', $data, FALSE);
		$this->load->view('administrator/Footer');
		$this->load->view('administrator/script_slider');			
		
	}

	public function ajax_list()
	{
		$list = $this->M_slider->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $slider) {
			$no++;
			$row = array();
			if($slider->imag_slide)
				$row[] = '<a href="'.base_url('upload/'.$slider->imag_slide).'" target="_blank"><img src="'.base_url('upload/'.$slider->imag_slide).'" class="img-responsive" /></a>';
			else
			$row[] = '(No Slider)';			
			$row[] = $slider->title;
			$row[] = $slider->description;
			$row[] = $slider->url_slide;
			$row[] = $slider->date;
			if($slider->status==0)
			$row[] = '<span class="fa fa-times"></span>';
			else
			$row[] = '<span class="fa fa-check"></span>';

			//add html for action
			$row[] = '
				<div class="btn-group">
                  <button type="button" class="btn btn-warning btn-sm">Opcion</button>
                  <button type="button" class="btn btn-warning dropdown-toggle btn-sm" data-toggle="dropdown">
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="javascript:void(0)" title="Edit" onclick="edit_slider('."'".$slider->id_slider."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a></li>
                    <li class="divider"></li>
                    <li><a href="javascript:void(0)" title="Hapus" onclick="delete_slider('."'".$slider->id_slider."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a></li>
                  </ul>
                </div>
				';

			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->M_slider->count_all(),
						"recordsFiltered" => $this->M_slider->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->M_slider->get_by_id($id);
		$data->date = ($data->date == '0000-00-00') ? '' : $data->date; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		
		$data = array(
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'url_slide' => $this->input->post('url_slide'),
				'date' => $this->input->post('date'),
				'status' => $this->input->post('status'),
			);

		if(!empty($_FILES['imag_slide']['name']))
		{
			$upload = $this->_do_upload();
			$data['imag_slide'] = $upload;
		}

		$insert = $this->M_slider->save($data);

		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'url_slide' => $this->input->post('url_slide'),
				'date' => $this->input->post('date'),
				'status' => $this->input->post('status'),
			);

		if($this->input->post('remove_slider')) // if remove imag_slide checked
		{
			if(file_exists('upload/'.$this->input->post('remove_slider')) && $this->input->post('remove_slider'))
				unlink('upload/'.$this->input->post('remove_slider'));
			$data['imag_slide'] = '';
		}

		if(!empty($_FILES['imag_slide']['name']))
		{
			$upload = $this->_do_upload();
			
			//delete file
			$slider = $this->M_slider->get_by_id($this->input->post('id_slider'));
			if(file_exists('upload/'.$slider->imag_slide) && $slider->imag_slide)
				unlink('upload/'.$slider->imag_slide);

			$data['imag_slide'] = $upload;
		}

		$this->M_slider->update(array('id_slider' => $this->input->post('id_slider')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		//delete file
		$slider = $this->M_slider->get_by_id($id);
		if(file_exists('upload/'.$slider->imag_slide) && $slider->imag_slide)
			unlink('upload/'.$slider->imag_slide);
		
		$this->M_slider->delete_by_id($id);
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

        if(!$this->upload->do_upload('imag_slide')) //upload and validate
        {
            $data['inputerror'][] = 'imag_slide';
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

		if($this->input->post('title') == '')
		{
			$data['inputerror'][] = 'title';
			$data['error_string'][] = 'Título es requerido';
			$data['status'] = FALSE;
		}

		if($this->input->post('description') == '')
		{
			$data['inputerror'][] = 'description';
			$data['error_string'][] = 'Descripción es requerido';
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

/* End of file Slider.php */
/* Location: ./application/controllers/Slider.php */
