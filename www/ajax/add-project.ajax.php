<?php

    require_once "../lib/spdo.class.php";
    require_once "../models/project.class.php";

    if(isset($_POST['title']) && 
       isset($_POST['description']) &&
       isset($_POST['is_public']) &&
       isset($_POST['url']) &&
       isset($_POST['type']) &&
       isset($_POST['language'])) {
    
       $project = Project::initWithData(
        $_POST['title'],   
        $_POST['description'],   
        $_POST['is_public'],
        $_POST['url'],  
        $_POST['type'],   
        $_POST['language']);  

        $result = $project->store();

        echo $result;
    }
