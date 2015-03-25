<?php
    
    require_once "../lib/spdo.class.php";
    require_once "../models/project.class.php";

    if(isset($_POST['id'])) {
        $project = Project::initWithId($_POST['id']);

        $target_dir = "../global/img/uploads/projects/";
        $target_dir_site = "../../../../netprod-beta/net-production.ch/www/global/img/screenshots/";
        $name = $_POST['id'] . ".png";

        if(file_exists($target_dir . $name))
            unlink($target_dir . $name);
        if(file_exists($target_dir_site . $name))
            unlink($target_dir . $site);

        $project->delete();

        echo $_POST['id'];
    }

