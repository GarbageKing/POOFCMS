<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 

if ( ! function_exists('get_data'))
{
    function get_data()
    {
                $doc = new DOMDocument();
                libxml_use_internal_errors(true);
                $doc->loadHTMLFile('application/data/info/info.html');
                
                $cont = $doc->getElementsByTagName("li");
               
                $maindata = [];
                foreach ($cont as $inf)
                    {               
                        $maindata[] = $inf->nodeValue;                    
                    }
                return $maindata;
    }   
}

