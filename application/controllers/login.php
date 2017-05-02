<?php

    class Login extends CI_Controller
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
        public function login() 
            { 
            $this->load->library('session');
            $this->load->library('form_validation');             
            $this->form_validation->set_rules('username','Username', 'trim|required');
            $this->form_validation->set_rules('password','Password', 'trim|required'); 
            if($this->form_validation->run()==false)
                { 
                $this->index(); 
                
                }
                else
                    { 
                    
                    if($this->input->post('username')==username && $this->input->post('password')==password)
                    {
                    $user_session=array( 'Username' => $this->input->post('username'), 'Password' => $this->input->post('password'), 'is_logged_in' => 1 );
                    $this->session->set_userdata('userlogin',$user_session);                     
                    redirect('/admin');
                    }
                    else
                        $this->index(); 
                    } 
                    
            } 
                   /* public function admin() 
                            { 
                        $this->load->view('admin'); 
                        
                            } */
        }