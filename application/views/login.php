<?php

defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
        <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" />
</head>
<body>
    <div class="container">
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
    </div>
        <script type="text/javascript" src="<?php echo base_url("assets/js/jquery-3.2.0.min.js"); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
</body>
</html>