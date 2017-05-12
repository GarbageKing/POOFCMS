<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include_once 'application/data/chunks/heading.php';
?>

<div class="row">
    <div class="col-xs-12">
        <?php if($maindata[5] != ''){ ?>
                <style>                   
                    .jumbotron {
                    background-image: url("<?php echo PRE_INDEX_URL.'assets/files/'.$maindata[5]; ?>");
                    background-size: cover;}
                </style>
                <?php } ?>
                    <div class="jumbotron">
                    <h1><?php echo $maindata[4]; ?></h1>
                    </div>  
    </div>
</div>

        <div class="row">
            <div class="col-xs-12">
                <?php echo $query; ?>
            </div>
        </div>
  
<?php include_once 'application/data/chunks/footing.php'; ?>