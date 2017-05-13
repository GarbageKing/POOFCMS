 <?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Blog_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();        
    }
 
    function get_all_posts($sort, $urlCategory, $pageUrl)
    {        
        $postArray = [];
        
        $files = array_diff(scandir('application/data/posts/'), array('..', '.'));
        
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
                
                $num = explode('-', $file)[0];
                
                $namecont = $doc->getElementsByTagName('h1');
                
                $name = $namecont[0]->nodeValue;
                
                $catcont = $doc->getElementsByTagName('title');               
                $category = $catcont[0]->nodeValue;
                
                if($doc->getElementsByTagName('img')[0]){      
                    $first_image = $doc->getElementsByTagName('img')[0]->getAttribute('src');
                    $first_image = '<img src="'.$first_image.'" class="previmage"/>';
                }
                else
                {
                    $first_image = '';
                }
                
                if($urlCategory == '' || $urlCategory == $category)
                {
                    $postArray[$num][0] = '<article><h2>'.$name.'</h2><br>'.$first_image;
                    $postArray[$num][1] = $desc;
                    $postArray[$num][2] = '<br><p><a href="'.PRE_INDEX_URL.'index.php/post?id='.$file.'">Read more</a></p></article>'; 
                    
                }                              
                
        }        
        
        
        if($sort == false){
            krsort($postArray);
        }
        else {
            ksort($postArray);
        }       
        $fullCount = count($postArray);
        
        if($pageUrl == '')
        {
            $pageUrl = 1;
        }
            $pageUrl--; 
            $postArray = array_slice($postArray, $pageUrl*5, 5, true);
            $postArray[] = $fullCount;
        
        return $postArray;
    }
 
    function add_new_entry($body, $name, $category)
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
                '<title>'.$category.'</title>'.
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