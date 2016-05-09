<?php
class Curator{
    private $id;
    private $group;
    private $teacher;
    public function __construct($args,$flag){
        $repo=new CuratorRepository();
        switch ($flag) {
            case 'READ':{
                $curator=$repo->readCurator($args);
                $this->_setId($curator["id"]);
                $this->_setGroup($curator["group"]);
                $this->_setTeacher($curator["teacher"]);
                break;
            }
            case 'INSERT':{
                $this->_setId($repo->insertCurator($args));
                break;
            }
            case 'UPDATE':{
                $repo->updateCurator($args);
                break;
            }
            case 'DELETE':{
                $repo->deleteCurator($args);
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
     * Gets the value of group.
     *
     * @return Group
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Sets the value of group.
     *
     * @param Group $group the group
     *
     * @return self
     */
    private function _setGroup($group)
    {
        $this->group = $group;

        return $this;
    }

    /**
     * Gets the value of teacher.
     *
     * @return Teacher
     */
    public function getTeacher()
    {
        return $this->teacher;
    }

    /**
     * Sets the value of teacher.
     *
     * @param Teacher $teacher the teacher
     *
     * @return self
     */
    private function _setTeacher($teacher)
    {
        $this->teacher = $teacher;

        return $this;
    }


}