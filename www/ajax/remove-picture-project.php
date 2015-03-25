<?php
    
    require_once "../lib/spdo.class.php";
    require_once "../models/project.class.php";

    if(isset($_POST['id'])) {

        $project = Project::initWithId($_POST['id']);
        $project->update_picture("");

        $target_dir = "../global/img/uploads/projects/";
        $name = $_POST['id'] . ".png";

        unlink($target_dir . $name);

        echo "picture deleted";
    }
