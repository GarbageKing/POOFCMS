<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include_once 'application/data/chunks/heading.php';
?>


        <div class="row">
            <div class="col-xs-12">
                
                <?php include_once 'application/data/chunks/admin_navbar.php'; ?>
  <h2>Files</h2>
 <?php if(isset($error)){ echo $error;} ?>
  <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}?> 
  
  <div class="row">
      <div class="col-md-6">
          <h3>Upload new</h3>
<?php echo form_open_multipart(PRE_INDEX_URL.'index.php/Files/upload');?>

<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="Upload" class="btn white-btn" />

</form>
</div>

      <div class="col-md-6">
          <h3>Uploaded files</h3>
          <ul class="file-list">
              <?php foreach($files_uploaded as $item){
                        
                        echo '<li>'.$item.'</li>';
                  
                    }           
                  ?>
          </ul>
      </div>
</div>
  
<?php include_once 'application/data/chunks/footing.php'; ?>