<?php


class Admin extends CI_Controller
    {
        
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');     
    } 

 public function index()
        { 
            $this->load->library('session');
            if($this->session->userdata('userlogin')){
            $this->load->view('admin');   
            }
            else{
                redirect(PRE_INDEX_URL.'index.php/login');
            }
        }
    }