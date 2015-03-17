<?php
	/**
	 * Default home front controller
	 * @author Antoine De Gieter
	 */
	displayAuthor();
	$commitments = Commitment::getAll();
	require_once "views/commitments.view.php";
