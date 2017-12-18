<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load menu top
		$this->load->model("menu_top_model");
		$items = $this->menu_top_model->all();

		$this->load->library("multi_menu_top");
		$this->multi_menu_top->set_items($items);
		//Load menu bottom
		$this->load->model("menu_bottom_model");
		$items = $this->menu_bottom_model->all();

		$this->load->library("multi_menu_bottom");
		$this->multi_menu_bottom->set_items($items);
		//Load slider, content, etc
		$this->load->model('Model_public');
		//Cargamos la librería de paginación
		$this->load->library('pagination');
		//Cargamos la helper de fecha
		$this->load->helper('fechaes_helper');
	}

	// List all your items
	public function index( $offset = 0 )
	{
		$pages=10; //Número de registros mostrados por páginas
		$config['base_url'] = base_url().'home/index'; // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
		$config['total_rows'] = $this->Model_public->row_news();//calcula el número de filas  
		$config['per_page'] = $pages; //Número de registros mostrados por páginas
		$config['num_links'] = 20; //Número de links mostrados en la paginación
		$config['first_link'] = 'Primera';//primer link
		$config['last_link'] = 'Última';//último link
		$config["uri_segment"] = 3;//el segmento de la paginación
		$config['next_link'] = ' Siguiente';//siguiente link
		$config['prev_link'] = 'Anterior ';//anterior link
		$this->pagination->initialize($config); //inicializamos la paginación 
		$data["news"] = $this->Model_public->total_news($config['per_page'],$this->uri->segment(3));

		$data['title'] = "El Viejo Topo";//$this->Model_home->Listar();
		$data["slider"] = $this->Model_public->slider();
		$data["category"] = $this->Model_public->get_categorys();
		$data["publicity"] = $this->Model_public->get_publicity();
		$data["video"] = $this->Model_public->get_video();
		$data["social"] = $this->Model_public->get_social();
		$this->load->view('template/header', $data, FALSE);
		$this->load->view('template/slider', $data);
		//$this->load->view('template/sidebar', $data);
		$this->load->view('Home', $data, FALSE);
		$this->load->view('template/aside', $data);
		$this->load->view('template/footer');
	}

	// Add a new item
	public function detail($slug)
	{
		$data['title'] = "Detalle Viejo Topo";//$this->Model_home->Listar();
		//$data["slider"] = $this->Model_public->slider();
		$data["news"] = $this->Model_public->get_news($slug);
		$data["category"] = $this->Model_public->get_categorys();
		$data["publicity"] = $this->Model_public->get_publicity();
		$data["video"] = $this->Model_public->get_video();
		$data["social"] = $this->Model_public->get_social();
		$this->load->view('template/header', $data, FALSE);
		//$this->load->view('template/sidebar', $data);
		$this->load->view('Detail', $data, FALSE);
		$this->load->view('template/aside', $data);
		$this->load->view('template/footer');
	}
//desde aqui buscador

    function search() {

    	$data['title'] = "Resultados de la busqueda";
    	$search = $this->input->post('searchword');
        $pages = 10; //Número de registros mostrados por páginas
        $config['base_url'] = base_url() . 'home/search'; // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
        $config['total_rows'] = $this->Model_public->row_search($search); //calcula el número de filas
        $config['per_page'] = $pages; //Número de registros mostrados por páginas
        $config['num_links'] = 20; //Número de links mostrados en la paginación
        $config['first_link'] = 'Primera'; //primer link
        $config['last_link'] = 'Última'; //último link
        $config['next_link'] = 'Siguiente'; //siguiente link
        $config['prev_link'] = 'Anterior'; //anterior link
        $config['full_tag_open'] = '<div id="paginacion">'; //el div que debemos maquetar si queremos
        $config['full_tag_close'] = '</div>'; //el cierre del div de la paginación
        $this->pagination->initialize($config); //inicializamos la paginación
        //el array con los datos a paginar ya preparados
        $data["searching"] = $this->Model_public->total_posts_search($search, $config['per_page'], $this->uri->segment(3));

        //cargamos la vista y el array data
        //$data["slider"] = $this->Model_public->slider();
		$data["category"] = $this->Model_public->get_categorys();
		$data["publicity"] = $this->Model_public->get_publicity();
		$data["video"] = $this->Model_public->get_video();
		$data["social"] = $this->Model_public->get_social();
		$this->load->view('template/header', $data, FALSE);
		//$this->load->view('template/sidebar', $data);
		$this->load->view('Search', $data, FALSE);
		$this->load->view('template/aside', $data);
		$this->load->view('template/footer');
    }
    //Lista de categoria

    public function category($cat_slug)
    {

		$pages=10; //Número de registros mostrados por páginas
		$config['base_url'] = base_url().'home/category/'.$cat_slug; // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
		$config['total_rows'] = $this->Model_public->row_categories($cat_slug);//calcula el número de filas  
		$config['per_page'] = $pages; //Número de registros mostrados por páginas
		$config['num_links'] = 20; //Número de links mostrados en la paginación
		$config['first_link'] = 'Primera';//primer link
		$config['last_link'] = 'Última';//último link
		$config["uri_segment"] = 3;//el segmento de la paginación
		$config['next_link'] = 'Siguiente';//siguiente link
		$config['prev_link'] = 'Anterior';//anterior link
		$this->pagination->initialize($config); //inicializamos la paginación 
		$data["category_slug"] = $this->Model_public->get_categories($cat_slug, $config['per_page'], $this->uri->segment(3));

        $data['title'] = "Categoría Viejo Topo";
        //$data["slider"] = $this->Model_public->slider();
		$data["category"] = $this->Model_public->get_categorys();
		$data['category_title'] = $this->Model_public->get_category_title($cat_slug);
		//$data['category_slug'] = $this->Model_public->get_categories($cat_slug);
		$data["publicity"] = $this->Model_public->get_publicity();
		$data["video"] = $this->Model_public->get_video();
		$data["social"] = $this->Model_public->get_social();
		$this->load->view('template/header', $data, FALSE);
		//$this->load->view('template/sidebar', $data);
		$this->load->view('Category', $data, FALSE);
		$this->load->view('template/aside', $data);
		$this->load->view('template/footer');
    }

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */
