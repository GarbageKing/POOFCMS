<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Post extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('post_model');
        $this->load->helper('url');
    }
    
    function index()
    {       
        $whichpost = $this->input->get('id');
        
        $data['query'] = $this->post_model->get_post($whichpost);
        $this->load->view('blog/post',$data);
    }    
}