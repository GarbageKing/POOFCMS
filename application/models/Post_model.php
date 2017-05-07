<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
                //echo 'application/data/posts/'.$whichpost; die;
                $postcont = $doc->getElementsByTagName("article");
               
                $desc = '';
                foreach ($postcont[0]->childNodes as $node)
                    {                  
                       
                        $desc.= $node->ownerDocument->saveHTML($node);
                    
                    }
                    
        //$name = explode('-', $whichpost, 2)[1];
        //$name = explode('.', $name)[0];
                    $namecont = $doc->getElementsByTagName('h1');
                
                $name = $namecont[0]->nodeValue;
                    
        return $desc;
    }
    
}