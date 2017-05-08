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
  <h2>Files page</h2>
 <?php if(isset($error)){ echo $error;} ?>
  <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}?> 
  
  <div class="row">
      <div class="col-md-6">
<?php echo form_open_multipart(PRE_INDEX_URL.'index.php/Files/upload');?>

<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="upload" />

</form>
</div>

      <div class="col-md-6">
          <ul>
              <?php foreach($files_uploaded as $item){
                        
                        echo '<li>'.$item.'</li>';
                  
                    }           
                  ?>
          </ul>
      </div>
</div>
  
<?php include_once 'application/data/chunks/footing.php'; ?>