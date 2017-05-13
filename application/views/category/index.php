<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include_once 'application/data/chunks/heading.php';
?>


        <div class="row">
            <div class="col-xs-12">
                
                <?php include_once 'application/data/chunks/admin_navbar.php'; ?>
  <h2>Categories</h2>
  <?php echo validation_errors(); ?>
  <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}?>
    <div class="row">
        <div class="col-xs-6">
  <?php echo form_open(PRE_INDEX_URL.'index.php/Category/add_new_category');?>
  
  <h3>Add new:</h3>
      <input type="text" name="category_name" class="form-control"/>
  
  
  <input type="submit" value="Submit" style="margin-top:20px;" class="btn white-btn" />
  <?php echo form_close();?>
        </div>        
        
        <div class="col-xs-6">
            <h3>Existing categories:</h3>
        <ul class="a_category-list">
            <?php 
            foreach($query as $cat)
            {
                echo '<li>'.$cat.'</li>';
            }
            ?>
        </ul>
        </div>        
        
    </div>
  
            </div>
        </div>
  
<?php include_once 'application/data/chunks/footing.php'; ?>