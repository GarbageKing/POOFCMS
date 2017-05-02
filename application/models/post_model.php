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
                $doc->load('application/data/posts/post-'.$whichpost.'.html');
                
                $postcont = $doc->getElementsByTagName("article");
               
                $desc = '';
                foreach ($postcont[0]->childNodes as $node)
                    {                  
                       
                        $desc.= $node->ownerDocument->saveHTML($node);
                    
                    }
        
        return $desc;
    }
    
}