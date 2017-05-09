<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
                               
                //$name = explode('-', $file, 2)[1];            
                //$name = explode('.', $name)[0];
                $num = explode('-', $file)[0];    
                $doc = new DOMDocument();
                libxml_use_internal_errors(true);
                $doc->loadHTMLFile('application/data/posts/'.$file);
                $namecont = $doc->getElementsByTagName('h1');
                
                $name = $namecont[0]->nodeValue;
                
                $postArray[$num] = '<div><h2>'.$name.'</h2>'.'<a href="'.PRE_INDEX_URL.'index.php/PostMaintenance/delete?id='.$file.'">Delete</a>'
                        .'<a href="'.PRE_INDEX_URL.'index.php/PostMaintenance/toUpdate?id='.$file.'">Update</a>'. '</div>';                
        }        
        
        krsort($postArray);
        
        return $postArray;
    }
    
    function delete($whichpost)
    {
        
        if(unlink('application/data/posts/'.$whichpost))
        {
           echo 'deleted';
        }
        else die('Can not delete the post');
        
    }
    
    function toUpdate($whichpost)
    {
        $doc = new DOMDocument();
        libxml_use_internal_errors(true);
                $doc->loadHTMLFile('application/data/posts/'.$whichpost);
                
                //$namecont = $doc->getElementsByTagName("h1");
                $postcont = $doc->getElementsByTagName("article");
               
                $desc = '';
                foreach ($postcont[0]->childNodes as $node)
                    {                  
                       
                        $desc.= $node->ownerDocument->saveHTML($node);
                    
                    }
                    
                $category = $doc->getElementsByTagName("title");
                $catName = $category[0]->nodeValue;
                
                //$title = $namecont[0]->nodeValue;
        //$name = explode('-', $whichpost, 2)[1];
        $name = explode('.', $whichpost)[0];
        
        $upPost[] = $name;
        $upPost[] = $desc;
        $upPost[] = $catName;
        
        return $upPost;
    }
    
    function update($body, $name, $category)
    {
        //$scanned_directory = array_diff(scandir('application/data/posts/'), array('..', '.'));
        //$lastpost = count($scanned_directory);//explode('-', array_pop($scanned_directory))[1];
        //$lastpost = $lastpost + 1;
        /*$myfile = fopen("application/data/posts/post-$lastpost.html", "w");*/
        $myfile = fopen("application/data/posts/$name.html", "w");        
        $body = '<article>'.$body.'</article>';
        
        $body = '<html>'.
                '<head>'.
                '<title>'.$category.'</title>'.
                '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />'.
                '</head>'. 
                '<body>'.
                //'<h1>'.$name.'</h1>'.
                $body.
                '</body>'.
                '</html>';
        
        fwrite($myfile, $body);
        fclose($myfile);
    }
}