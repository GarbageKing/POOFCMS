<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$this->load->helper('maindata_helper');
$maindata = get_data();
$this->load->helper('menu_helper');
$menu = get_menu();
?>

<!DOCTYPE html>
<html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title><?php echo $maindata[1]; ?></title>
  <link rel='shortcut icon' type='image/x-icon' href='/favicon.ico' />
  <link rel="stylesheet" href="<?php echo PRE_INDEX_URL."assets/css/bootstrap.min.css"; ?>" />
  <link rel="stylesheet" href="<?php echo PRE_INDEX_URL."assets/css/custom.css"; ?>" />
  <?php if($maindata[5] != ''){ ?>
  <link rel='shortcut icon' type='image/x-icon' href='<?php echo PRE_INDEX_URL."assets/files/".$maindata[5]; ?>' />
  <?php } ?>
</head>
 
<body>
    <nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <a class="navbar-brand" href="<?php echo PRE_INDEX_URL; ?>"><?php echo $maindata[0]; ?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <?php foreach($menu as $item) 
        {echo $item;} ?>       
      </ul>
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
    <div class="container">
        
        
        