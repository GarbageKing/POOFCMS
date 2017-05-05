<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Blog extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('blog_model');
        $this->load->helper('url');
    }
 
    function index()
    {
        //this function will retrive all entry in the database       
        $data['query'] = $this->blog_model->get_all_posts();
        $this->load->view('blog/index',$data);
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
            $this->load->view('blog/new_entry');
        }
        else
        {
            //if valid
            $name = $this->input->post('entry_name');
            $body = '<article><time>'.date('Y-m-d').'</time>'.$this->input->post('entry_body').'</article>';
            $this->blog_model->add_new_entry($body, $name);
            $this->session->set_flashdata('message', '1 new entry added!');
            //$urlchunks = explode('/', base_url(uri_string()));            
            redirect(PRE_INDEX_URL.'index.php/blog/add_new_entry');
        }
    }
}