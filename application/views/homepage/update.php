<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include_once 'application/data/chunks/heading.php';
?>


        <div class="row">
            <div class="col-xs-12">
                
                <?php include_once 'application/data/chunks/admin_navbar.php'; ?>
  <h2>Edit Homepage</h2> 
  <?php echo form_open(PRE_INDEX_URL.'index.php/Homepage/update');?>
  <p>
  <textarea id="homepage" name="homepage" rows="30" style="resize:none;"><?php echo $query; ?></textarea>
  </p>  
  <input type="submit" value="Submit" class="btn white-btn" style="margin-bottom: 10px;" />
  <?php echo form_close();?>
            </div>
        </div>
  
<script src='<?php echo PRE_INDEX_URL."assets/js/tinymce/tinymce.min.js"?>'></script>
<script>tinymce.init({
    selector: '#homepage',
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