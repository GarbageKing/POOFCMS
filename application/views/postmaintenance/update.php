<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include_once 'application/data/chunks/heading.php';

$this->load->helper('category_helper');
$categories = get_categories();
?>


        <div class="row">
            <div class="col-xs-12">
                
                <?php include_once 'application/data/chunks/admin_navbar.php'; ?>
  <h2>Update post</h2>
  <?php echo validation_errors(); ?>
  <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}?>
  <?php echo form_open(PRE_INDEX_URL.'index.php/PostMaintenance/update');?>
  <p>Title:<br />
  <input type="text" name="entry_name" class="form-control" value="<?php echo $query[0]; ?>"/>
  </p>
  <p>Body:<br />
  <textarea id="rTextarea" name="entry_body" rows="5" cols="50" style="resize:none;"><?php echo $query[1]; ?></textarea>
  </p>
  <p>Category:<br />
  <select id="category_name" name="category_name" class="form-control">   
      <option value="<?php echo $query[2]; ?>"><?php echo $query[2]; ?></option>
      <?php foreach ($categories as $cat){ ?>
      
          <option value="<?php echo $cat; ?>"><?php echo $cat; ?></option>
          
      <?php } ?>                            
  </select>
  </p>
  <input type="submit" value="Submit" class="btn white-btn" style="margin-bottom: 10px;" />
  <?php echo form_close();?>
            </div>
        </div>
  
<script src='<?php echo PRE_INDEX_URL."assets/js/tinymce/tinymce.min.js"?>'></script>
<script>tinymce.init({
    selector: '#rTextarea',
    height: 500,
    theme: 'modern',
    plugins: [
      'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      'searchreplace wordcount visualblocks visualchars code fullscreen',
      'insertdatetime media nonbreaking save table contextmenu directionality',
      'emoticons template paste textcolor colorpicker textpattern imagetools'
    ],
    toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
    toolbar2: 'print preview media | forecolor backcolor emoticons',
    image_advtab: true
});</script>
<?php include_once 'application/data/chunks/footing.php'; ?>