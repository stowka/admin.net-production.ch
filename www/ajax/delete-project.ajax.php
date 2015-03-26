<?php
    
    require_once "../lib/spdo.class.php";
    require_once "../models/project.class.php";
    require_once "../config/config.inc.php";

    if(isset($_POST['id'])) {
     
        $project = Project::initWithId($_POST['id']);
        $name = $_POST['id'] . ".png";

        if(file_exists(UPLOAD_PATH_ADMIN . $name))
            unlink(UPLOAD_PATH_ADMIN . $name);
        if(file_exists(UPLOAD_PATH_SITE . $name))
            unlink(UPLOAD_PATH_SITE . $name);

        $project->delete();

        echo $_POST['id'];
    }

