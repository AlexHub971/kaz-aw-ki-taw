<?php

class Amenity{

    private int $_id;
    private string $_name;
    private string $_imgUrl;

    public function __construct($id, $name, $imgUrl){
        $this->_id = $id;
        $this->_name = $name;
        $this->_imgUrl = $imgUrl;
    }

    public function getId(){return $this->_id;}
    public function getName(){return $this->_name;}
    public function getImgUrl(){return $this->_imgUrl;}

}

?>