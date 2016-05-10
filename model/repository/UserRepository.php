<?php
class UserRepository{

    public function readUser($args){
        $sql="SELECT * FROM `user` WHERE username=? AND password=?";
        $stmt = ConnDB::getDbh()->prepare($sql);
        $stmt->execute(array_values($args));
        $row = $stmt->fetch();
        return $row;
    }

    public function listExistsUsers(){
        $sql="SELECT * FROM `user`";
        $dbh = ConnDB::getDbh();
        $stmt=$dbh->query($sql);
        $rows = $stmt->fetchAll();

        return $rows;
    }

    public function insertUser($args){
        $sql="INSERT INTO `user`(`username`, `password`, `email`, `access`) VALUES (?,?,?,?)";
        $stmt = ConnDB::getDbh()->prepare($sql);
        $stmt->execute(array_values($args));

        return ConnDB::getDbh()->lastInsertId();
    }

}