<?php
    
    require_once "../lib/spdo.class.php";
    require_once "../models/project.class.php";

    if(isset($_POST['id'])) {
        $project = Project::initWithId($_POST['id']);

        $target_dir = "../global/img/uploads/projects/";
        $name = $_POST['id'] . ".png";

        unlink($target_dir . $name);

        $project->delete();

        echo $_POST['id'];
    }

