<?php
class User{

    private int $_id;
    private string $_firstname;
    private string $_lastname;
    private string $_alias;
    private string $_phone;
    private string $_email;
    private string $_password;
    private bool $_type;

    public function __construct($id, $firstname, $lastname, $alias, $phone, $email, $password, $type) {
        $this->_id = $id;
        $this->_firstname = $firstname;
        $this->_lastname = $lastname;
        $this->_alias = $alias;
        $this->_phone = $phone;
        $this->_email = $email;
        $this->_password = $password;
        // if the user is not a host (==1) : false ; else true
        $this->_type = $type == 1 ? false : true;
    }

    public function getId(){return $this->_id;}
    public function getFirstname(){return ucwords($this->_firstname);}
    public function getLastname(){return strtoupper($this->_lastname);}
    public function getAlias(){return $this->_alias;}
    public function getPhone(){return $this->_phone;}
    public function getEmail(){return $this->_email;}
    public function getPassword(){return $this->_password;}
    public function getType(){return $this->_type;}

}
?>