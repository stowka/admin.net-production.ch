<?php
/**
    * Default home front controller
    * @author Antoine De Gieter
    */

    displayAuthor();


    $team = Array();

    $team['fr_CH'] = Team::getAll('fr_CH');
	$team['en_UK'] = Team::getAll('en_UK');

	require_once "views/team.view.php";
