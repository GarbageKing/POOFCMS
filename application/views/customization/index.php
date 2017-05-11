<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('BASEPATH') OR exit('No direct script access allowed');
include_once 'application/data/chunks/heading.php';
?>


        <div class="row">
            <div class="col-xs-12">
                <form class="navbar-form navbar-right" role= "search" action="<?php echo PRE_INDEX_URL; ?>index.php/logout/logout"> 
                        <button type="submit" class="btn btn-default"> Logout</button> 
                </form> 
                <h2>Welcome to the system, <?php $this->load->library('session'); $login_session = $this->session->userdata('userlogin'); 
                    echo $login_session['Username']; ?> 
                </h2>
  <h2>Customization page</h2>
  <?php echo validation_errors(); ?>
  <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}?>
  <?php /*$this->load->view('blog/menu');*/ echo form_open(PRE_INDEX_URL.'index.php/Customization/customize');?>
  <p>Default page (accessible by your domain name first):<br />
  <select id="default_page" name="default_page" class="form-control">   
      <option value="<?php echo $query[0]; ?>"><?php echo ucfirst($query[0]); ?></option>     
      <option value="blog">Blog</option>
      <option value="homepage">Homepage</option>                             
  </select>
  </p>
  <p>Site name (used in Brand):<br />
  <input type="text" name="site_name" value="<?php echo $query[1]; ?>"/>
  </p>
  <p>Site Title (used in Title):<br />
  <input type="text" name="site_title" value="<?php echo $query[2]; ?>"/>
  </p>
  <p>Site Copyright (used in Footer):<br />
  <input type="text" name="copyright_info" value="<?php echo $query[3]; ?>"/>
  </p>
  <p>Blog Title (used on a Blog Page):<br />
  <input type="text" name="blog_title" value="<?php echo $query[4]; ?>"/>
  </p>
  <p>Blog Title Image (used on a Blog Page):<br />
  <input type="text" name="jumbotron_image" value="<?php echo $query[5]; ?>"/>
  </p>
  <p>Favicon:<br />
  <input type="text" name="favicon" value="<?php echo $query[6]; ?>"/>
  </p>
  <!--<p>Site Logo (used in Favicon):<br />
  <input type="file" name="favicon" value="<?php //echo $query[3]; ?>"/>
  </p>  -->
  <input type="submit" value="Submit" />
  <?php echo form_close();?>
            </div>
        </div>
  
<?php include_once 'application/data/chunks/footing.php'; ?>