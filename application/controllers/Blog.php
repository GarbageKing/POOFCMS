<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

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
        $sort = false;
        $uri = $_SERVER['REQUEST_URI'];
        if(strpos($uri,'sort=reverse') !== false)
        {
            $sort = true;
        }
        $urlCategory = '';
        if(strpos($uri, 'category=') !== false)
        {
            $urlCategory = explode('category=', $uri)[1];
            $urlCategory = explode('&', $urlCategory)[0];
        }
        $pageUrl = '';
        if(strpos($uri, 'page=') !== false)
        {
            $pageUrl = explode('page=', $uri)[1];
            $pageUrl = explode('&', $pageUrl)[0];
        }
        $data['query'] = $this->blog_model->get_all_posts($sort, $urlCategory, $pageUrl);
        $this->load->view('blog/index',$data);
    }
 
    function add_new_entry()
    {                
        $this->load->helper('form');
        $this->load->library(array('form_validation','session'));
        if(!$this->session->userdata('userlogin'))
            redirect(PRE_INDEX_URL.'index.php');
 
        
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
            if(!$this->input->post('entry_name'))
            { redirect(PRE_INDEX_URL.'index.php'); end;}
            
            $name = $this->input->post('entry_name');
            $name = mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $name);
            $name = mb_ereg_replace("([\.]{2,})", '', $name);
            $body = '<article><h1>'.$name.'</h1><time>'.date('Y-m-d').'</time>'.$this->input->post('entry_body').'</article>';
            $category = $this->input->post('category_name');
            $this->blog_model->add_new_entry($body, $name, $category);
            $this->session->set_flashdata('message', '1 new entry added!');
                       
            redirect(PRE_INDEX_URL.'index.php/blog/add_new_entry');
        }
    }
}