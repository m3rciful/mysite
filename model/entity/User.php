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
                    $user=$repo->readUser($args);
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
                    //$repo->updateUser($args);
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

    /**
     * Gets the value of id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the value of id.
     *
     * @param int $id the id
     *
     * @return self
     */
    private function _setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the value of registry.
     *
     * @return String;
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Sets the value of registry.
     *
     * @param String $registry the registry
     *
     * @return self
     */
    private function _setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Gets the value of group_id.
     *
     * @return Group object
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Sets the value of Group object.
     *
     * @param Group $group the Group object
     *
     * @return self
     */
    private function _setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }

    /**
     * Gets the value of Person object.
     *
     * @return Person object
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the value of person_id.
     *
     * @param Person $person the Person object
     *
     * @return self
     */
    private function _setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
        /**
     * Gets the value of Person object.
     *
     * @return Person object
     */
    public function getAccess()
    {
        return $this->access;
    }

    /**
     * Sets the value of person_id.
     *
     * @param Person $person the Person object
     *
     * @return self
     */
    private function _setAccess($access)
    {
        $this->access = $access;

        return $this;
    }

}