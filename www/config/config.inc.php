<?php
	/**
	 * Default configuration file
	 * @author Antoine De Gieter
	 */

	# Constants
	define('DEFAULT_LANGUAGE', 'to be set'); # TO BE SET
	define('DEFAULT_TITLE', 'to be set'); # TO BE SET

	define('DEFAULT_ADMIN_EMAIL', 'antoine.degieter@net-production.ch');
	define('DEFAULT_AUTHOR', 'Antoine De Gieter');
	define('DEFAULT_COMPANY', 'Net production K&ouml;be &amp; Co');
	define('DEFAULT_CONTACT_EMAIL', 'to be set'); # TO BE SET

	define('DEFAULT_404_MESSAGE', 'URL not found!');
	
	/* Uncomment to use the database *
	define('DEFAULT_MYSQL_HOST', 'to be set');
	define('DEFAULT_MYSQL_USER', 'to be set');
	define('DEFAULT_MYSQL_PASSWORD', 'to be set');
	define('DEFAULT_MYSQL_DATABASE', 'to be set');/**/

	define('DEFAULT_LIB_PATH', '/lib');
	define('DEFAULT_SESSION_PATH', '/tmp/to be set'); # TO BE SET
	define('DEFAULT_LANG_PATH', '../lang/');
	define('DEFAULT_MODEL_PATH', 'models/');
	define('DEFAULT_CONTROLLER_PATH', 'controllers/');
	define('DEFAULT_VIEW_PATH', 'views/');
	define('DEFAULT_SECTION_PATH', DEFAULT_VIEW_PATH . 'sections/');
	define('DEFAULT_ASSET_PATH', 'global/');
	define('DEFAULT_CSS_PATH', DEFAULT_ASSET_PATH . 'css/');
	define('DEFAULT_JS_PATH', DEFAULT_ASSET_PATH . 'js/');
	define('DEFAULT_FONT_PATH', DEFAULT_ASSET_PATH . 'fonts/');
	define('DEFAULT_IMG_PATH', DEFAULT_ASSET_PATH . 'img/');

	define('DEFAULT_MODEL_EXTENSION', '.class.php');
	define('DEFAULT_INC_EXTENSION', '.inc.php');
	define('DEFAULT_CONTROLLER_EXTENSION', '.cont.php');
	define('DEFAULT_VIEW_EXTENSION', '.view.php');
	define('DEFAULT_SECTION_EXTENSION', '.sec.php');

	# Languages
	$authorized_languages = array(
		'en',
		'fr',
		/* add more languages here */
	);

	# Pages
	$authorized_pages = array(
		'home',
		/* add more pages here */
	);