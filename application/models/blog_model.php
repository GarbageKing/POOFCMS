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
                $name = explode('-', $file, 2)[1];
                $num = explode('-', $file)[0];
                $name = explode('.', $name)[0];
                
                //$urlchunks = explode('/', base_url(uri_string()));
                //$url = '';
                //for($i=0; $i<4; $i++)
                //{$url .= $urlchunks[$i] . '/';}
                
                $postArray[$num] = '<article><h2>'.$name.'</h2><br>'.$desc.'<br><p><a href="'.PRE_INDEX_URL.'/index.php/post?id='.$file.'">Read more</a></p></article>';                
        }        
        //print_r($postArray); die;
        
        return $postArray;
    }
 
    function add_new_entry($body, $name)
    {        
        $scanned_directory = array_diff(scandir('application/data/posts/'), array('..', '.'));
        $lastpost = count($scanned_directory);//explode('-', array_pop($scanned_directory))[1];
        $lastpost = $lastpost + 1;
        /*$myfile = fopen("application/data/posts/post-$lastpost.html", "w");*/
        $myfile = fopen("application/data/posts/$lastpost-$name.html", "w");        
        fwrite($myfile, $body);
        fclose($myfile);
    }
}