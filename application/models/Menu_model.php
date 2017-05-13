<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Menu_model extends CI_Model
{
    
function __construct()
{
    parent::__construct();        
}

function get_all_items()
    {        
        
        $doc = new DOMDocument();
        libxml_use_internal_errors(true);
                $doc->loadHTMLFile('application/data/menu/menu.html');
                
                $cont = $doc->getElementsByTagName("li");
                $cont2 = $doc->getElementsByTagName("span");
               
                $data = [];
                $i = 0;
                foreach ($cont as $itm)
                    {                  
                        $item = $itm->nodeValue;
                        $input = $cont2[$i]->nodeValue;
                        $data[] = '<div class="col-xs-6"><input type="text" name="'.$item.'" class="form-control" value="'.$input.'"/></div>';
                    
                        $i++;
                    }
               
        $countdata = count($data);
        $input = 'input'.$countdata;
        $data[] = '<div class="col-xs-6"><input type="text" name="'.$input.'" class="form-control" value=""/></div>';
        $countdata = $countdata + 1;
        $input = 'input'.$countdata;
        $data[] = '<div class="col-xs-6"><input type="text" name="'.$input.'" class="form-control" value=""/></div>';
                
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
        
        $body = '<html>'.
                '<head>'.
                '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />'.
                '</head>'. 
                '<body>'.
                $body.
                '</body>'.
                '</html>';
        
        fwrite($myfile, $body);
        fclose($myfile);
    }
}