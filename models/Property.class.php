<?php

class Property {

    private int $_id;
    private string $_title;
    private string $_price;
    private string $_imageURL1;
    private string $_imageURL2;
    private string $_imageURL3;
    private string $_description;
    private int $_size;
    private int $_rooms;
    private int $_bedCapacity;
    private int $_town;
    private int $_type;
    private int $_ownerId;

    private int $_rate = -1;
    private array $_amenities = array();
    private array $_owners = array();
    private array $_towns = array();

    public function __construct($id, $title, $price, $imageURL1, $imageURL2, $imageURL3, $description, $size, $rooms, $bedCapacity, $town, $type, $ownerId){
        $this->_id = $id;
        $this->_title = $title;
        $this->_price = $price;
        $this->_imageURL1 = $imageURL1;
        $this->_imageURL2 = $imageURL2;
        $this->_imageURL3 = $imageURL3;
        $this->_description = $description;
        $this->_size = $size;
        $this->_rooms = $rooms;
        $this->_bedCapacity = $bedCapacity;
        $this->_town = $town;
        $this->_type = $type;
        $this->_ownerId = $ownerId;


    }

    public function getId(){return $this->_id;}
    public function getTitle(){return $this->_title;}
    public function getPrice(){return $this->_price;}
    public function getImageUrl_1(){return $this->_imageURL1;}
    public function getImageUrl_2(){return $this->_imageURL2;}
    public function getImageUrl_3(){return $this->_imageURL3;}
    public function getDescription(){return $this->_description;}
    public function getSize(){return $this->_size;}
    public function getRooms(){return $this->_rooms;}
    public function getBedCapacity(){return $this->_bedCapacity;}
    public function getTown(){return $this->_town;}
    public function getType(){return $this->_type;}
    public function getOwnerId(){return $this->_ownerId;}

    public function getRate(){return $this->_rate;}
    public function setRate(int $rate){$this->_rate = $rate;}

    public function setTowns($towns) {
        $this->_towns = $towns;
    }

    public function getTowns():array {
        return $this->_towns;
    }

    public function setAmenities(array $amenities){
        $this->_amenities = $amenities;
    }

    public function getAmenities():array{return $this->_amenities;}

    public function setOwners(array $owners){
        $this->_owners = $owners;
    }

    public function getOwners():array{return $this->_owners;}
    
}

?>