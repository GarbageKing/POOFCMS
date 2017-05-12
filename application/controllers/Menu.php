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
        $this->load->library(array('form_validation','session'));
        if(!$this->session->userdata('userlogin'))
            redirect(PRE_INDEX_URL.'index.php');
        
        $data['query'] = $this->menu_model->get_all_items();
        $this->load->view('menu/index',$data);
    }
 
    function update()
    {
                
        $this->load->helper('form');
        $this->load->library(array('form_validation','session'));
        if(!$this->session->userdata('userlogin'))
            redirect(PRE_INDEX_URL.'index.php');
 
        $postarr = [];
            foreach($this->input->post() as $key=>$val){
               
                if ($val !== '') {
                $postarr[$key] = $val;
                }
            }
                      
            
            $this->menu_model->update($postarr);          
                   
            redirect(PRE_INDEX_URL.'index.php/menu/index');
        
    }

}