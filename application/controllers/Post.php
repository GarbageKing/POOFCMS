<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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