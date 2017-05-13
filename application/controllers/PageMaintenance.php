<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
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
        $this->load->library('session');
        if(!$this->session->userdata('userlogin'))
            redirect(PRE_INDEX_URL.'index.php/');
        
        $data['query'] = $this->pagemaintenance_model->get_all_pages();
        $this->load->view('pagemaintenance/index',$data);
    }
 
    function delete()
    {
        $this->load->library('session');
        if(!$this->session->userdata('userlogin'))
            redirect(PRE_INDEX_URL.'index.php/');
        
        $whichpage = $this->input->get('id');
        
        $this->pagemaintenance_model->delete($whichpage);        
        
    }
    
    function toUpdate()
    {
        $this->load->helper('form');
        $this->load->library(array('form_validation','session'));
        
        $whichpage = $this->input->get('id');
        
        $data['query'] = $this->pagemaintenance_model->toUpdate($whichpage);
        
        $this->load->view('pagemaintenance/update',$data);
    }
    
    function update()
    {
        $this->load->helper('form');
        $this->load->library(array('form_validation','session'));
        if(!$this->session->userdata('userlogin'))
            redirect(PRE_INDEX_URL.'index.php/');
         
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
            if(!$this->input->post('entry_name'))
            { redirect(PRE_INDEX_URL.'index.php'); end;}
            
            $name = $this->input->post('entry_name');
            $name = mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $name);
            $name = mb_ereg_replace("([\.]{2,})", '', $name);
            $body = $this->input->post('entry_body');
            $this->pagemaintenance_model->update($body, $name);
            $this->session->set_flashdata('message', 'Updated!');
            redirect(PRE_INDEX_URL.'index.php/PageMaintenance/');
        }
    }
    
}