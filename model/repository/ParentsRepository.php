<?php
/**
*
*/
class ParentsRepository{

    public function readParents($peson_id){
        $sql="SELECT `id`, `person_id`, `status`, `address_id` FROM `parent` WHERE person_id=?";
        $dbh = ConnDB::getDbh();
        $stmt=$dbh->prepare($sql);
        $stmt->execute(["$id"]);
        while($row = $stmt->fetch()){
            $result=array(  'id'=>      $row['id'],
                            'person'=>  new Person($row['person_id'],'READ'),
                            'status'=>  $row['status'],
                            'address'=> new Address($row['address_id'],'READ')
                        );
        }
        return $result;
    }

    public function insertParents($args){
        $sql="INSERT INTO `parent`(`person_id`, `status`, `address_id`) VALUES (?,?,?)";
        $stmt = ConnDB::getDbh()->prepare($sql);
        $stmt->execute(array_values($args));

        return ConnDB::getDbh()->lastInsertId();
    }

    public function updateParents($args){
        $sql="UPDATE `parent` SET person_id`=?,`status`=?,`address_id`=? WHERE id=?";
        $dbh = ConnDB::getDbh();
        $stmt=$dbh->prepare($sql);
        $stmt->execute(["$args"]);
    }

     public function deleteParents($person_id){
        $sql="DELETE FROM `parent` WHERE person_id=?";
        $dbh = ConnDB::getDbh();
        $stmt=$dbh->prepare($sql);
        $stmt->execute(["$id"]);
    }

}