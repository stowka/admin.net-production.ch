<?php
	/**
	 * Default home front controller
	 * @author Antoine De Gieter
	 */
	displayAuthor();
	$commitments_fr = Commitment::getAll("fr_CH");
	$commitments_en = Commitment::getAll();
	require_once "views/commitments.view.php";
