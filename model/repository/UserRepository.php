<?php
class UserRepository{

    public function readUser($args){
        $sql="SELECT * FROM `user` WHERE username=? AND password=?";
        $stmt = ConnDB::getDbh()->prepare($sql);
        $stmt->execute(array_values($args));
        $row = $stmt->fetch();
        return $row;
    }

}