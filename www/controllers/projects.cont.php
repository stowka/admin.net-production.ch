<?php
	/**
	 * Default home front controller
	 * @author Antoine De Gieter
	 */
	displayAuthor();

    $types = Type::getAll();
    $typesFr = Type::getAllByLanguage("fr_CH");
    $typesEn = Type::getAllByLanguage("en_UK");

    $projectsFr = [];
    $projectsEn = [];

    foreach($typesFr as $type) {
        $tmp = Project::getAllByTypeAndLanguage($type->getId(), "fr_CH");
        $projectsFr[$type->getId()] = $tmp;
    }

    foreach($typesEn as $type) {
        $tmp = Project::getAllByTypeAndLanguage($type->getId(), "en_UK");
        $projectsEn[$type->getId()] = $tmp;
    }

    $languages = Language::getAll();

	require_once "views/projects.view.php";
