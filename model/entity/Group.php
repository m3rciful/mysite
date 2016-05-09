<?php
class Group{
    private $id;
    private $abbreviation;
    private $groupName;
    private $beginYear;
    private $endYear;
    private $beginMonth;
    private $endMonth;
    private $course; // текущий курс группы

    /**
     *  Считывает состояние из таблицы group или записывает, изменяет или удаляет строку таблицы.
     *
     * @param array $args  содержит id строки в таблице, которыую необходимо затронуть, или значения полей таблицы в следующем порядке: abbreviation, groupname, begin_year, end_year, begin_month, end_month, id.
     * @param string $flag  содержит строку-флаг, который определяет действие (READ,INSERT,UPDATE,DELETE)
     */
    public function __construct($args,$flag=null)
    {
        if($flag!=null){
            $repo=new GroupRepository();
            switch ($flag) {
                case 'READ':{
                    $group=$repo->readGroup($args);
                    $this->_setId($group["id"]);
                    $this->_setAbbreviation($group["abbreviation"]);
                    $this->_setGroupName($group["groupname"]);
                    $this->_setBeginYear($group["begin_year"]);
                    $this->_setEndYear($group["end_year"]);
                    $this->_setBeginMonth($group["begin_month"]);
                    $this->_setEndMonth($group["end_month"]);
                    $this->_setCourse();
                    break;
                }
                case 'INSERT':{
                    $this->_setId($repo->insertGroup($args));
                    break;
                }
                case 'UPDATE':{
                    $repo->updateGroup($args);
                    break;
                }
                case 'DELETE':{
                    $repo->updateGroup($args);
                    break;
                }
            }
        }else{
            $group=$args;
                $this->_setId($group["id"]);
                $this->_setAbbreviation($group["abbreviation"]);
                $this->_setGroupName($group["groupname"]);
                $this->_setBeginYear($group["begin_year"]);
                $this->_setEndYear($group["end_year"]);
                $this->_setBeginMonth($group["begin_month"]);
                $this->_setEndMonth($group["end_month"]);
                $this->_setCourse();
        }

    }
        // еще необходимо реализовать метод обновляющий указанную строку в таблице и метод удаляющий указанную строку из таблицы.



    // геттеры, для считывания состояния объекта
    public function getId()
    {
        return $this->id;
    }

    public function getAbbreviation()
    {
        return $this->abbreviation;
    }

    public function getGroupName()
    {
        return $this->groupName;
    }

    public function getBeginYear()
    {
        return $this->beginYear;
    }

    public function getEndYear()
    {
        return $this->endYear;
    }

    public function getBeginMonth()
    {
        return $this->beginMonth;
    }

    public function getEndMonth()
    {
        return $this->endMonth;
    }
    public function getCourse()
    {
        return $this->course;
    }

    // сеттеры, для изменения состояния объекта

    private function _setId($value)
    {
         $this->id=$value;
    }

    private function _setGroupName($value)
    {
         $this->groupName=$value;
    }
    private function _setBeginYear($value)
    {
         $this->beginYear=$value;
    }
    private function _setEndYear($value)
    {
         $this->endYear=$value;
    }
    private function _setBeginMonth($value)
    {
         $this->beginMonth=$value;
    }
    private function _setEndMonth($value)
    {
         $this->endMonth=$value;
    }
    private function _setAbbreviation($value)
    {
         $this->abbreviation=$value;
    }
    public function _setCourse()
    {
        $year=date("Y");
        $month=date("n");
        $beginYear=(int)$this->getBeginYear();
        $endYear=(int)$this->getEndYear();

        if($beginYear<=$year AND $endYear>=$year){
            if($beginYear != $year){
                $course=(int)$year-(int)$beginYear;
            }else{
                $course=(int)$year-(int)$beginYear+1;
            }
            $this->course=$course;
        }
    }

}
