<?php
class Parents{
    private $id;
    private $person;
    private $status;
    private $address;
/**
 * Задает состояние в зависимости от аргументов
 * @param [mixin] $args Если $flag=='READ' $args содержит id строки таблицы parent.
 *                      Если $flag=='INSERT' $args содержит значения полей из массива $_POST.
 *                      Если $flag=='UPDATE' $args содержит значения полей из массива $_POST в конце стоит поле 'id'.
 *                      Если $flag=='DELETE' $args содержит значение поля 'person_id'.
 *                      Если $flag=='null' $args содержит хэш поле->значеие для задания состояния объекта.
 * @param [String] $flag указыает, какую часть конструктора выполнить.
 */
    public function __construct($args,$flag=null){
        if($flag != null){
            $repo=new ParentsRepository();
            switch ($flag) {
                case 'READ':{
                    $parents=$repo->readParents($args);
                    foreach ($parents as $parent) {
                        $this->_setId($parent["id"]);
                        $this->_setPersons($parent["person"]);
                        $this->_setStatus($parent["status"]);
                        $this->_setAddress($parent["address"]);
                    }
                    break;
                }
                case 'INSERT':{
                    $this->_setId($repo->insertParents($args));
                    break;
                }
                case 'UPDATE':{
                    $repo->updateParents($args);
                    break;
                }
                case 'DELETE':{
                    $repo->updateParents($args);
                    break;
                }
            }
        }else{
            $this->_setId($args["id"]);
            $this->_setPersons($args["persons"]);
            $this->_setStatus($args["status"]);
            $this->_setAddress($args["address"]);
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

    /**
     * Gets the value of status.
     *
     * @return String
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets the value of status.
     *
     * @param String $status the status
     *
     * @return self
     */
    private function _setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Gets the value of address.
     *
     * @return Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Sets the value of address.
     *
     * @param Address $address the address
     *
     * @return self
     */
    private function _setAddress($address)
    {
        $this->address = $address;

        return $this;
    }
}