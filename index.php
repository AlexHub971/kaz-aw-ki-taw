<?php

session_start();


require "config.php";

require_once "controllers/KazawkitawController.controller.php";

$kazawkitawController = new KazawkitawController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $params = array();
    parse_str($_SERVER["QUERY_STRING"], $params);
    switch ($params['page']) {
        case 'login':
            $kazawkitawController->showLogin();
            break;
        case 'property':
            $kazawkitawController->showProperty($params['propertyid']);
            break;
        default:
            
            break;
    }
} else {
    if(empty($_GET["page"])){
        $kazawkitawController->showProperties();
    }else{
        switch ($_GET["page"]) {
            case 'login':
                $kazawkitawController->showLogin();
                break;
            case 'logout':
                session_destroy();
                $kazawkitawController->showLogin();
                break;
            case "properties":
                $sort = isset($_GET['sort']) ? $_GET['sort'] : KazawkitawModel::SORT_PROPERTIES_BY_NAME;
                $kazawkitawController->showProperties($sort);
                break;
            case "property":
                $propertyId = intval($_GET["propertyid"]);
                $kazawkitawController->showProperty($propertyId);
                break;
            default:
                echo "Cas de page non géré...";
                break;
        }
    }
}




?>