<?php

    require_once("../lib/spdo.class.php");
    require_once("../models/project.class.php");

    if(isset($_POST['id']) && isset($_POST['bool'])) {
        Project::switch_public_private($_POST['id'], $_POST['bool']);
    }


