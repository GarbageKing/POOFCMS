<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'application/data/chunks/heading.php';
?>
<div class="row">
    <p>You may proceed to creating pages:
    <a href="<?php echo PRE_INDEX_URL; ?>index.php/page/add_new_entry">Here</a></p>
</div>

        <div class="row">
            <div class="col-xs-12">
  
  <?php foreach ($query as $page)
      echo $page . '<br>';
      ?>
            </div>
        </div>

<?php include_once 'application/data/chunks/footing.php'; ?>