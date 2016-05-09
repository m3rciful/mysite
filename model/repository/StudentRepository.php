<?php
class StudentRepository{

    public function readStudent($id){
        $sql="SELECT `id`, `registry`, `group_id`, `person_id`, `address_id` FROM `student` WHERE id=?";
        $dbh = ConnDB::getDbh();
        $stmt=$dbh->prepare($sql);
        $stmt->execute(["$id"]);
        $row = $stmt->fetch();

        $result['id']=$row["id"];
        $result['registry']=$row["registry"];
        $result['group']= new Group($row["group_id"],'READ');
        $result['person']= new Person($row["person_id"],'READ');
        $result['address']= new Address($row["address_id"],'READ');

        return $result;
    }

    public function insertStudent($args){
        $sql="INSERT INTO `student`(`registry`, `group_id`, `person_id`, `address_id`) VALUES (?,?,?,?)";
        $stmt = ConnDB::getDbh()->prepare($sql);
        $stmt->execute(array_values($args));

        return ConnDB::getDbh()->lastInsertId();
    }

    public function updateStudent($args){
        $sql="UPDATE `student` SET `registry`=?,`group_id`=?,`person_id`=?,`address_id`=? WHERE id=?";
        $dbh = ConnDB::getDbh();
        $stmt=$dbh->prepare($sql);
        $stmt->execute(["$args"]);
    }

     public function deleteStudent($id){
        $sql="DELETE FROM `student` WHERE id=?";
        $dbh = ConnDB::getDbh();
        $stmt=$dbh->prepare($sql);
        $stmt->execute(["$id"]);
    }

    public function getStudentsByGroup($groupId)
    {
        $students=array();
        $sql="SELECT `id`, `registry`, `group_id`, `person_id`, `address_id` FROM `student` WHERE group_id=?";
        $dbh = ConnDB::getDbh();
        $stmt=$dbh->prepare($sql);
        $stmt->execute(["$groupId"]);
        while($row=$stmt->fetch()){
            $students[]=new Student($row,null);
        }
    // echo "<br>StudentRepository::groupId=".$groupId."<br><br>StudentRepository::getStudentsByGroup=<pre>";
// var_dump($students);
// echo "</pre>";
        return $students;
    }
    public function getStudentByPersonId($personId){
        $students=array();
        $sql="SELECT `id`, `registry`, `group_id`, `person_id`, `address_id` FROM `student` WHERE person_id=?";
        $dbh = ConnDB::getDbh();
        $stmt=$dbh->prepare($sql);
        $stmt->execute(["$personId"]);
        $row=$stmt->fetch();
        $student=new Student($row,null);

        return $student;
    }

    public function listExistsStudents($group_id){
        $sql="SELECT `person_id` FROM `student` WHERE `group_id` <>? ";
        $dbh = ConnDB::getDbh();
        $stmt=$dbh->prepare($sql);
        $stmt->execute([$group_id]);
        $persons=array();
        while($row = $stmt->fetch()){
            $persons[]= new Person($row['person_id'],'READ');
        }

        return $persons;
    }
    public function insertStudentToGroup($args){
        print_r($args);
        $sql="UPDATE `student` SET `group_id`=? WHERE id=?";
        $dbh = ConnDB::getDbh();
        $stmt=$dbh->prepare($sql);
        $stmt->execute($args);
    }


}