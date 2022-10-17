<?php
abstract class Model{
    private static $_pdo;

    protected function _getDatabase($host, $dbname, $login, $password){
        if(self::$_pdo === null){
            try{
                self::$_pdo = self::_connect($host, $dbname, $login, $password);
            }catch(Exception $error){
                echo "Erreur de connexion à la BDD.<br>";
                die("ERROR: ".$error->getMessage());
            }
        }
        return self::$_pdo;
    }

    protected function _getRows($host, $dbname, $login, $password, $sql):array{
        $request = $this->_getDatabase($host, $dbname, $login, $password)->prepare($sql);
        $request->execute();
        $rows = $request->fetchAll(PDO::FETCH_ASSOC);
        $request->closeCursor();
        return $rows;
    }

    private static function _connect($host, $dbname, $login, $password){
        $db = new PDO("mysql:host=".$host.";dbname=".$dbname, $login, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $db;
    }
}
?>