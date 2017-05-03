<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Blog_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        //$this->load->database();
    }
 
    function get_all_posts()
    {
        //get all entry
        //$query = $this->db->get('entry');
        //return $query->result();
        $postArray = [];
        
        $files = array_diff(scandir('application/data/posts/'), array('..', '.'));
        //print_r($files); die;
            foreach($files as $file) {
                
                $doc = new DOMDocument();
                $doc->load('application/data/posts/'.$file);
                
                $postcont = $doc->getElementsByTagName("article");
               
                $desc = '';
                foreach ($postcont[0]->childNodes as $node)
                    {                  
                       
                        $desc.= $node->ownerDocument->saveHTML($node);
                    
                    }
                    
                //$filenum = explode('-', $file)[1];
                //$filenum = explode('.', $filenum)[0];
                
                $postArray[] = '<article><br>'.$desc.'<br><p><a href="../post?id='.$file.'">Read more</a></p></article>';
        }
        
        return $postArray;
    }
 
    function add_new_entry($body, $name)
    {        
        /*$scanned_directory = array_diff(scandir('application/data/posts/'), array('..', '.'));
        $lastpost = explode('-', array_pop($scanned_directory))[1];
        $lastpost = $lastpost[0] + 1;
        $myfile = fopen("application/data/posts/post-$lastpost.html", "w");*/
        $myfile = fopen("application/data/posts/$name.html", "w");        
        fwrite($myfile, $body);
        fclose($myfile);
    }
}