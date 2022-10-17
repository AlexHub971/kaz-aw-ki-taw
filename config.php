<?php
// the $getDebug variable is needed to test features and deactivate certain controls
// just makes dev faster
$getDebug = isset($_GET["debug"]) && $_GET["debug"] == "true" ? true : false;

// DEBUG constant is set to true is debug=true is passed into the URL or if the host is local
define("IS_DEBUG", $_SERVER["HTTP_HOST"] == "localhost" || $getDebug ? false : false);


/** DATABASE CONSTANTS **/
define("HOST", "localhost");
define("LOGIN", "root");
define("DB_NAME", "kazawkitaw");
define("PASSWORD", "");

/** SITE PATHS CONSTANTS **/
define("IMAGE_PROPERTY_PATH", "image/logements/");
define("IMAGE_BG_PATH", "image/bg/");
define("IMAGE_CAROUSEL_PATH", "image/carousel/");

/** FILE EXTENSIONS CONSTANTS **/
define("IMAGE_EXTENSION", ".jpg");


?>