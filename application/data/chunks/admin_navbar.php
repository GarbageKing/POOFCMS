<form class="navbar-form navbar-right" role= "search" action="<?php echo PRE_INDEX_URL; ?>index.php/logout/logout"> 
        <button type="submit" class="btn white-btn"> Logout <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></button> 
</form> 
                <h2>Welcome to the system, <?php $this->load->library('session'); $login_session = $this->session->userdata('userlogin'); 
                    echo $login_session['Username']; ?> 
                </h2>

<ul class="nav nav-tabs nav-justified">  
  
    <li><a href="<?php echo PRE_INDEX_URL; ?>index.php/PostMaintenance"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            Posts</a></li>    
    
    <li><a href="<?php echo PRE_INDEX_URL; ?>index.php/PageMaintenance"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>
            Pages</a></li>
   
    <li><a href="<?php echo PRE_INDEX_URL; ?>index.php/Customization"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            Settings</a></li> 
    
    <li><a href="<?php echo PRE_INDEX_URL; ?>index.php/Menu"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
            Menu</a></li>
    
    <li><a href="<?php echo PRE_INDEX_URL; ?>index.php/Files"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
            Files</a></li>
    
    <li><a href="<?php echo PRE_INDEX_URL; ?>index.php/Category"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
            Categories</a></li>
    
    <li><a href="<?php echo PRE_INDEX_URL; ?>index.php/Styles"><span class="glyphicon glyphicon-blackboard" aria-hidden="true"></span>
            Styles</a></p></li>
    
    <li><a href="<?php echo PRE_INDEX_URL; ?>index.php/Homepage/toUpdate"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>
            Homepage</a></li>
    
</ul>
