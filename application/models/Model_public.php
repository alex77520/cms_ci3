<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_public extends CI_Model {

    //obtenemos el total de filas para hacer la paginación
    function row_news()
    {
        $consulta = $this->db->get('news');
        return  $consulta->num_rows();
    }
    //obtenemos todas las noticias a paginar con la función
    //total_news pasando la cantidad por página y el segmento
    //como parámetros de la misma
    function total_news($por_pagina, $segmento) 
    {
        $this->db->order_by('date', 'DESC');
        $this->db->where('status', 1);
        $consulta = $this->db->get('news',$por_pagina,$segmento);
        if($consulta->num_rows()>0) {
            foreach($consulta->result() as $fila)
    {
        $data[] = $fila;
    }
            return $data;
            }
    }

    public function slider()
    {
        $this->db->where('status', 1);
        $query = $this->db->get_where('slider',array('id_slider !=' => 0));
        return $query->result_array();
    }

    function row_search($search) {
        $this->db->like('title', $search);
        $query = $this->db->get('news');
        return $query->num_rows();
    }

    //obtenemos todos los news a paginar con la función
    //total_posts_search pasando lo que buscamos, la cantidad por página y el segmento
    //como parámetros de la misma
    function total_posts_search($search, $por_pagina, $segmento) {
        $this->db->like('title', $search);
        $this->db->or_like('description_short', $search);
        $this->db->or_like('description_full', $search);
        $consulta = $this->db->get('news', $por_pagina, $segmento);
        if ($consulta->num_rows() > 0) {
            foreach ($consulta->result() as $fila) {
            $data[] = $fila;
        }
            return $data;
        }
    }

	public function get_news($slug)
	{
        $query = $this->db->get_where('news', array('url_news' => $slug));
        return $query->row_array();
	}
 function get_category() 
    {
        $roldesconocido=$this->session->userdata('id_rol');
        $this->db->select('c.id_category, c.name_cat');
        $this->db->from('category c');
        $this->db->join('permissions p', 'c.name_cat=p.id_category');
        $this->db->where('p.id_rol', $roldesconocido);
        $this->db->where('status', 1);
        $category = $this->db->get();
        if($category->num_rows()>0) {
            foreach($category->result() as $cat)
    {
        $data[] = $cat;
    }
            return $data;
                }
    } 
//Lista de categoria en aside.
    function get_categorys() 
    {
        $this->db->where('status', 1);
        $category = $this->db->get('category');
        if($category->num_rows()>0) {
            foreach($category->result() as $cat)
    {
        $data[] = $cat;
    }
            return $data;
                }
    } 

    function get_publicity() 
    {
        $this->db->where('status', 1);
        $publicity = $this->db->get('publicity');
        if($publicity->num_rows()>0) {
            foreach($publicity->result() as $publi)
    {
        $data[] = $publi;
    }
            return $data;
                }
    }

    public function get_video()
    {
        $query = $this->db->get('video');
        return $query->row_array();
    }

    public function get_social() 
    {
        $social = $this->db->get('social');
        if($social->num_rows()>0) {
            foreach($social->result() as $social)
    {
        $data[] = $social;
    }
            return $data;
                }
    }

    public function get_category_title($cat_slug)
    {
        $this->db->select('name_cat');
        $this->db->from('category');
        $this->db->where('url_category', $cat_slug);
        return $this->db->get()->row();
    }

    public function row_categories($cat_slug)
    {
        $this->db->select('news.title,news.redaction,news.date,news.imag_news,news.description_short,news.url_news');
        $this->db->from('category');
        $this->db->join('news', 'news.category=category.name_cat');
        $this->db->where('category.url_category', $cat_slug);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function get_categories($cat_slug, $por_pagina, $segmento)
    {
        $this->db->select('news.title,news.redaction,news.date,news.imag_news,news.description_short,news.url_news');
        $this->db->from('category');
        $this->db->join('news', 'news.category=category.name_cat');
        $this->db->where('category.url_category', $cat_slug);
        $query = $this->db->get();
        return $query->result();
    }

}

/* End of file Model_public.php */
/* Location: ./application/models/Model_public.php */
