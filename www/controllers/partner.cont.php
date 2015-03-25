<?php
	/**
	 * @author Arnaud Colin
	 */
	displayAuthor();

	$partners = Partner::getAll();
	
	require_once "views/contact.view.php";