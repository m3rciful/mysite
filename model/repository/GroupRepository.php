<?php
class GroupRepository{

    public function readGroup($id){
        $sql="SELECT `id`, `abbreviation`, `groupname`, `begin_year`, `end_year`, `begin_month`, `end_month` FROM `group` WHERE id=?";
        $dbh = ConnDB::getDbh();
        $stmt=$dbh->prepare($sql);
        $stmt->execute(["$id"]);
        $row = $stmt->fetch();

        return $row;
    }

    public function insertGroup($args){
        $sql="INSERT INTO `group`(`abbreviation`, `groupname`, `begin_year`, `end_year`, `begin_month`, `end_month`) VALUES (?,?,?,?,?,?)";
        $stmt = ConnDB::getDbh()->prepare($sql);
        $stmt->execute(array_values($args));

        return ConnDB::getDbh()->lastInsertId();
    }

    public function updateGroup($args){
        $sql="UPDATE `group` SET abbreviation`=?,`groupname`=?,`begin_year`=?,`end_year`=?,`begin_month`=?,`end_month`=? WHERE id=?";
        $dbh = ConnDB::getDbh();
        $stmt=$dbh->prepare($sql);
        $stmt->execute(["$args"]);
    }

     public function deleteGroup($id){
        $sql="DELETE FROM `group` WHERE id=?";
        $dbh = ConnDB::getDbh();
        $stmt=$dbh->prepare($sql);
        $stmt->execute(["$id"]);
    }
    public function listAllGroups(){
        $year=date("Y");
        $list=array();
        $sql="SELECT `id` FROM `group` WHERE begin_year <= '$year' AND end_year >= '$year'";
        $stmt=ConnDB::getDbh()->query($sql);
        while ($row=$stmt->fetch()) {
            $id=$row['id'];
            $groupList[]=new Group($id,"READ");
        }
        return $groupList;
    }
}