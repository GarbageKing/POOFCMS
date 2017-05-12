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
                                
                $doc = new DOMDocument();
                libxml_use_internal_errors(true);
                $doc->loadHTMLFile('application/data/pages/'.$file);
                $namecont = $doc->getElementsByTagName('h1');
                
                $name = $namecont[0]->nodeValue;
                
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
        libxml_use_internal_errors(true);
                $doc->loadHTMLFile('application/data/pages/'.$whichpage);
                
                $postcont = $doc->getElementsByTagName("section");
               
                $desc = '';
                foreach ($postcont[0]->childNodes as $node)
                    {                  
                       
                        $desc.= $node->ownerDocument->saveHTML($node);
                    
                    }                    
        
        $name = explode('.', $whichpage)[0];
        
        $upPage[] = $name;
        $upPage[] = $desc;
        
        return $upPage;
    }
    
    function update($body, $name)
    {        
        $myfile = fopen("application/data/pages/$name.html", "w");        
        $body = '<section>'.$body.'</section>';
        
        $body = '<html>'.
                '<head>'.
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