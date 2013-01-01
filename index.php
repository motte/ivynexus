<?php

/**
 Route all requests through index.php so we can get a better more orderly URL
 */

session_start();

/**
 Defines framework path just in case being accessed from another file elsewhere
 */
DEFINE("FRAMEWORK_PATH", dirname( __FILE__ ) . "/");

/**
 This prevents error returns
*/
//ini_set( "display_errors", 0);

/**
 Build/instantiate registry and tell which objects to create
 */
require('registry/registry.class.php');
$registry = new Registry();
// setup our core registry objects
$registry->createAndStoreObject('template', 'template');
$registry->createAndStoreObject('mysqldb', 'db');
$registry->createAndStoreObject('authenticate', 'authenticate');
$registry->createAndStoreObject('urlprocessor', 'url');
$registry->getObject('url')->getURLData();

// database settings
include(FRAMEWORK_PATH . 'config.php');
// create a database connection (connect to database)
$registry->getObject('db')->newConnection($configs['db_host'], $configs['db_user'], $configs['db_pass'], $configs['db_name']);
$controller = $registry->getObject('url')->getURLBit(0);
// 
$registercontroller = $registry->getObject('url')->getURLBit(1);

if($controller != 'api') {
	$registry->getObject('authenticate')->checkforAuthentication();
}

// store settings in our registry
$settingsSQL = "SELECT `key`, `value` FROM settings";
$registry->getObject('db')->executeQuery($settingsSQL);
while($setting = $registry->getObject('db')->getRows()) {
	$registry->storeSetting($setting['value'], $setting['key']);
}
// copyright year
date_default_timezone_set('America/New_York');
$registry->getObject('template')->getPage()->addTag('current_year', date('Y'));
$registry->getObject('template')->getPage()->addTag('siteurl', $registry->getSetting('siteurl'));
// default template
$registry->getObject('template')->buildFromTemplates('header.tpl.php', 'main.tpl.php', 'footer.tpl.php');

$controllers = array();
$controllersSQL = "SELECT * FROM controllers WHERE active=1";
$registry->getObject('db')->executeQuery($controllersSQL);
while($cttrlr = $registry->getObject('db')->getRows()) {
	$controllers[] = $cttrlr['controller'];
}

/**
 If logged in then do thisÉif not, do that
 */
if($registry->getObject('authenticate')->isLoggedIn() && $controller !== 'api') {
	$registry->getObject('template')->addTemplateBit('userbar', 'userbar_loggedin.tpl.php');
	$registry->getObject('template')->getPage()->addTag('firstname', $registry->getObject('authenticate')->getUser()->getFirstName());
	$registry->getObject('template')->getPage()->addTag('lastname', $registry->getObject('authenticate')->getUser()->getLastName());
	
	$registry->getObject('template')->getPage()->addTag('birth_month', $registry->getObject('authenticate')->getUser()->getBirthMonth());
	$registry->getObject('template')->getPage()->addTag('birth_day', $registry->getObject('authenticate')->getUser()->getBirthDay());
	$registry->getObject('template')->getPage()->addTag('birth_year', $registry->getObject('authenticate')->getUser()->getBirthYear());
	$registry->getObject('template')->getPage()->addTag('pID', $registry->getObject('authenticate')->getUser()->getUserID());
	$registry->getObject('template')->getPage()->addTag('pSchool', $registry->getObject('authenticate')->getProfile()->getSchool());
        $registry->getObject('template')->getPage()->addTag('pPhoto', $registry->getObject('authenticate')->getProfile()->getPhoto());
	
	date_default_timezone_set('America/New_York');
	$registry->getObject('template')->getPage()->addTag('dat', date('d'));
	$registry->getObject('template')->getPage()->addTag('current_year', date('Y'));
	/*if(isset($_POST['chili'])) {
		$receiverid = $_POST['receiver'];
		require_once(FRAMEWORK_PATH . 'controllers/chili/controller.php');
		$chiliController = new Chilicontroller($registry, true);
		$chiliController->addChili($registry->getObject('authenticate')->getUser()->getUserID(), $receiverid);
		
	}*/
}

elseif($registercontroller == 'register' && $registercontroller != '') {
	$registry->getObject('template')->addTemplateBit('userbar', 'userbar.tpl.php');
	//$registry->getObject('template')->addTemplateBit('mainlogin', 'mainlogin.tpl.php');
	$registry->getObject('template')->buildFromTemplates('header.tpl.php', 'authenticate/register/main.tpl.php', 'loginfooter.tpl.php');
	$registercontroller = '';
}

elseif($controller !== 'api' && $registercontroller !== 'register') {
	$registry->getObject('template')->addTemplateBit('userbar', 'userbar.tpl.php');
	//$registry->getObject('template')->addTemplateBit('mainlogin', 'mainlogin.tpl.php');
	$registry->getObject('template')->buildFromTemplates('header.tpl.php', 'authenticate/login/main.tpl.php', 'loginfooter.tpl.php');
	$registry->getObject('template')->parseOutput();
	print $registry->getObject('template')->getPage()->getContentToPrint();
	return;
}

if(in_array($controller, $controllers)) {
	require_once(FRAMEWORK_PATH . 'controllers/' . $controller . '/controller.php');
	$controllerInc = $controller.'controller';
	$controller = new $controllerInc($registry, true);

}
else {
	// default controller or pass control to CMS type system?
}

$registry->getObject('template')->parseOutput();
print $registry->getObject('template')->getPage()->getContentToPrint();

?>