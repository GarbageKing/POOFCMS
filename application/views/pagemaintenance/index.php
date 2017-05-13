<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include_once 'application/data/chunks/heading.php';
?>

        <div class="row">
            <div class="col-xs-12">
                
                <?php include_once 'application/data/chunks/admin_navbar.php'; ?>
                
                <p>You can create a new page:
    <a href="<?php echo PRE_INDEX_URL; ?>index.php/page/add_new_entry">Here</a></p>
                
                <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}?>
  
  <div class="list-div">
  <?php foreach ($query as $page)
      echo $page . '<br>';
      ?>
  </div>
            </div>
        </div>

<?php include_once 'application/data/chunks/footing.php'; ?>