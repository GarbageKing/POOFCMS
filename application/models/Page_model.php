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
                $doc->load('application/data/pages/'.$whichpage.'.html');
                
                $pagecont = $doc->getElementsByTagName("section");
               
                $desc = '';
                foreach ($pagecont[0]->childNodes as $node)
                    {                  
                       
                        $desc.= $node->ownerDocument->saveHTML($node);
                    
                    }
        
        return $desc;
    }
    
    function add_new_entry($body, $name)
    {               
        $myfile = fopen("application/data/pages/$name.html", "w");
        fwrite($myfile, $body);
        fclose($myfile);
    }
    
}