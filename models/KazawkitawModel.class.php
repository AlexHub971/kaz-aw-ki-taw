<?php

require_once "Model.class.php";
require_once "User.class.php";
require_once "Property.class.php";
require_once "Amenities.class.php";
require_once "PropertyUserRating.class.php";
require_once "Town.class.php";

class KazawkitawModel extends Model {
    private $_properties;
    private $_property;
    private int $_loginStatus;

    const SORT_PROPERTIES_BY_NAME = 0;
    const SORT_PROPERTIES_BY_LOCATION = 1;
    const SORT_PROPERTIES_BY_SIZE = 2;
    const SORT_PROPERTIES_BY_RATING = 3;

    const LOGIN_USER_NOT_FOUND = 0;
    const LOGIN_INCORRECT_PASSWORD = 1;
    const LOGIN_OK = 2;

    const PROPERTY_USER_RATE = 0;
    const PROPERTY_USER_UPDATE_RATE = 1;
    const PROPERTY_USER_DELETE_RATE = 2;

    public function requestLogin(string $email, string $password) {
        $email = $this->_checkInput($email);
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $rows = $this->_getRows(HOST, DB_NAME, LOGIN, PASSWORD, $sql);
        if (count($rows) == 0) {
            $this->_loginStatus = self::LOGIN_USER_NOT_FOUND;
            return;
        } else {
            $value = $rows[0];
            $bool = password_verify($password, $value["password"]);
            if (!$bool) {
                $this->_loginStatus = self::LOGIN_INCORRECT_PASSWORD;
                return;
            } else {
                $user = new User($value["id"], $value["firstname"], $value["lastname"], $value["alias"], $value["phone"], $value["email"], $value["password"], $value["type"]);
                $this->_loginStatus = self::LOGIN_OK;
                return $user;
            }
        }
    }

    private function _checkInput($input) {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        if(IS_DEBUG){
            echo $input;
            echo "<br>";
        }
        return $input;
    }

    public function requestProperties($sort = self::SORT_PROPERTIES_BY_NAME) {
        $_properties = array();

        switch ($sort) {
            case self::SORT_PROPERTIES_BY_NAME:
                $sql = "SELECT * FROM `properties` ORDER BY title;";
                break;
            case self::SORT_PROPERTIES_BY_LOCATION:
                $sql = "SELECT * FROM `properties` ORDER BY town DESC;";
                break;
            case self::SORT_PROPERTIES_BY_SIZE:
                $sql = "SELECT * FROM `properties` ORDER BY size DESC;";
                break;
            case self::SORT_PROPERTIES_BY_RATING:
                $sql = "SELECT properties.*, AVG(properties_users_ratings.rate) as average_rate
                FROM properties_users_ratings
                    RIGHT JOIN properties
                    ON properties_users_ratings.property_id = properties.id
                GROUP BY properties.id
                ORDER BY average_rate DESC, properties.title;";
                break;
            default:
                $sql = "SELECT * FROM `properties` ORDER BY id;";
                break;
        }

        $rows = $this->_getRows(HOST, DB_NAME, LOGIN, PASSWORD, $sql);

        foreach ($rows as $key => $value) {
            $property = new Property($value["id"], $value["title"], $value["price"], $value["image_url-1"], $value["image_url-2"], $value["image_url-3"], $value["description"], $value["size"], $value["rooms"], $value["bed_capacity"], $value["town"], $value["type"], $value["owner_id"]);
            $this->_properties[] = $property;
        }
    }

