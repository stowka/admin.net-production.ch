<?php
    
    require_once "../lib/spdo.class.php";
    require_once "../models/partner.class.php";

    if(isset($_POST['id'])) {
        $partner = Partner::initWithId($_POST['id']);
        $partner->delete();
        echo $_POST['id'];
    }
