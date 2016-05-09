<?php
class BankRepository{

    public function readBank($id){
        $sql="SELECT `id`, `eban`, `bankname` FROM `bank` WHERE id=?";
        $dbh = ConnDB::getDbh();
        $stmt=$dbh->prepare($sql);
        $stmt->execute(["$id"]);
        $row = $stmt->fetch();

        $result['id']=$row["id"];
        $result['eban']=$row["eban"];
        $result['bankname']=$row["bankname"];

        return $result;
    }

    public function insertBank($args){
        $sql="INSERT INTO `bank`(`eban`, `bankname`) VALUES (?,?)";
        $stmt = ConnDB::getDbh()->prepare($sql);
        $stmt->execute(array_values($args));

        return (ConnDB::getDbh()->lastInsertId());
    }

    public function updateBank($id){
        $sql="UPDATE `bank` SET eban`=?,`bankname`=? WHERE id=?";
        $dbh = ConnDB::getDbh();
        $stmt=$dbh->prepare($sql);
        $stmt->execute(["$args"]);
    }

     public function deleteBank($id){
        $sql="DELETE FROM `bank` WHERE id=?";
        $dbh = ConnDB::getDbh();
        $stmt=$dbh->prepare($sql);
        $stmt->execute(["$id"]);
    }
}