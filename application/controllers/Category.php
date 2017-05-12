<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Category extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('category_model');
        $this->load->helper('url');
    }
    
    function index()
    {                
        $this->load->library(array('form_validation','session'));
        if(!$this->session->userdata('userlogin'))
            redirect(PRE_INDEX_URL.'index.php');
        
        $data['query'] = $this->category_model->get_all_cats();
        $this->load->view('category/index',$data);
    }   
    
    function add_new_category()
    {                
        $this->load->helper('form');
        $this->load->library(array('form_validation','session'));
        if(!$this->session->userdata('userlogin'))
            redirect(PRE_INDEX_URL.'index.php');
         
        $this->form_validation->set_rules('category_name', 'Name', 'required|max_length[200]');
         
        if ($this->form_validation->run() == FALSE)
        {
            //if not valid
            $this->load->view('category/index');
        }
        else
        {
            //if valid
            if(!$this->input->post('category_name'))
            { redirect(PRE_INDEX_URL.'index.php'); end;}
            
            $name = $this->input->post('category_name');
            $name = mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $name);
            $name = mb_ereg_replace("([\.]{2,})", '', $name);            
            
            $this->category_model->add_new_category($name);
            $this->session->set_flashdata('message', 'New category added!');
            redirect(PRE_INDEX_URL.'index.php/category/');
        }
    }
    
    function delete()
    {
        $this->load->library(array('form_validation','session'));
        
        $whichitem = $this->input->get('id');
        
        $this->category_model->delete($whichitem); 
        
        $this->session->set_flashdata('message', 'Category deleted');
        redirect(PRE_INDEX_URL.'index.php/category/');
        
    }
    
}