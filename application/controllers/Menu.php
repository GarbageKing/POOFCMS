<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Menu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('menu_model');
        $this->load->helper('url');
    }
 
    function index()
    {
        //this function will retrive all entry in the database      
        $this->load->library('session');
        $this->load->library(array('form_validation','session'));
        
        $data['query'] = $this->menu_model->get_all_items();
        $this->load->view('menu/index',$data);
    }
 
    function update()
    {
                
        $this->load->helper('form');
        $this->load->library(array('form_validation','session'));
        if(!$this->session->userdata('userlogin'))
            redirect(PRE_INDEX_URL.'index.php');
 
        //set validation rules
        /*$this->form_validation->set_rules('site_title', 'Site Title', 'required|max_length[200]');
        $this->form_validation->set_rules('site_name', 'Site Name', 'required|max_length[200]');
        $this->form_validation->set_rules('copyright_info', 'Copyright Info', 'max_length[200]');
 
        if ($this->form_validation->run() == FALSE)
        {
            //if not valid
            $this->load->view('customization/index');
        }*/
        //else
        //{     
        $postarr = [];
            foreach($this->input->post() as $key=>$val){
               
                if ($val !== '') {
                $postarr[$key] = $val;
                }
            }
            //$site_name = $this->input->post('site_name');
            //$site_title = $this->input->post('site_title');
            //$copyright_info = $this->input->post('copyright_info');           
            
            $this->menu_model->update($postarr);          
                   
            redirect(PRE_INDEX_URL.'index.php/menu/index');
        //}
    }

}