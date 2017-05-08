<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Blog_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        //$this->load->database();
    }
 
    function get_all_posts($sort)
    {
        //get all entry
        //$query = $this->db->get('entry');
        //return $query->result();
        $postArray = [];
        
        $files = array_diff(scandir('application/data/posts/'), array('..', '.'));
        //print_r($files); die;
            foreach($files as $file) {
                
                $doc = new DOMDocument();
                libxml_use_internal_errors(true);
                $doc->loadHTMLFile('application/data/posts/'.$file);
                
                $postcont = $doc->getElementsByTagName("article");
               
                $desc = '';
                foreach ($postcont[0]->childNodes as $node)
                    {                  
                       
                        $desc.= $node->ownerDocument->saveHTML($node);
                    
                    }
                    
                //$filenum = explode('-', $file)[1];
                //$filenum = explode('.', $filenum)[0];
                //$name = explode('-', $file, 2)[1];
                $num = explode('-', $file)[0];
                //$name = explode('.', $name)[0];
                
                $namecont = $doc->getElementsByTagName('h1');
                
                $name = $namecont[0]->nodeValue;
                
                //$urlchunks = explode('/', base_url(uri_string()));
                //$url = '';
                //for($i=0; $i<4; $i++)
                //{$url .= $urlchunks[$i] . '/';}
                
                $postArray[$num][0] = '<article><h2>'.$name.'</h2><br>';
                $postArray[$num][1] = $desc;
                $postArray[$num][2]='<br><p><a href="'.PRE_INDEX_URL.'index.php/post?id='.$file.'">Read more</a></p></article>';                
        }        
        //print_r($postArray); die;
        
        if($sort == false){
            krsort($postArray);
        }
        else {
            ksort($postArray);
        }            
        
        return $postArray;
    }
 
    function add_new_entry($body, $name)
    {        
        $scanned_directory = array_diff(scandir('application/data/posts/'), array('..', '.'));
        
        $biggest = 0;
        
        foreach($scanned_directory as $file)
        {
            $num = explode('-',$file)[0];
            if($num>$biggest)
            {
                $biggest = $num;
            }
        }
        $lastpost = $biggest + 1;
        
        $myfile = fopen("application/data/posts/$lastpost-$name.html", "w");     
        
        $body = '<html>'.
                '<head>'.
                '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />'.
                '</head>'. 
                '<body>'.
                //'<h1>'.$name.'</h1>'.
                $body.
                '</body>'.
                '</html>';
        
        fwrite($myfile, $body);
        fclose($myfile);
    }
        
}