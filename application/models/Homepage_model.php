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
                               
        return $homecont;
    }    
    
    function toUpdate()
    {
        $doc = new DOMDocument();
        libxml_use_internal_errors(true);
                $doc->loadHTMLFile('application/data/homepage/homepage.html');
                
                if($doc->getElementsByTagName("section")[0]){
                
                $content = $doc->getElementsByTagName("section")[0];
               
                $homecont = $content->ownerDocument->saveHTML($content);
                }
                else $homecont = '<section></section>';
        
        return $homecont;
    }
    
    function update($homepage)
    {    
        $myfile = fopen("application/data/homepage/homepage.html", "w");    
        
        $body = '<html>'.
                '<head>'.
                '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />'.
                '</head>'. 
                '<body>'.  
                '<section>'.
                $homepage.
                '</section>'.
                '</body>'.
                '</html>';
        
        fwrite($myfile, $body);
        fclose($myfile);
    }
}