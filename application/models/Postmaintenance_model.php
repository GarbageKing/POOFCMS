<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Postmaintenance_model extends CI_Model
{
    
function __construct()
{
    parent::__construct();        
}

function get_all_posts()
    {        
        $postArray = [];
        
        $files = array_diff(scandir('application/data/posts/'), array('..', '.'));
        
            foreach($files as $file) {
                
                $num = explode('-', $file)[0];    
                $doc = new DOMDocument();
                libxml_use_internal_errors(true);
                $doc->loadHTMLFile('application/data/posts/'.$file);
                $namecont = $doc->getElementsByTagName('h1');
                
                $name = $namecont[0]->nodeValue;
                
                $postArray[$num] = '<div><h2>'.$name.'</h2>'.'<a href="'.PRE_INDEX_URL.'index.php/PostMaintenance/delete?id='.$file.'">Delete</a>'
                        .' <a href="'.PRE_INDEX_URL.'index.php/PostMaintenance/toUpdate?id='.$file.'">Update</a>'. '</div>';                
        }        
        
        krsort($postArray);
        
        return $postArray;
    }
    
    function delete($whichpost)
    {
        
        if(unlink('application/data/posts/'.$whichpost))
        {
           $this->session->set_flashdata('message', 'Post deleted!');
           redirect(PRE_INDEX_URL.'index.php/PostMaintenance/index');
        }
        else {
           $this->session->set_flashdata('message', 'Unnable to delete!');
           redirect(PRE_INDEX_URL.'index.php/PostMaintenance/index');
        }
        
    }
    
    function toUpdate($whichpost)
    {
        $doc = new DOMDocument();
        libxml_use_internal_errors(true);
                $doc->loadHTMLFile('application/data/posts/'.$whichpost);
                
                $postcont = $doc->getElementsByTagName("article");
               
                $desc = '';
                foreach ($postcont[0]->childNodes as $node)
                    {                  
                       
                        $desc.= $node->ownerDocument->saveHTML($node);
                    
                    }
                    
                $category = $doc->getElementsByTagName("title");
                $catName = $category[0]->nodeValue;                
                
        $name = explode('.', $whichpost)[0];
        
        $upPost[] = $name;
        $upPost[] = $desc;
        $upPost[] = $catName;
        
        return $upPost;
    }
    
    function update($body, $name, $category)
    {        
        $myfile = fopen("application/data/posts/$name.html", "w");        
        $body = '<article>'.$body.'</article>';
        
        $body = '<html>'.
                '<head>'.
                '<title>'.$category.'</title>'.
                '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />'.
                '</head>'. 
                '<body>'.                
                $body.
                '</body>'.
                '</html>';
        
        fwrite($myfile, $body);
        fclose($myfile);
    }
}