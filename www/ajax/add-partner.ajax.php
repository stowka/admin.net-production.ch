<?php

    require_once "../lib/spdo.class.php";
    require_once "../models/partner.class.php";

    if(isset($_POST['name']) &&
    	isset($_POST['url'])) {

    	$partner = Partner::initWithNameAndUrl(
    		$_POST['name'],
    		$_POST['url']);

    	$result = $partner->store();

    	echo $result;
    }