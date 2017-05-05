<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pagemaintenance_model extends CI_Model
{
    
function __construct()
{
    parent::__construct();        
}

function get_all_pages()
    {        
        $pageArray = [];
        
        $files = array_diff(scandir('application/data/pages/'), array('..', '.'));
        
            foreach($files as $file) {
                               
                //$name = explode('-', $file, 2)[1];            
                $name = explode('.', $file)[0];
                //$num = explode('-', $file)[0];    
                
                $pageArray[] = '<div><h2>'.$name.'</h2>'.'<a href="'.PRE_INDEX_URL.'index.php/PageMaintenance/delete?id='.$file.'">Delete</a>'
                        .'<a href="'.PRE_INDEX_URL.'index.php/PageMaintenance/toUpdate?id='.$file.'">Update</a>'. '</div>';                
        }        
                
        return $pageArray;
    }
    
    function delete($whichpage)
    {
        
        if(unlink('application/data/pages/'.$whichpage))
        {
           echo 'deleted';
        }
        else die('Can not delete the post');
        
    }
    
    function toUpdate($whichpage)
    {
        $doc = new DOMDocument();
                $doc->load('application/data/pages/'.$whichpage);
                
                $postcont = $doc->getElementsByTagName("section");
               
                $desc = '';
                foreach ($postcont[0]->childNodes as $node)
                    {                  
                       
                        $desc.= $node->ownerDocument->saveHTML($node);
                    
                    }
                    
        //$name = explode('-', $whichpost, 2)[1];
        $name = explode('.', $whichpage)[0];
        
        $upPage[] = $name;
        $upPage[] = $desc;
        
        return $upPage;
    }
    
    function update($body, $name)
    {
        //$scanned_directory = array_diff(scandir('application/data/posts/'), array('..', '.'));
        //$lastpost = count($scanned_directory);//explode('-', array_pop($scanned_directory))[1];
        //$lastpost = $lastpost + 1;
        /*$myfile = fopen("application/data/posts/post-$lastpost.html", "w");*/
        $myfile = fopen("application/data/pages/$name.html", "w");        
        $body = '<section>'.$body.'</section>';
        fwrite($myfile, $body);
        fclose($myfile);
    }
}