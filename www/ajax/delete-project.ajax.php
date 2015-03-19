<?php
    
    require_once "../lib/spdo.class.php";
    require_once "../models/project.class.php";

    if(isset($_POST['id'])) {
        $project = Project::initWithId($_POST['id']);
        $project->delete();
        echo $_POST['id'];
    }

