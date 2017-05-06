<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('test_method'))
{
    function get_data()
    {
                $doc = new DOMDocument();
                $doc->load('application/data/info/info.html');
                
                $cont = $doc->getElementsByTagName("li");
               
                $maindata = [];
                foreach ($cont as $inf)
                    {               
                        $maindata[] = $inf->nodeValue;                    
                    }
                return $maindata;
    }   
}

