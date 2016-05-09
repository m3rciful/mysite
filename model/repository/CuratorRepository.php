<?php
class CuratorRepository{

    public function readCurator($id){
        $sql="SELECT `id`, `group_id`, `teacher_id` FROM `curator` WHERE id=?";
        $dbh = ConnDB::getDbh();
        $stmt=$dbh->prepare($sql);
        $stmt->execute(["$id"]);
        $row = $stmt->fetch();
        $result['group']=new Group($row['group_id'],'READ');
        $result['teacher']=new Teacher($row['teacher_id'],'READ');
        return $result;
    }

    public function insertCurator($args){
        $sql="INSERT INTO `curator`(`teacher_id`, `group_id`) VALUES (?,?)";
        $stmt = ConnDB::getDbh()->prepare($sql);
        $stmt->execute(array_values($args));

        return ConnDB::getDbh()->lastInsertId();
    }

    public function updateCurator($args){
        $sql="UPDATE `curator` SET teacher_id`=?,`group_id`=? WHERE id=?";
        $dbh = ConnDB::getDbh();
        $stmt=$dbh->prepare($sql);
        $stmt->execute(["$args"]);
    }

     public function deleteCurator($id){
        $sql="DELETE FROM `curator` WHERE id=?";
        $dbh = ConnDB::getDbh();
        $stmt=$dbh->prepare($sql);
        $stmt->execute(["$id"]);
    }


}