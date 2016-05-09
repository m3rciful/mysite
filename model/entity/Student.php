<?php
class Student{
    private $id;
    private $registry;
    private $group;

    private $person;
    private $address;

    public function __construct($args, $flag=null){

        if($flag!=null){
            $repo=new StudentRepository();
            switch ($flag) {
                case 'READ':{
                    $student=$repo->readStudent($args);
                    $this->_setId($student['id']);
                    $this->_setRegistry($student['registry']);
                    $this->_setGroup($student['group']);

                    $this->_setPerson($student['person']);
                    $this->_setAddress($student['address']);
                    break;
                }
                case 'INSERT':{
                    $this->_setId($repo->insertStudent($args));
                    break;
                }
                case 'UPDATE':{
                    $repo->updateStudent($args);
                    break;
                }
                case 'DELETE':{
                    $repo->deleteStudent($args);
                    break;
                }
            }
        }else{
            $this->_setId($args['id']);
            $this->_setRegistry($args['registry']);
            $this->_setGroup(new Group($args['group_id'],'READ'));

            $this->_setPerson(new Person($args['person_id'],'READ'));
            $this->_setAddress(new Address($args['address_id'],'READ'));
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
    public function getRegistry()
    {
        return $this->registry;
    }

    /**
     * Sets the value of registry.
     *
     * @param String $registry the registry
     *
     * @return self
     */
    private function _setRegistry($registry)
    {
        $this->registry = $registry;

        return $this;
    }

    /**
     * Gets the value of group_id.
     *
     * @return Group object
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Sets the value of Group object.
     *
     * @param Group $group the Group object
     *
     * @return self
     */
    private function _setGroup($group)
    {
        $this->group = $group;

        return $this;
    }

    /**
     * Gets the value of Person object.
     *
     * @return Person object
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * Sets the value of person_id.
     *
     * @param Person $person the Person object
     *
     * @return self
     */
    private function _setPerson($person)
    {
        $this->person = $person;

        return $this;
    }

    /**
     * Gets the value of Address object.
     *
     * @return Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Sets the value of Address object.
     *
     * @param Address $address the Address object
     *
     * @return self
     */
    private function _setAddress($address)
    {
        $this->address = $address;

        return $this;
    }
}