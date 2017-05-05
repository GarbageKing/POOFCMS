<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include_once 'application/data/chunks/heading.php';
?>
        <div class="row">
            <div class="col-xs-12">
    <form class="form-horizontal" role="form" action= "<?php echo PRE_INDEX_URL; ?>index.php/login/login" method="post"> 
        <div class="form-group"> 
            <label class="control-label col-sm-2" for="username" >Username:</label> 
            <div class="col-sm-10"> 
                <input type="username" class="form-control" id="username" name="username" placeholder="Enter username"> 
            </div> 
        </div> 
    <div class="form-group"> 
        <label class="control-label col-sm-2" for="pwd"> Password:</label> 
        <div class="col-sm-10"> 
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password"> 
        </div> 
    </div> 
    <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10"> 
            <div class="checkbox"> 
                <label><input type="checkbox"> Remember me</label> 
            </div> 
        </div> 
    </div> 
    <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10"> 
            <button type="submit" class="btn btn-default"> Login</button> 
        </div> 
    </div> 
</form> 
            </div>
        </div>
    
<?php include_once 'application/data/chunks/footing.php'; ?>