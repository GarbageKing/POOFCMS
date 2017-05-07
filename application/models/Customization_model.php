<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Customization_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();        
    }
 
    function get_all_customs()
    {
        
                $doc = new DOMDocument();
                libxml_use_internal_errors(true);
                $doc->loadHTMLFile('application/data/info/info.html');
                
                $cont = $doc->getElementsByTagName("li");
               
                $data = [];
                foreach ($cont as $inf)
                    {                  
                       
                        $data[] = $inf->nodeValue;
                    
                    }
        
                    
        return $data;
    }
    
    function customize($site_name, $site_title, $copyright_info, $blog_title, $jumbotron_image)
    {               
        $custfile = fopen("application/data/info/info.html", "w");
        $body = '<ul>'.
                '<li>'.$site_name.'</li>'.
                '<li>'.$site_title.'</li>'.
                '<li>'.$copyright_info.'</li>'.      
                '<li>'.$blog_title.'</li>'. 
                '<li>'.$jumbotron_image.'</li>'. 
                '</ul>';
        
        $body = '<html>'.
                '<head>'.
                '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />'.
                '</head>'. 
                '<body>'.
                $body.
                '</body>'.
                '</html>';
        
        fwrite($custfile, $body);
        fclose($custfile);
    }
    
}