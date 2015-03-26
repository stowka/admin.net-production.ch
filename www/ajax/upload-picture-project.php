<?php

    require_once "../lib/spdo.class.php";
    require_once "../models/project.class.php";
    require_once "../config/config.inc.php";

    $picture = $_FILES['picture'];
    $target_file = UPLOAD_PATH_ADMIN . $picture['name'] . ".png";
    $upload_ok = 1;

    //Check type
    if($picture['type'] != "image/png") {
        $upload_ok = 0;
    }

    //Check size


    //Upload 
    if($upload_ok == 0) {
        echo "Error : file has not been uploaded !";
    } else {
        if (move_uploaded_file($picture['tmp_name'], $target_file)) {
            //copy($target_file, UPLOAD_PATH_SITE . $picture['name'] . ".png");
            $project = Project::initWithId((int)$picture['name']);
            $project->update_picture($picture['name'] . ".png");
            echo "The file has been uploaded !";
        } else {
            echo "Error : file has not been uploaded !";
        }
    }
    




