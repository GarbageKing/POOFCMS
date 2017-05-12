<?php

class Files extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
        }

        public function index()
        {                
                $this->load->library('session');
                if(!$this->session->userdata('userlogin'))
                    redirect(PRE_INDEX_URL.'index.php/');
                
                $files_uploaded = array_diff(scandir('assets/files/'), array('..', '.'));
                $data['files_uploaded'] = $files_uploaded;
                $this->load->view('files/index', $data, array('error' => ' ' ));
        }

        public function upload()
        {            
                $this->load->library('session');
                $this->load->library(array('form_validation','session'));
                if(!$this->session->userdata('userlogin'))
                    redirect(PRE_INDEX_URL.'index.php/');
            
                $config['upload_path']          = "assets/files/";
                $config['allowed_types']        = 'gif|jpg|png|ico';
                $config['max_size']             = 200;
                //$config['max_width']            = 1024;
                //$config['max_height']           = 768;
                
                $this->load->library('upload', $config);                   

                if ( ! $this->upload->do_upload('userfile'))
                {                        
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('files/index', $error);
                }
                else
                {                        
                        $this->session->set_flashdata('message', 'flie added!');
                        redirect(PRE_INDEX_URL.'index.php/files/index');
                }
        }
}