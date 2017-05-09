<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Category_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();        
    }
 
    function get_all_cats()
    {
        
        $doc = new DOMDocument();
        libxml_use_internal_errors(true);
                $doc->loadHTMLFile('application/data/categories/categories.html');
                
                $pagecont = $doc->getElementsByTagName("li");
                               
                $categories = [];
                foreach ($pagecont as $node)
                    {                  
                       
                        $categories[] = $node->nodeValue;
                    
                    }              
        
        return $categories;
    }
    
    function add_new_category($name)
    {   
        
        $doc = new DOMDocument();
        libxml_use_internal_errors(true);
        $doc->loadHTMLFile("application/data/categories/categories.html");
        $doc->getElementsByTagName('ul')->item(0)->appendChild(
            $doc->createElement('li', $name)            
        );        
        
        $catfile = fopen("application/data/categories/categories.html", "w"); 
        fwrite($catfile, $doc->saveHTML());
        fclose($catfile);        
    }
    
}