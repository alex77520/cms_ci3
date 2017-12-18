<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend_lib {
	private $CI;
	public function __construct()
	{
		$this->CI = & get_instance();
	}
	public function control()
	{
		if($this->CI->session->userdata('user_id') <= 0 )
        {
            redirect('login');
        }


        $url_category = $this->CI->uri->segment(1);
    
        $infocat = $this->CI->Backend_model->getID($url_category);
        $permisos = $this->CI->Backend_model->getPermisos($infocat['id_category'],$this->CI->session->userdata('id_rol'));
        if ($permisos['readed'] == 1) {
        	redirect('administrator','refresh');
        } else {
        	return $permisos;
        }

	}

}

/* End of file Backend_lib.php */
/* Location: ./application/libraries/Backend_lib.php */