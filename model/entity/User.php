<?php
class User{
    private $id;
    private $user;
    private $pass;

    private $email;
    private $access;

    public function __construct($args, $flag=null){

        if($flag!=null){
            $repo=new UserRepository();
            switch ($flag) {
                case 'READ':{
                    if(count($args) < 2) {
                        $user=$repo->readUserBySession($args);
                    }
                    else {
                        $user=$repo->readUser($args);
                    }

                    $this->_setId($user['id']);
                    $this->_setUser($user['username']);
                    $this->_setPass($user['password']);
                    $this->_setEmail($user['email']);
                    $this->_setAccess($user['access']);
                    break;
                }
                case 'INSERT':{
                    $this->_setId($repo->insertUser($args));
                    break;
                }
                case 'UPDATE':{
                    $repo->updateUser($args);
                    //break;
                }
                case 'DELETE':{
                    //$repo->deleteUser($args);
                    //break;
                }
            }
        }else{
            $this->_setId();
            $this->_setUser();
            $this->_setPass();
            $this->_setEmail();
            $this->_setAccess();
        }

    }

    public function getId()
    {
        return $this->id;
    }

    private function _setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getUser()
    {
        return $this->user;
    }

    private function _setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    public function getPass()
    {
        return $this->pass;
    }

    private function _setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    private function _setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getAccess()
    {
        return $this->access;
    }

    private function _setAccess($access)
    {
        $this->access = $access;

        return $this;
    }

}