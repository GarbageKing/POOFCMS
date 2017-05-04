<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<!DOCTYPE html>
<html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Post M</title>
  <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" />
</head>
 
<body>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
  
  <?php foreach ($query as $post)
      echo $post . '<br>';
      ?>
            </div>
        </div>
    </div>
  <script type="text/javascript" src="<?php echo base_url("assets/js/jquery-3.2.0.min.js"); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
</body>
</html>