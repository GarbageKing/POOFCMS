<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Page_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();        
    }
 
    function get_page($whichpage)
    {
        
        $doc = new DOMDocument();
        libxml_use_internal_errors(true);
                $doc->loadHTMLFile('application/data/pages/'.$whichpage.'.html');
                
                $pagecont = $doc->getElementsByTagName("section");
               
                $desc = '';
                foreach ($pagecont[0]->childNodes as $node)
                    {                  
                       
                        $desc.= $node->ownerDocument->saveHTML($node);
                    
                    }
                    
                $namecont = $doc->getElementsByTagName('h1');
                
                $name = $namecont[0]->nodeValue;
        
        return $desc;
    }
    
    function add_new_entry($body, $name)
    {               
        $thefile = "application/data/pages/$name.html";
        
        if(file_exists ( $thefile )){
            $this->session->set_flashdata('message', 'Page with this name already exists!');
            redirect(PRE_INDEX_URL.'index.php/page/add_new_entry');
        }
        else{
        $myfile = fopen($thefile, "w");
        
        $body = '<html>'.
                '<head>'.
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
    
}