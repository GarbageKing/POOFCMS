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
        <?php if($maindata[4] != ''){ ?>
                <style>                   
                    .jumbotron {
                    background-image: url("<?php echo PRE_INDEX_URL.'assets/files/'.$maindata[4]; ?>");
                    background-size: cover;}
                </style>
                <?php } ?>
                    <div class="jumbotron">
                    <h1><?php echo $maindata[3]; ?></h1>
                    </div>  
    </div>
</div>

        <div class="row">
            <div class="col-xs-10">           
                
  <?php
  
  foreach ($query as $post){
      //$headingpart = explode('</time>', $post)[0].'</time>';
      //$bodypart = explode('</time>', $post)[1];
      //$everything = $headingpart .     
      $subs = '<time>'.explode('<time>',strip_tags($post[1], '<time>'))[1];
      echo $post[0] . mb_substr($subs, 0, 200) . $post[2].'<br>';
  }
      ?>
            </div>
        <div class="col-xs-2">
            <p>Sort posts:</p>
            <?php
            
            $uri = $_SERVER['REQUEST_URI'];
            $sign = '';
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
    

<?php include_once 'application/data/chunks/footing.php'; ?>