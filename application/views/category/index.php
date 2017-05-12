<?php

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
                <?php include_once 'application/data/chunks/admin_navbar.php'; ?>
  <h2>Categories page</h2>
  <?php echo validation_errors(); ?>
  <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}?>
  <p>
      Categories:<br>
        <ul>
            <?php 
            foreach($query as $cat)
            {
                echo '<li>'.$cat.'</li>';
            }
            ?>
        </ul>
  </p>
  <?php echo form_open(PRE_INDEX_URL.'index.php/Category/add_new_category');?>
  
  <p>Add new:<br />
  <input type="text" name="category_name"/>
  </p>
  
  <input type="submit" value="Submit" />
  <?php echo form_close();?>
            </div>
        </div>
  
<?php include_once 'application/data/chunks/footing.php'; ?>