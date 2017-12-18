<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('user_id') <= 0 )
        {
            redirect('login');
        }

	}

	// List all your items
	public function index( $offset = 0 )
	{
		$this->load->view('administrator/Header');
		$this->load->view('administrator/Sidebar');
		$this->load->view('administrator/dashboard');
		$this->load->view('administrator/Footer');
		$this->load->view('administrator/script_dashboard');

	}

	// Add a new item
	public function add()
	{

	}

	//Update one item
	public function update( $id = NULL )
	{

	}

	//Delete one item
	public function delete( $id = NULL )
	{

	}

    public function logout(){
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('name');
        $sdata['message']="Ha salido con éxito..";
        $this->session->set_userdata($sdata);
        redirect('login','refresh');
    }	
}

/* End of file Administrator.php */
/* Location: ./application/controllers/Administrator.php */
