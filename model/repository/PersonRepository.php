<?php
/**
*
*/
class PersonRepository{

    public function readPerson($id){
        $sql="SELECT `id`, `name`, `surname`, `code`, `eban`,`bankname` FROM `person` WHERE id=?";
        $dbh = ConnDB::getDbh();
        $stmt=$dbh->prepare($sql);
        $stmt->execute(["$id"]);
        $row = $stmt->fetch();

        return $row;
    }

    public function insertPerson($args){
        $sql="INSERT INTO `person`(`name`, `surname`, `code`, `eban`, `bankname`) VALUES (?,?,?,?,?)";
        $stmt = ConnDB::getDbh()->prepare($sql);
        $stmt->execute(array_values($args));
        return ConnDB::getDbh()->lastInsertId();
    }

    public function updatePerson($args){
        $sql="UPDATE `person` SET `name`=?,`surname`=?,`code`=?,`eban`=?,`bankname`=? WHERE  id=?";
        $dbh = ConnDB::getDbh();
        $stmt=$dbh->prepare($sql);
        $stmt->execute(["$args"]);
    }

     public function deletePerson($id){
        $sql="DELETE FROM `person` WHERE id=?";
        $dbh = ConnDB::getDbh();
        $stmt=$dbh->prepare($sql);
        $stmt->execute(["$id"]);
    }

public function addAddressToPerson($person_id,$address_id){
        $sql="INSERT INTO `person_address`( `person_id`, `address_id`) VALUES (?,?)";
        $stmt = ConnDB::getDbh()->prepare($sql);
        $stmt->execute(array($person_id,$address_id));
    }
}