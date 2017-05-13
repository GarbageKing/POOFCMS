<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include_once 'application/data/chunks/heading.php';
?>


        <div class="row">
            <div class="col-xs-12">
                
                <?php include_once 'application/data/chunks/admin_navbar.php'; ?>
  <h2>Styling</h2> 
  <?php echo form_open(PRE_INDEX_URL.'index.php/Styles/update');?>
  
  <textarea id="styles" name="styles" rows="30" style="resize:none;" class="form-control"><?php echo $query; ?></textarea>
   
  <input type="submit" value="Submit" class="btn white-btn" style="margin-top: 20px;" />
  <?php echo form_close();?>
            </div>
        </div>
  
<?php include_once 'application/data/chunks/footing.php'; ?>