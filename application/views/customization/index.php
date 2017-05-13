<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include_once 'application/data/chunks/heading.php';
?>


        <div class="row">
            <div class="col-xs-12">
                
                <?php include_once 'application/data/chunks/admin_navbar.php'; ?>
  <h2>Site settings page</h2>
  <?php echo validation_errors(); ?>
  <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}?>
  <?php echo form_open(PRE_INDEX_URL.'index.php/Customization/customize');?>
  <p>Default page (accessible by your domain name first):<br />
  <select id="default_page" name="default_page" class="form-control">   
      <option value="<?php echo $query[0]; ?>"><?php echo ucfirst($query[0]); ?></option>     
      <option value="blog">Blog</option>
      <option value="homepage">Homepage</option>                             
  </select>
  </p>
  <p>Site name (used in Brand):<br />
  <input type="text" name="site_name" class="form-control" value="<?php echo $query[1]; ?>"/>
  </p>
  <p>Site Title (used in Title):<br />
  <input type="text" name="site_title" class="form-control" value="<?php echo $query[2]; ?>"/>
  </p>
  <p>Site Copyright (used in Footer):<br />
  <input type="text" name="copyright_info" class="form-control" value="<?php echo $query[3]; ?>"/>
  </p>
  <p>Blog Title (used on a Blog Page/Homepage):<br />
  <input type="text" name="blog_title" class="form-control" value="<?php echo $query[4]; ?>"/>
  </p>
  <p>Blog Title Image (used on a Blog Page/Homepage):<br />
  <input type="text" name="jumbotron_image" class="form-control" value="<?php echo $query[5]; ?>"/>
  </p>
  <p>Favicon:<br />
  <input type="text" name="favicon" class="form-control" value="<?php echo $query[6]; ?>"/>
  </p>
  <input type="submit" value="Submit" class="btn white-btn" />
  <?php echo form_close();?>
            </div>
        </div>
  
<?php include_once 'application/data/chunks/footing.php'; ?>