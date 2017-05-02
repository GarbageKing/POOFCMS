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
<form class="navbar-form navbar-right" role= "search" action="<?php echo base_url();?>/index.php/logout/logout"> 
    <button type="submit" class="btn btn-default"> Logout</button> 
</form> 
    <h2>Welcome to the system, <?php $this->load->library('session'); $login_session = $this->session->userdata('userlogin'); 
 echo $login_session['Username']; ?> 
    </h2>       
    <p>You may proceed to creating blogposts:
    <a href="<?php echo base_url();?>/index.php/blog/add_new_entry">Here</a></p>
    <p>You may proceed to creating pages:
    <a href="<?php echo base_url();?>/index.php/page/add_new_entry">Here</a></p>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url("assets/js/jquery-3.2.0.min.js"); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
</body>
</html>