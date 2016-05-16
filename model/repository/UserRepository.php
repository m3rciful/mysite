<?php
class UserRepository{

    public function readUser($args){

        $sql="SELECT id, username, password, email, access FROM `user` WHERE username=? AND password=?";
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

    public function updateUser($args)
    {
        //echo "<br>updateUser:<pre>"; print_r($args); echo "</pre>";
        $sql="UPDATE `user` SET `session_id`=? WHERE id=?";
        $dbh = ConnDB::getDbh();
        $stmt=$dbh->prepare($sql);
        $stmt->execute(array_values($args));
    }

    public function readUserBySession($id){

        $sql="SELECT * FROM `user` WHERE session_id=?";
        $dbh = ConnDB::getDbh();
        $stmt=$dbh->prepare($sql);
        $stmt->execute(["$id"]);
        $row = $stmt->fetch();

        return $row;
    }

    public function destroyUserSession($id){

        $sql="UPDATE `user` SET `session_id` = '' WHERE id=?";
        $dbh = ConnDB::getDbh();
        $stmt=$dbh->prepare($sql);
        $stmt->execute(["$id"]);
        $session = new Session('DESTROY');
    }

}