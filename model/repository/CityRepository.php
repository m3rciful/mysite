<?php
class CityRepository{

    public function readCity($id){
        $sql="SELECT `id`, `name`, `country_id` FROM `city` WHERE id=?";
        $dbh = ConnDB::getDbh();
        $stmt=$dbh->prepare($sql);
        $stmt->execute(["$id"]);
        $row = $stmt->fetch();
        $result["id"]=$row["id"];
        $result["name"]=$row["name"];
        $result["country"]=new Country($row["country_id"],'READ');

        return $result;
    }

    public function insertCity($args){
        $sql="INSERT INTO `city`(`name`, `country_id`) VALUES (?,?)";
        $stmt = ConnDB::getDbh()->prepare($sql);
        $stmt->execute(array_values($args));// выполняет запрос

        return ConnDB::getDbh()->lastInsertId();
    }

    public function updateCity($args){
        $sql="UPDATE `city` SET name`=?,`country_id`=? WHERE id=?";
        $dbh = ConnDB::getDbh();
        $stmt=$dbh->prepare($sql);
        $stmt->execute(["$args"]);
    }

     public function deleteCity($id){
        $sql="DELETE FROM `city` WHERE id=?";
        $dbh = ConnDB::getDbh();
        $stmt=$dbh->prepare($sql);
        $stmt->execute(["$id"]);
    }

     public function listAllCities(){
        $sql="SELECT `id`, `name` FROM `city` WHERE 1";
        $dbh = ConnDB::getDbh();
        $stmt=$dbh->query($sql);
        while($row = $stmt->fetch()){
            $rows[]=$row;
        }

        return $rows;
    }
}