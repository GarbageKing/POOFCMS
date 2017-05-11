<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Homepage_model extends CI_Model
{
    
function __construct()
{
    parent::__construct();        
}

function get_homepage()
    {        
        
         $doc = new DOMDocument();
                libxml_use_internal_errors(true);
                $doc->loadHTMLFile('application/data/homepage/homepage.html');
                
                $content = $doc->getElementsByTagName("section")[0];
                
                $homecont = $content->ownerDocument->saveHTML($content);
               
                //$desc = '';
                //foreach ($homecont[0]->childNodes as $node)
                 //   {                  
                 //      
                 //       $desc.= $node->ownerDocument->saveHTML($node);
                  //  
                 //   }
                
        return $homecont;
    }    
    
    function toUpdate()
    {
        $doc = new DOMDocument();
        libxml_use_internal_errors(true);
                $doc->loadHTMLFile('application/data/homepage/homepage.html');
                
                $content = $doc->getElementsByTagName("section")[0];
               
                $homecont = $content->ownerDocument->saveHTML($content);
        
        return $homecont;
    }
    
    function update($homepage)
    {               
        //echo $homepage; die;
        $myfile = fopen("application/data/homepage/homepage.html", "w");       
        
        fwrite($myfile, $homepage);
        fclose($myfile);
    }
}