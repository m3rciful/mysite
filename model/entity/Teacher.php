<?php
class Teacher{
    private $id;
    private $person;

    public function __construct($args,$flag){
        $repo=new TeacherRepository();
        switch ($flag) {
            case 'READ':{
                $teacher=$repo->readTeacher($args);
                $this->_setId($teacher["id"]);
                $this->_setPerson($teacher["person"]);
                break;
            }
            case 'INSERT':{
                $this->_setId($repo->insertTeacher($args));
                break;
            }
            case 'UPDATE':{
                $repo->updateTeacher($args);
                break;
            }
            case 'DELETE':{
                $repo->updateTeacher($args);
                break;
            }
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
     * Gets the value of person.
     *
     * @return Person
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * Sets the value of person.
     *
     * @param Person $person the person
     *
     * @return self
     */
    private function _setPerson($person)
    {
        $this->person = $person;

        return $this;
    }
}