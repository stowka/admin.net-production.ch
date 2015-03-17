<?php
	/**
	 * Default home front controller
	 * @author Antoine De Gieter
	 */
	displayAuthor();

    $types = Type::getAll();

    $projects = [];

    foreach($types as $item) {
        $tmp = Project::getAllByTypeAndLanguage($item->getId(), "fr_CH");
        $projects[$item->getId()] = $tmp;
    }

	require_once "views/projects.view.php";
