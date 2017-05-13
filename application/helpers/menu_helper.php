<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('get_menu'))
{
    function get_menu()
    {
                $doc = new DOMDocument();
                libxml_use_internal_errors(true);
                $doc->loadHTMLFile('application/data/menu/menu.html');
                                
                $cont = $doc->getElementsByTagName("span");
               
                $menudata = [];
                                
                $todata = '';
                
                $is_name = true;
                
                foreach ($cont as $itm)
                    {        
                    
                        $item = $itm->nodeValue;
                        
                        if($is_name)
                        {                        
                            $todata .= $item.'</a></li>';
                            $is_name = false;                        
                        }
                        else
                        {
                            $todata =  '<li><a href="'.$item.'">' . $todata;
                            $menudata[] = $todata;
                            $todata = '';
                            $is_name = true;
                        }                        
                         
                    }
                return $menudata;
    }   
}

