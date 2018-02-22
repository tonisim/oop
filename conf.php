<?php
/**
 * Created by PhpStorm.
 * User: Tõnis
 * Date: 19.01.2018
 * Time: 9:44
 */
// kaustade ja failide konstantsed nimetused
// kaustade ja failide konstantsed nimetused
define('MODEL_DIR', 'model/');
define('VIEW_DIR', 'views/');
define('CONTROL_DIR', 'controllers/');
define('LIB_DIR', 'lib/');

define('DEFAULT_CONTROL', 'default');
// nõuame abifunktisoonide faili kasutamist
require_once LIB_DIR.'utils.php';

//M22rame erinevad rollid
define('ROLE_NONE',0);
define('ROLE_USER',1);
define('ROLE_ADMIN',2);
// nõuame vajalike failide kasutamist
require_once MODEL_DIR.'template.php';
require_once MODEL_DIR.'http.php';
require_once MODEL_DIR.'linkobject.php';
require_once MODEL_DIR.'mysql.php';
require_once MODEL_DIR.'session.php';

//Nouan vajalikud abikonfiguratsiooni failid
require_once 'db_conf.php';
// loome objektid, mis oleks vaja pidevalt kasutada
$http = new linkobject(); //Lingi objekt
//andmebaasi object
$db = new mysql(DB_HOST,DB_USER, DB_PASS,DB_DBNAME);
//loome sessioni objekti
$sess = new session($http, $db);
echo '<pre>';
print_r($sess);
echo '</pre>';
