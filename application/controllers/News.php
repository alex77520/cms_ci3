<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	private $permission;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_news');
		$this->load->model('Model_public');
		$this->load->model('User_model');
		//Load Dependencies
		 $this->permission = $this->backend_lib->control();
        //permision sybcodex
        $array = $this->M_news->permission();
	    $inserted=$array[0]['readed'];
		if($this->session->userdata('user_id') <= 0 )
        {
            redirect('login');
        }
	    else if($inserted==0){
	    	redirect(base_url()."administrator?resultado=res");
	    }
		
	}

	// List all your items
	public function index( $offset = 0 )
	{
		$data['title'] = "Noticias";
		$data['permisos'] = $this->permission;
		$array = $this->M_news->permission();
	    $inserted=$array[0]['inserted'];
	    $data['inserted'] = $inserted;   
		$data["category"] = $this->Model_public->get_category();
		$data["redaction"] = $this->User_model->get_user();
		$this->load->view('administrator/Header');
		$this->load->view('administrator/Sidebar');
		$this->load->view('administrator/News', $data, FALSE);
		$this->load->view('administrator/Footer');	
		$this->load->view('administrator/script_news');			
		
	}
public function permission(){
	$array = $this->M_news->permission();
	$inserted=$array[0]['inserted'];
	
	
	echo json_encode($array);
	
}
	public function ajax_list()
	{
	$array = $this->M_news->permission();
	$inserted=$array[0]['inserted'];
	$readed=$array[0]['readed'];
	$updated=$array[0]['updated'];
	$deleted=$array[0]['deleted'];

		$list = $this->M_news->get_datatables();
		$description = 
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $news) {
			$no++;
			$row = array();
			$row[] = $news->redaction;
			$row[] = $news->title;
			$row[] = $news->date;
			if($news->imag_news)
			$row[] = '<a href="'.base_url('upload/'.$news->imag_news).'" target="_blank"><img src="'.base_url('upload/'.$news->imag_news).'" class="img-responsive" /></a>';
			else
			$row[] = '(No hay Imagen)';
			$row[] = $news->description_short;
			$row[] = $news->url_news;
			$row[] = $news->category;
			if($news->status==0)
			$row[] = '<span class="fa fa-times"></span>';
			else
			$row[] = '<span class="fa fa-check"></span>';

			//add html for action
		if($updated==0 && $deleted==0)
			$row[] = '
				<div class="btn-group">
                  <button type="button" class="btn btn-warning btn-sm">Opcion</button>
                  <button type="button" class="btn btn-warning dropdown-toggle btn-sm" data-toggle="dropdown">
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li class="disabled"><a  title="Edit">Editar</a></li>
                    <li class="divider"></li>
                    <li class="disabled"><a title="Hapus" >Eliminar</a></li>
                  </ul>
                </div>
				';
		else if($updated==1 && $deleted==1)
			$row[] = '
				<div class="btn-group">
                  <button type="button" class="btn btn-warning btn-sm">Opcion</button>
                  <button type="button" class="btn btn-warning dropdown-toggle btn-sm" data-toggle="dropdown">
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="javascript:void(0)" title="Edit" onclick="edit_news('."'".$news->id_news."'".')">Editar</a></li>
                    <li class="divider"></li>
                    <li><a href="javascript:void(0)" title="Hapus" onclick="delete_news('."'".$news->id_news."'".')">Eliminar</a></li>
                  </ul>
                </div>
				';
		  else if($updated==0 && $deleted==1)
			$row[] = '
				<div class="btn-group">
                  <button type="button" class="btn btn-warning btn-sm">Opcion</button>
                  <button type="button" class="btn btn-warning dropdown-toggle btn-sm" data-toggle="dropdown">
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li class="disabled"><a title="Edit">Editar</a></li>
                    <li class="divider"></li>
                    <li><a href="javascript:void(0)" title="Hapus" onclick="delete_news('."'".$news->id_news."'".')">Eliminar</a></li>
                  </ul>
                </div>
				';
				else
			$row[] = '
				<div class="btn-group">
                  <button type="button" class="btn btn-warning btn-sm">Opcion</button>
                  <button type="button" class="btn btn-warning dropdown-toggle btn-sm" data-toggle="dropdown">
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="javascript:void(0)" title="Edit" onclick="edit_news('."'".$news->id_news."'".')">Editar</a></li>
                    <li class="divider"></li>
                    <li class="disabled"><a title="Eliminar">Eliminar</a></li>
                  </ul>
                </div>
				';
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->M_news->count_all(),
						"recordsFiltered" => $this->M_news->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->M_news->get_by_id($id);
		$data->date = ($data->date == '0000-00-00') ? '' : $data->date; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		
		$url = $this->input->post('url_news');

		$data = array(
				'redaction' => $this->input->post('redaction'),
				'title' => $this->input->post('title'),
				'date' => $this->input->post('date'),
				'description_short' => $this->input->post('description_short'),
				'description_full' => $this->input->post('description_full'),
				'url_news' => strtolower(convert_accented_characters(url_title($url))),
				'category' => $this->input->post('category'),
				'status' => $this->input->post('status'),
			);
				if(!empty($_FILES['imag_news']['name']))
				{
					$upload = $this->_do_upload();
					$data['imag_news'] = $upload;
				}

		$insert = $this->M_news->save($data);

		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();

		$url = $this->input->post('url_news');

		$data = array(
				'redaction' => $this->input->post('redaction'),
				'title' => $this->input->post('title'),
				'date' => $this->input->post('date'),
				'description_short' => $this->input->post('description_short'),
				'description_full' => $this->input->post('description_full'),
				'url_news' => strtolower(convert_accented_characters(url_title($url))),
				'category' => $this->input->post('category'),
				'status' => $this->input->post('status'),
			);

		if($this->input->post('remove_news')) // if remove imag_slide checked
		{
			if(file_exists('upload/'.$this->input->post('remove_news')) && $this->input->post('remove_news'))
				unlink('upload/'.$this->input->post('remove_news'));
			$data['imag_news'] = '';
		}

		if(!empty($_FILES['imag_news']['name']))
		{
			$upload = $this->_do_upload();
			
			//delete file
			$news = $this->M_news->get_by_id($this->input->post('id_news'));
			if(file_exists('upload/'.$news->imag_news) && $news->imag_news)
				unlink('upload/'.$news->imag_news);

			$data['imag_news'] = $upload;
		}

		$this->M_news->update(array('id_news' => $this->input->post('id_news')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		//delete file
		$news = $this->M_news->get_by_id($id);
		if(file_exists('upload/'.$news->imag_news) && $news->imag_news)
			unlink('upload/'.$news->imag_news);
		
		$this->M_news->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	private function _do_upload()
	{
		$config['upload_path']          = FCPATH .'/upload/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png|JPG';
        $config['max_size']             = 500; //set max size allowed in Kilobyte
        $config['max_width']            = 2000; // set max width image allowed
        $config['max_height']           = 2200; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('imag_news')) //upload and validate
        {
            $data['inputerror'][] = 'imag_news';
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

		if($this->input->post('date') == '')
		{
			$data['inputerror'][] = 'date';
			$data['error_string'][] = 'Fecha es requerido';
			$data['status'] = FALSE;
		}

		if($this->input->post('description_full') == '')
		{
			$data['inputerror'][] = 'description_full';
			$data['error_string'][] = 'Descripción es requerido';
			$data['status'] = FALSE;
		}


		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
}

/* End of file News.php */
/* Location: ./application/controllers/News.php */
