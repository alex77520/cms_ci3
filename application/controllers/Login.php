<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('User_model');

        if($this->session->userdata('user_id')>0)
        {
            redirect('administrator', 'refresh');
        }
    }

    public function index()
    {
        
		$this->load->view('administrator/Headerlogin');
		$this->load->view('administrator/Login');
		$this->load->view('administrator/Footerlogin');

    }
    public function check_login(){
        $response=array();
        if($this->form_validation->run('login')!==false){
            $result=$this->User_model->checkLogin();
            if($result){
                $response['status']='success';
                $sdata['user_id']=$result->user_id;
                $sdata['first_name']=$result->first_name;
                $sdata['last_name']=$result->last_name;
                $sdata['id_rol']=$result->id_rol;
                $this->session->set_userdata($sdata);
            }
            else{
                $response['status']='error';
                $response['message']='Ups! Usuario o Contraseña no válida';
            }
        }
        else{
            $response['status']='error';
            $response['message']=validation_errors();
        }
        echo json_encode($response);
    }
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
