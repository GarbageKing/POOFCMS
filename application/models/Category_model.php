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
                       
                        $categories[] = '<div>'.$node->nodeValue .
                                '<a href="'.PRE_INDEX_URL.'index.php/Category/delete?id='.$node->nodeValue.'">Delete</a></div>';
                    
                    }              
        
        return $categories;
    }
    
    function add_new_category($name)
    {   
        
        $doc = new DOMDocument();
        libxml_use_internal_errors(true);
        $doc->loadHTMLFile("application/data/categories/categories.html");
        $node = $doc->createElement('li', $name);
        $newNode = $doc->getElementsByTagName('ul')->item(0)->appendChild($node); 
        $newNode->setAttribute("id", $name);
        
        $catfile = fopen("application/data/categories/categories.html", "w"); 
        fwrite($catfile, $doc->saveHTML());
        fclose($catfile);        
    }
    
    function delete($whichitem)
    {
        
        $doc = new DOMDocument();
        libxml_use_internal_errors(true);
        $doc->loadHTMLFile("application/data/categories/categories.html");
        
        $liDel = $doc->getElementById($whichitem);
        $liDel->parentNode->removeChild($liDel); 
        
        $catfile = fopen("application/data/categories/categories.html", "w"); 
        fwrite($catfile, $doc->saveHTML());
        fclose($catfile);        
        
    }
    
}