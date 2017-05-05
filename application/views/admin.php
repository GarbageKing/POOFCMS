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
    <p>You may proceed to maintaining blogposts:
    <a href="<?php echo PRE_INDEX_URL; ?>index.php/PostMaintenance">Here</a></p>    
    <p>You may proceed to maintaining pages:
    <a href="<?php echo PRE_INDEX_URL; ?>index.php/PageMaintenance">Here</a></p>
            </div>
        </div>
    
<?php include_once 'application/data/chunks/footing.php'; ?>