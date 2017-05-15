<?php

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
      echo $post[0] . mb_substr($subs, 0, 200). '...' . $post[2].'<br>';
  }
      ?>
            </div>
        <div class="col-md-2">
            <p>Sort posts:</p>
            
            <?php include_once 'application/data/chunks/blog_sorting.php'; ?>
            
            <p>Categories:</p>
            <ul class="blog_cats">
            <?php foreach($categories as $cat){ ?>
                
                <li><a href="<?php echo PRE_INDEX_URL.'index.php/blog?category='.$cat; ?>"><?php echo str_replace('_', ' ', $cat); ?></a></li>
                
            <?php } ?>
            </ul>
        </div>            
        </div>

<?php include_once 'application/data/chunks/blog_paging.php'; ?>

<?php include_once 'application/data/chunks/footing.php'; ?>