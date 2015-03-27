<?php
    
    require_once "../lib/spdo.class.php";
    require_once "../models/project.class.php";
    require_once "../config/config.inc.php";

    if(isset($_POST['id'])) {

        $project = Project::initWithId($_POST['id']);
        $project->update_picture("");
        $name = $_POST['id'] . ".png";

        if(file_exists(UPLOAD_PATH_ADMIN . $name))
            unlink(UPLOAD_PATH_ADMIN . $name);
        if(file_exists(UPLOAD_PATH_SITE . $name))
            unlink(UPLOAD_PATH_SIZE . $name);

        echo json_encode(array(
            "id" => $_POST['id']));
    }
