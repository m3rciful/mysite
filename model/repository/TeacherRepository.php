<?php
/**
*
*/
class TeacherRepository {

    public function readTeacher($id){
        $sql="SELECT `id`, `person_id` FROM `teacher` WHERE id=?";
        $dbh = ConnDB::getDbh();
        $stmt=$dbh->prepare($sql);
        $stmt->execute(["$id"]);
        $row = $stmt->fetch();
        $result['person']=new Person($row['person_id'],'READ');

        return $result;
    }

    public function insertTeacher($args){
        $sql="INSERT INTO `teacher`(`person_id`) VALUES (?)";
        $stmt = ConnDB::getDbh()->prepare($sql);
        $stmt->execute(array_values($args));

        return ConnDB::getDbh()->lastInsertId();
    }

    public function updateTeacher($args){
        $sql="UPDATE `teacher` SET `person_id`=? WHERE id=?";
        $dbh = ConnDB::getDbh();
        $stmt=$dbh->prepare($sql);
        $stmt->execute(["$args"]);
    }

     public function deleteTeacher($id){
        $sql="DELETE FROM `teacher` WHERE id=?";
        $dbh = ConnDB::getDbh();
        $stmt=$dbh->prepare($sql);
        $stmt->execute(["$id"]);
    }

}