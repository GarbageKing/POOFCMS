<?php

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
 
                <p>You may proceed to creating blogposts:
    <a href="<?php echo PRE_INDEX_URL; ?>index.php/blog/add_new_entry">Here</a></p>
                
  <?php foreach ($query as $post)
      echo $post . '<br>';
      ?>
            </div>
        </div>

<?php include_once 'application/data/chunks/footing.php'; ?>