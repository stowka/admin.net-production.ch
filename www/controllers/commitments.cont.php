<?php
	/**
	 * Default home front controller
	 * @author Antoine De Gieter
	 */
	displayAuthor();

	$commitments = Array();
	$commitments['fr_CH'] = Commitment::getAll("fr_CH");
	$commitments['en_UK'] = Commitment::getAll("en_UK");
	require_once "views/commitments.view.php";
