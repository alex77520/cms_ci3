<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('user_id') <= 0 )
        {
            redirect('login');
        }
		$this->load->model('M_video');
	}

	// List all your items
	public function index( $offset = 0 )
	{
		$data['title'] = "Videos";
		$this->load->view('administrator/Header');
		$this->load->view('administrator/Sidebar');
		$this->load->view('administrator/Videos', $data, FALSE);
		$this->load->view('administrator/Footer');
		$this->load->view('administrator/script_video');	
	}

	public function ajax_list()
	{
		$list_video = $this->M_video->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list_video as $videos) {
			$no++;
			$row = array();
			$row[] = $videos->name_video;
			$row[] = $videos->url_video;
			$row[] = $videos->date;
			$row[] = $videos->status;
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_videos('."'".$videos->id_video."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_videos('."'".$videos->id_video."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->M_video->count_all(),
						"recordsFiltered" => $this->M_video->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->M_video->get_by_id($id);
		$data->date = ($data->date == '0000-00-00') ? '' : $data->date; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		$data = array(
				'name_video' => $this->input->post('name_video'),
				'url_video' => $this->input->post('url_video'),
				'date' => $this->input->post('date'),
				'status' => $this->input->post('status'),
			);
		$insert = $this->M_video->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
				'name_video' => $this->input->post('name_video'),
				'url_video' => $this->input->post('url_video'),
				'date' => $this->input->post('date'),
				'status' => $this->input->post('status'),
			);
		$this->M_video->update(array('id_video' => $this->input->post('id_video')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->M_video->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('name_video') == '')
		{
			$data['inputerror'][] = 'name_video';
			$data['error_string'][] = 'Nombre es requerido';
			$data['status'] = FALSE;
		}

		if($this->input->post('url_video') == '')
		{
			$data['inputerror'][] = 'url_video';
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

/* End of file Video.php */
/* Location: ./application/controllers/Video.php */
