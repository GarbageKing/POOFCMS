<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
class Homepage extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('homepage_model');
        $this->load->helper('url');
    }
 
    function index()
    {        
        $data['query'] = $this->homepage_model->get_homepage();
        $this->load->view('homepage/index',$data);
    } 
    
    function toUpdate()
    {
        $this->load->helper('form');
        $this->load->library(array('form_validation','session'));
        
        if(!$this->session->userdata('userlogin'))
            redirect(PRE_INDEX_URL.'index.php');
        
        $data['query'] = $this->homepage_model->toUpdate();
        
        $this->load->view('homepage/update',$data);
    }
    
    function update()
    {                              
            
            if(!$this->input->post('homepage'))
            { redirect(PRE_INDEX_URL.'index.php'); end;}
 
            $homepage = $this->input->post('homepage');                 
            
            $this->homepage_model->update($homepage);          
                   
            redirect(PRE_INDEX_URL.'index.php/homepage/toUpdate');        
    
    }
    
}