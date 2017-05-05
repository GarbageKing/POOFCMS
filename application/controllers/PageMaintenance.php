<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class PageMaintenance extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('pagemaintenance_model');
        $this->load->helper('url');
    }
 
    function index()
    {
        //this function will retrive all entry in the database
        $this->load->library('session');
        $data['query'] = $this->pagemaintenance_model->get_all_pages();
        $this->load->view('pagemaintenance/index',$data);
    }
 
    function delete()
    {
        $whichpage = $this->input->get('id');
        
        $this->pagemaintenance_model->delete($whichpage);        
        
    }
    
    function toUpdate()
    {
        $this->load->helper('form');
        $this->load->library(array('form_validation','session'));
        
        $whichpage = $this->input->get('id');
        
        $data['query'] = $this->pagemaintenance_model->toUpdate($whichpage);
        //print_r($data['query']);die;
        $this->load->view('pagemaintenance/update',$data);
    }
    
    function update()
    {
        $this->load->helper('form');
        $this->load->library(array('form_validation','session'));
        if(!$this->session->userdata('userlogin'))
            redirect(PRE_INDEX_URL.'index.php/');
 
        //set validation rules
        $this->form_validation->set_rules('entry_name', 'Title', 'required|max_length[200]');
        $this->form_validation->set_rules('entry_body', 'Body', 'required');
 
        if ($this->form_validation->run() == FALSE)
        {
            //if not valid
            $this->load->view('pagemaintenance/update');
        }
        else
        {
            //if valid
            $name = $this->input->post('entry_name');
            $body = $this->input->post('entry_body');
            $this->pagemaintenance_model->update($body, $name);
            $this->session->set_flashdata('message', 'Updated!');
            redirect(PRE_INDEX_URL.'index.php/PageMaintenance/');
        }
    }
    
}