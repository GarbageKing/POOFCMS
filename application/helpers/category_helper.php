<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_categories'))
{
    function get_categories()
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
}

