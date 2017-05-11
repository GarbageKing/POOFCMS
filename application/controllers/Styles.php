<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Styles extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('styles_model');
        $this->load->helper('url');
    }
 
    function index()
    {
        $this->load->helper('form');
        $this->load->library(array('form_validation','session'));
        if(!$this->session->userdata('userlogin'))
            redirect(PRE_INDEX_URL.'index.php');
        
        $this->load->library('session');
        $data['query'] = $this->styles_model->get_styles();
        $this->load->view('styles/index',$data);
    } 
    
    function update()
    {       
 
            $styles = $this->input->post('styles');                 
            //echo $styles; die;
            $this->styles_model->update($styles);          
                   
            redirect(PRE_INDEX_URL.'index.php/styles/index');        
    
    }
    
}