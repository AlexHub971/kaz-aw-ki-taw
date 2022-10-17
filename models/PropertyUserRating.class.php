<?php

class PropertyUserRating {

    private int $_id;
    private int $_userId;
    private int $_propertyId;
    private int $_rate;
    
    public function __construct($id, $userId, $propertyId, $rate){
        $this->_id = $id;
        $this->_userId = $userId;
        $this->_propertyId = $propertyId;
        $this->_rate = $rate;
    }

    public function getId(){return $this->_id;}
    public function getUserId(){return $this->_userId;}
    public function getPropertyId(){return $this->_propertyId;}
    public function getRate(){return $this->_rate;}

}

?>