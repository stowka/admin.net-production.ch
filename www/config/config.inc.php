<?php
	/**
	 * Default configuration file
	 * @author Antoine De Gieter
	 * @copyright Net Production Köbe & Co
	 */

	# Constants
	define('DEFAULT_LANGUAGE', 'en_UK');
	define('DEFAULT_TITLE', 'Admin • Net Production K&ouml;be &amp; Co');

	define('DEFAULT_ADMIN_EMAIL', 'antoine.degieter@net-production.ch');
	define('DEFAULT_AUTHOR', 'Antoine De Gieter');
	define('DEFAULT_COMPANY', 'Net production K&ouml;be &amp; Co');
	define('DEFAULT_CONTACT_EMAIL', 'contact@net-production.ch');

	define('DEFAULT_404_MESSAGE', 'URL not found!');

	define('DEFAULT_LIB_PATH', '/lib');
	#define('DEFAULT_SESSION_PATH', '/tmp/to be set'); # TO BE SET
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
		'en_UK',
	);

	# Pages
	$authorized_pages = array(
		'home',
		'stats',
		'projects',
		'commitments',
		'team',
		'contact'
	);