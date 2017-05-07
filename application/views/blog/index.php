<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('BASEPATH') OR exit('No direct script access allowed');
include_once 'application/data/chunks/heading.php';
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
        </div>
    

<?php include_once 'application/data/chunks/footing.php'; ?>