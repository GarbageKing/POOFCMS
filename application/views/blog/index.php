<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('BASEPATH') OR exit('No direct script access allowed');
include_once 'application/data/chunks/heading.php';
$this->load->helper('category_helper');
$categories = get_categories();
?>

<div class="row">
    <div class="col-xs-12">
        <?php if($maindata[5] != ''){ ?>
                <style>                   
                    .jumbotron {
                    background-image: url("<?php echo PRE_INDEX_URL.'assets/files/'.$maindata[5]; ?>");
                    background-size: cover;}
                </style>
                <?php } ?>
                    <div class="jumbotron">
                    <h1><?php echo $maindata[4]; ?></h1>
                    </div>  
    </div>
</div>

        <div class="row">
            <div class="col-md-10">           
                
  <?php
  
  $postAmount = end($query);
  array_pop($query); 
  
  foreach ($query as $post){      
      $subs = '<time>'.explode('<time>',strip_tags($post[1], '<time>'))[1];
      echo $post[0] . mb_substr($subs, 0, 200) . $post[2].'<br>';
  }
      ?>
            </div>
        <div class="col-md-2">
            <p>Sort posts:</p>
            <?php
            
            $uri = $_SERVER['REQUEST_URI']; 
            
            if(strpos($uri, '?') !== false && strpos($uri, '?sort') == false)
            { 
                $uripart = explode('?', $uri);
                $uripart = explode('&', $uripart[1]);
                $fullurl = 'index.php/blog?'.$uripart[0].'&';                
            }
            else
            { 
                //$uripart = explode('?', $uri);
                $fullurl = 'index.php/blog?';
            }
            //$uripart = explode('/', $uri);
            //$uripart = array_pop($uripart);
            
            ?>
            <select id="sorting" name="sorting" onchange="location = this.value;" class="form-control">
                <option disabled selected value> - </option>
                <option value="<?php echo PRE_INDEX_URL.$fullurl.'sort=straight'; ?>">Newer top</option>
                <option value="<?php echo PRE_INDEX_URL.$fullurl.'sort=reverse' ?>">Older top</option>                
            </select>
            <p>Categories:</p>
            <ul>
            <?php foreach($categories as $cat){ ?>
                
                <li><a href="<?php echo PRE_INDEX_URL.'index.php/blog?category='.$cat; ?>"><?php echo $cat; ?></a></li>
                
            <?php } ?>
            </ul>
        </div>            
        </div>


        <?php       
        
        if(strpos($uri, 'page=') !== false){
                
            $pagenumber = explode('page=', $uri)[1];
            $pagenumber = explode('&', $pagenumber)[0];   
            
           // $postAmount = count($query);
            //echo $postAmount; die;
            
            if($pagenumber*5>=$postAmount)
            {
                $nextPageNumber = $pagenumber;
            }
            else
            {
                $nextPageNumber = $pagenumber+1;
            }
            
            if($pagenumber==1)
            {
                $prevPageNumber = $pagenumber;
            }
            else
            {
                $prevPageNumber = $pagenumber-1;
            }        
            
            $uri = explode('blog', $uri)[1];
        
            $hrefPrev = ltrim(str_replace ( 'page='.$pagenumber , 'page='.$prevPageNumber, $uri),'/');   
            $hrefPrev = 'index.php/blog'.$hrefPrev; 
            $hrefNext = ltrim(str_replace ( 'page='.$pagenumber , 'page='.$nextPageNumber, $uri),'/');    
            $hrefNext = 'index.php/blog'.$hrefNext; 
            
        }
        else
        {
            //$postAmount = count($query);
            
            if(strpos($uri, '?')==false)
            {$sign = '?';} 
            else
            {$sign = '&';} 
            //echo $postAmount; die;
            if(strpos($uri, 'index.php/blog')!=false){
            $uri = explode('blog', $uri)[1];
            $hrefPrev = ltrim($uri,'/').$sign.'page=1';
            $hrefPrev = 'index.php/blog'.$hrefPrev; 
            if($postAmount>5)
            {$hrefNext = ltrim($uri,'/').$sign.'page=2';
            $hrefNext = 'index.php/blog'.$hrefNext;}
            else
            {$hrefNext = $hrefPrev;}
            }
            else {
            $hrefPrev = 'index.php/blog'.$sign.'page=1';
            if($postAmount>5)
            {$hrefNext = 'index.php/blog'.$sign.'page=2';}
            else
            {$hrefNext = $hrefPrev;}
            }
        }
        
        ?>

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <a class="pull-left" href="<?php echo PRE_INDEX_URL.$hrefPrev;?>">Previous</a>
        <a class="pull-right" href="<?php echo PRE_INDEX_URL.$hrefNext;?>">Next</a>
    </div>
</div>
    

<?php include_once 'application/data/chunks/footing.php'; ?>