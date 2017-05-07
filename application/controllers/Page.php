<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Page extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('page_model');
        $this->load->helper('url');
    }
    
    function index()
    {       
        $whichpage = $this->input->get('p');        
        $data['query'] = $this->page_model->get_page($whichpage);
        $this->load->view('pages/page',$data);
    }   
    
    function add_new_entry()
    {                
        $this->load->helper('form');
        $this->load->library(array('form_validation','session'));
        if(!$this->session->userdata('userlogin'))
            redirect(PRE_INDEX_URL.'index.php');
 
        //set validation rules
        $this->form_validation->set_rules('entry_name', 'Title', 'required|max_length[200]');
        $this->form_validation->set_rules('entry_body', 'Body', 'required');
 
        if ($this->form_validation->run() == FALSE)
        {
            //if not valid
            $this->load->view('pages/new_page');
        }
        else
        {
            //if valid
            $name = $this->input->post('entry_name');
            $name = mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $name);
            $name = mb_ereg_replace("([\.]{2,})", '', $name);
            
            $body = '<section>'.'<h1>'.$name.'</h1>'.$this->input->post('entry_body').'</section>';
            $this->page_model->add_new_entry($body, $name);
            $this->session->set_flashdata('message', '1 new page added!');
            redirect(PRE_INDEX_URL.'index.php/page/add_new_entry');
        }
    }
}