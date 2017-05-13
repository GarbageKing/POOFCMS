<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Logout extends CI_Controller
    {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');     
    }
    
public function index() 
        {  
    $this->load->view('login'); 
    
        } 
        public function logout() 
                { 
            $this->load->library('session'); 
            $this->session->unset_userdata('userlogin'); 
            $this->index();             
                } 
                
    }