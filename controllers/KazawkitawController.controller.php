<?php

require_once "models/KazawkitawModel.class.php";

class KazawkitawController{

    private $_kazawkitawModel;

    public function __construct() {
        $this->_kazawkitawModel = new KazawkitawModel;
    }

    public function showLogin() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user = $this->_kazawkitawModel->requestLogin($_POST["email"], $_POST["password"]);
            $loginStatus = $this->_kazawkitawModel->getLoginStatus();
            switch ($loginStatus) {
                case KazawkitawModel::LOGIN_USER_NOT_FOUND:
                case KazawkitawModel::LOGIN_INCORRECT_PASSWORD:
                    require "views/login.view.php";
                    break;
                case KazawkitawModel::LOGIN_OK:
                    $_SESSION['user'] = serialize($user);
                    // var_dump($_SESSION['user']);
                    $this->showProperties();
                    break;
                default:
                    "Cas non géré...";
                    break;
            }
        } else {
            require "views/login.view.php";
        }
        
    }

    public function showProperties(int $sort = KazawkitawModel::SORT_PROPERTIES_BY_NAME){
        $km = $this->_kazawkitawModel;
        $km->requestProperties($sort);
        $properties = $km->getProperties();
        require "views/properties.view.php";
    }

    public function showProperty(int $propertyId){
        $this->_kazawkitawModel->requestProperty($propertyId);
        $property = $this->_kazawkitawModel->getProperty();

        if(isset($_SESSION['user'])){
            $user = unserialize($_SESSION['user']);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            switch ($_POST['action']) {
                case KazawkitawModel::PROPERTY_USER_RATE:
                    $this->_kazawkitawModel->setPropertyUserRating($_POST['userId'], $_POST['propertyId'], $_POST['rate']);
                    break;
                case KazawkitawModel::SORT_PROPERTIES_BY_RATING:
                    $this->_kazawkitawModel->updatePropertyUserRating($_POST['propertyUserRatingId'], $_POST['rate']);
                    break;
                default:
                    echo "cas de rating non géré...";
                    break;
            }
            $propertyUserRating = $this->_kazawkitawModel->requestPropertyUserRating($user->getId(), $property->getId());
        } else {
            if(isset($user)){
                $propertyUserRating = $this->_kazawkitawModel->requestPropertyUserRating($user->getId(), $property->getId());
            }
        }
        

        require "views/property.view.php";
    }

}
?>