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
                
                <h2 style="text-align: center; padding-top: 100px;">You can proceed to edit your site from the menu above!</h2>
                
            </div>
        </div>
    
<?php include_once 'application/data/chunks/footing.php'; ?>