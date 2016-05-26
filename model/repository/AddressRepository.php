<?php
class AddressRepository{

    public function readAddress($id){
        $sql="SELECT `id`, `street`, `house`, `room`, `city_id` FROM `address` WHERE id=?";
        $dbh = ConnDB::getDbh();
        $stmt=$dbh->prepare($sql);
        $stmt->execute(["$id"]);
        $row = $stmt->fetch();

        $result['id']=$row["id"];
        $result['street']=$row["street"];
        $result['house']=$row["house"];
        $result['room']=$row["room"];
        $result['city']=new City($row["city_id"],'READ');

        return $result;
    }

    public function insertAddress($args){

        $sql="INSERT INTO `address`(`street`, `house`, `room`, `city_id`) VALUES (?,?,?,?)";
        $stmt = ConnDB::getDbh()->prepare($sql);
        $stmt->execute(array_values($args));

        return (ConnDB::getDbh()->lastInsertId());
    }

        public function updateAddress($args){
        $sql="UPDATE `address` SET `street`=?,`house`=?,`room`=?,`city_id`=? WHERE id=?";
        $dbh = ConnDB::getDbh();
        $stmt=$dbh->prepare($sql);
        $stmt->execute(["$args"]);
    }

     public function deleteAddress($id){
        $sql="DELETE FROM `address` WHERE id=?";
        $dbh = ConnDB::getDbh();
        $stmt=$dbh->prepare($sql);
        $stmt->execute(["$id"]);
    }
}