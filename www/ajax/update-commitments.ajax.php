<?php

    require_once "../lib/spdo.class.php";
    require_once "../models/commitment.class.php";

    if( isset($_POST['solutions']) &&
        isset($_POST['tools']) &&
        isset($_POST['assistance']) && 
        isset($_POST['time']) && 
        isset($_POST['language'])) {

        $lang = $_POST['language'];
        $solutions = "Solutions";
        $tools = $lang == "fr_CH" ? "Outils" : "Tools";
        $assistance = "Assistance";
        $time = $lang == "fr_CH" ? "Délais" : "Time";

        $com1 = Commitment::initWithTitleAndLanguage($solutions, $lang);
        $com2 = Commitment::initWithTitleAndLanguage($tools, $lang);
        $com3 = Commitment::initWithTitleAndLanguage($assistance, $lang);
        $com4 = Commitment::initWithTitleAndLanguage($time, $lang);        

        $com1->updateDescription($_POST['solutions']);
        $com2->updateDescription($_POST['tools']);
        $com3->updateDescription($_POST['assistance']);
        $com4->updateDescription($_POST['time']);
    }
