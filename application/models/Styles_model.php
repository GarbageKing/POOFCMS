<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Styles_model extends CI_Model
{
    
function __construct()
{
    parent::__construct();        
}

function get_styles()
    {        
        
        $data = file_get_contents("assets/css/custom.css");
                
        return $data;
    }    
    
    function update($styles)
    {               
        //echo $styles; die;
        $myfile = fopen("assets/css/custom.css", "w");       
        
        fwrite($myfile, $styles);
        fclose($myfile);
    }
}