<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include_once 'application/data/chunks/heading.php';
?>


        <div class="row">
            <div class="col-xs-12">
                
                <?php include_once 'application/data/chunks/admin_navbar.php'; ?>
  <h2>Menu</h2>
  <div class="row">
      <div class="col-xs-6">
          Name of the item
      </div>
      <div class="col-xs-6">
          Full link
      </div>
  </div>
  <?php echo validation_errors(); ?>
  <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}?>
  <div class="row">
  <?php echo form_open(PRE_INDEX_URL.'index.php/Menu/update');?>
  <?php foreach ($query as $inp)
      echo $inp;
      ?>
  <br><br>
  <input type="submit" value="Submit" style="margin-top:20px;margin-left: 15px;" class="btn white-btn" />
  <?php echo form_close();?>
  </div>
            </div>
        </div>
  
<?php include_once 'application/data/chunks/footing.php'; ?>