<?php

    require_once "../lib/spdo.class.php";
    require_once "../models/team.class.php";


	if(isset($_POST['name']) && 
       isset($_POST['biography']) &&
       isset($_POST['position']) &&
       isset($_POST['language'])) {

       	$team = Team::initWithData(
        $_POST['name'],
        $_POST['biography'],
        $_POST['position'],
        $_POST['language']);

      $result = $team->store();

        echo $result;
    }