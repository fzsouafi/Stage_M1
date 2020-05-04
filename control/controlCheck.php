<?php
    //include("../model/model.php");
    print_r($_GET);
    $id=getOrder('capture_files','id','id'); // Get all the capture_file to diplay it
    $filename=getOrder('capture_files','filename','id');
    $filesize=getOrder('capture_files','filesize','id');
    $web_path=getOrder('capture_files','web_path','id');
    $system_path=getOrder('capture_files','system_path','id');
    ?>
