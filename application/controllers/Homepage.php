<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
        $this->load->helper('form');
        $this->load->library(array('form_validation','session'));
        if(!$this->session->userdata('userlogin'))
            redirect(PRE_INDEX_URL.'index.php');
        
        $this->load->library('session');
        $data['query'] = $this->homepage_model->get_homepage();
        $this->load->view('homepage/index',$data);
    } 
    
    function toUpdate()
    {
        $this->load->helper('form');
        $this->load->library(array('form_validation','session'));
        
        $data['query'] = $this->homepage_model->toUpdate();
        //print_r($data['query']);die;
        $this->load->view('homepage/update',$data);
    }
    
    function update()
    {                              
            //$this->load->view('homepage/update');
 
            $homepage = $this->input->post('homepage');                 
            //echo $styles; die;
            $this->homepage_model->update($homepage);          
                   
            redirect(PRE_INDEX_URL.'index.php/homepage/toUpdate');        
    
    }
    
}