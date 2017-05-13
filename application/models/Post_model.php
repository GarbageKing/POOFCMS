<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Post_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();        
    }
 
    function get_post($whichpost)
    {
        
        $doc = new DOMDocument();
        libxml_use_internal_errors(true);
                $doc->loadHTMLFile('application/data/posts/'.$whichpost);
               
                $postcont = $doc->getElementsByTagName("article");
               
                $desc = '';
                foreach ($postcont[0]->childNodes as $node)
                    {                  
                       
                        $desc.= $node->ownerDocument->saveHTML($node);
                    
                    }
          
                    $namecont = $doc->getElementsByTagName('h1');
                
                $name = $namecont[0]->nodeValue;
                    
        return $desc;
    }
    
}