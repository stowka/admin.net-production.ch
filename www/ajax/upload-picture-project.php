<?php

    require_once "../lib/spdo.class.php";
    require_once "../models/project.class.php";

    $picture = $_FILES['picture'];
    $target_dir = "../global/img/uploads/projects/";
    $target_file = $target_dir . $picture['name'] . ".png";
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
            $project = Project::initWithId((int)$picture['name']);
            $project->update_picture($picture['name'] . ".png");
            echo "The file has been uploaded !";
        } else {
            echo "Error : file has not been uploaded !";
        }
    }
    




