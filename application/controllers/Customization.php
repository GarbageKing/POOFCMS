<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Customization extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('customization_model');
        $this->load->helper('url');
    }
 
    function index()
    {        
        $this->load->library(array('form_validation','session'));
        if(!$this->session->userdata('userlogin'))
            redirect(PRE_INDEX_URL.'index.php');
        
        $data['query'] = $this->customization_model->get_all_customs();
        $this->load->view('customization/index',$data);
    }
 
    function customize()
    {
                
        $this->load->helper('form');
        $this->load->library(array('form_validation','session'));
        if(!$this->session->userdata('userlogin'))
            redirect(PRE_INDEX_URL.'index.php');
 
        
        $this->form_validation->set_rules('site_title', 'Site Title', 'required|max_length[200]');
        $this->form_validation->set_rules('site_name', 'Site Name', 'required|max_length[200]');
        $this->form_validation->set_rules('copyright_info', 'Copyright Info', 'max_length[200]');
 
        if ($this->form_validation->run() == FALSE)
        {
            //if not valid
            $this->load->view('customization/index');
        }
        else
        {           
            $default_page = $this->input->post('default_page');
            $site_name = $this->input->post('site_name');
            $site_title = $this->input->post('site_title');
            $copyright_info = $this->input->post('copyright_info'); 
            $blog_title = $this->input->post('blog_title');
            $jumbotron_image = $this->input->post('jumbotron_image');
            $favicon = $this->input->post('favicon');
            
            
            $this->customization_model->customize($default_page, $site_name, $site_title, $copyright_info, $blog_title, $jumbotron_image, $favicon);          
                   
            redirect(PRE_INDEX_URL.'index.php/customization/index');
        }
    }

}