    public function requestProperty(int $propertyId) {
        $sql = "SELECT properties.*, AVG(properties_users_ratings.rate) as average_rate
                    FROM properties_users_ratings
                    INNER JOIN properties
                    ON properties_users_ratings.property_id = properties.id
                    WHERE properties.id = $propertyId;";

        $rows = $this->_getRows(HOST, DB_NAME, LOGIN, PASSWORD, $sql);
        $value = $rows[0];
        $property = new Property($value["id"], $value["title"], $value["price"], $value["image_url-1"], $value["image_url-2"], $value["image_url-3"], $value["description"], $value["size"], $value["rooms"], $value["bed_capacity"], $value["town"], $value["type"], $value["owner_id"]);

        if($value['average_rate'] != ""){
            $property->setRate($value['average_rate']);
        }

        $sql = "SELECT properties.id, properties.title, property_amenities.amenity_id as property_amenity_id, amenities.name, amenities.img_url FROM properties
                    INNER JOIN property_amenities ON property_amenities.property_id = properties.id
                    INNER JOIN amenities ON amenities.id = property_amenities.amenity_id
                WHERE properties.id = $propertyId
                ORDER BY amenities.name ASC;";
        $rows = $this->_getRows(HOST, DB_NAME, LOGIN, PASSWORD, $sql);
        $amenities = array();
        foreach ($rows as $key => $value) {
            $amenity = new Amenity($value["property_amenity_id"], $value["name"], $value['img_url']);
            $amenities[] = $amenity;
        }
        // var_dump($amenities);
        $property->setAmenities($amenities);
        
        $sql = "SELECT users.*, properties.id AS property_id
        FROM users
        INNER JOIN properties ON properties.owner_id = users.id
        WHERE properties.id =$propertyId;";

        $rows = $this->_getRows(HOST, DB_NAME, LOGIN, PASSWORD, $sql);
        $owners = array();
        foreach ($rows as $key => $value) {
            $owner = new User($value["id"], $value["firstname"], $value["lastname"], $value["alias"], $value["phone"], $value["email"], $value["password"], $value["type"]);
            $owners[] = $owner; //$value["type"]][
        }
        // var_dump($owners);
        $property->setOwners($owners);

        /* TOWN  */
        $sql = "SELECT towns.*
        FROM towns
        INNER JOIN properties
        ON towns.id = properties.town
        WHERE properties.id = $propertyId;";
        $rows = $this->_getRows(HOST, DB_NAME, LOGIN, PASSWORD, $sql);
        $towns = array();
        foreach ($rows as $key => $value) {
            $town = new Town($value["id"], $value["name"], $value['postalcode']);
            $towns[] = $town;
        }
        // var_dump($towns);
        $property->setTowns($towns);
        
        $this->_property = $property;
    }

    public function requestPropertyUserRating(int $userId, int $propertyId): ?PropertyUserRating{
        $sql = "SELECT *  FROM `properties_users_ratings` WHERE `user_id` = $userId AND `property_id` = $propertyId;";
        $rows = $this->_getRows(HOST, DB_NAME, LOGIN, PASSWORD, $sql);
        if (count($rows) == 1) {
            $value = $rows[0];
            $propertyUserRating = new PropertyUserRating($value["id"], $value["user_id"], $value["property_id"], $value["rate"]);
            return $propertyUserRating;
        } else if(count($rows) > 1){
            echo "Plus d'un PropertyUserRating trouvé...";
            return NULL;
        } else {
            return NULL;
        }
    }

    public function setPropertyUserRating(int $userId, int $propertyId, int $rate){
        $sql = "INSERT INTO `properties_users_ratings` (`user_id`, `property_id`, `rate`) VALUES ('$userId', '$propertyId', '$rate')";
        $this->_getRows(HOST, DB_NAME, LOGIN, PASSWORD, $sql);
    }

    public function updatePropertyUserRating(int $propertyUserRatingId, int $rate){
        $sql = "UPDATE `properties_users_ratings` SET `rate` = '$rate' WHERE `properties_users_ratings`.`id` = $propertyUserRatingId";
        $this->_getRows(HOST, DB_NAME, LOGIN, PASSWORD, $sql);
    }

    public function getLoginStatus() {return $this->_loginStatus;}
    public function getProperties() {return $this->_properties;}
    public function getProperty() {return $this->_property;}

}
?>