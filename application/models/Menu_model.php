<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Menu_model extends CI_Model
{
    
function __construct()
{
    parent::__construct();        
}

function get_all_items()
    {        
        
        $doc = new DOMDocument();
                $doc->load('application/data/menu/menu.html');
                
                $cont = $doc->getElementsByTagName("li");
                $cont2 = $doc->getElementsByTagName("span");
               
                $data = [];
                $i = 0;
                foreach ($cont as $itm)
                    {                  
                        $item = $itm->nodeValue;
                        $input = $cont2[$i]->nodeValue;
                        $data[] = '<input type="text" name="'.$item.'" value="'.$input.'"/>';
                    
                        $i++;
                    }
               
        $countdata = count($data);
        $input = 'input'.$countdata;
        $data[] = '<input type="text" name="'.$input.'" value=""/>';
        $countdata = $countdata + 1;
        $input = 'input'.$countdata;
        $data[] = '<input type="text" name="'.$input.'" value=""/>';
                
        return $data;
    }    
    
    function update($postarr)
    {        
        $menuitems = '';
        
        foreach($postarr as $key=>$value)
        {
            $menuitems .= '<li>'.$key.'</li>'.'<span>'.$value.'</span>';
        }                
        
        $myfile = fopen("application/data/menu/menu.html", "w");        
        $body = '<ul>'.$menuitems.'</ul>';
        fwrite($myfile, $body);
        fclose($myfile);
    }
}