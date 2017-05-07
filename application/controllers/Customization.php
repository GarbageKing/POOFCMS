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
        //this function will retrive all entry in the database      
        $this->load->library('session');
        $this->load->library(array('form_validation','session'));
        
        $data['query'] = $this->customization_model->get_all_customs();
        $this->load->view('customization/index',$data);
    }
 
    function customize()
    {
                
        $this->load->helper('form');
        $this->load->library(array('form_validation','session'));
        if(!$this->session->userdata('userlogin'))
            redirect(PRE_INDEX_URL.'index.php');
 
        //set validation rules
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
            $site_name = $this->input->post('site_name');
            $site_title = $this->input->post('site_title');
            $copyright_info = $this->input->post('copyright_info'); 
            $blog_title = $this->input->post('blog_title');
            $jumbotron_image = $this->input->post('jumbotron_image');
            
            $this->customization_model->customize($site_name, $site_title, $copyright_info, $blog_title, $jumbotron_image);          
                   
            redirect(PRE_INDEX_URL.'index.php/customization/index');
        }
    }

    /*public function do_upload() { 
         $config['upload_path']   = PRE_INDEX_URL.'assets/files/'; 
         $config['allowed_types'] = 'gif|jpg|png'; 
         $config['max_size']      = 100; 
         $config['max_width']     = 1024; 
         $config['max_height']    = 768;  
         $this->load->library('upload', $config);
			
         $this->upload->do_upload();
	
      }*/
}