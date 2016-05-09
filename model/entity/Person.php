<?php
class Person{
    private $id=1;
    private $name="Juri";
    private $surname;
    private $code;
    private $eban;
    private $bankname;

    public function __construct($args,$flag = null)
    {
        if($flag!=null){
            $repo=new PersonRepository();
            switch ($flag){
                case 'READ':{
                    $person=$repo->readPerson($args);
                    $this->_setId($person["id"]);
                    $this->_setName($person["name"]);
                    $this->_setSurname($person["surname"]);
                    $this->_setCode($person["code"]);
                    $this->_setEban($person["eban"]);
                    $this->_setBankname($person["bankname"]);
                    break;
                }
                case 'INSERT':{
                    $this->_setId($repo->insertPerson($args));
                    break;
                }
                case 'UPDATE':{
                    $repo->updatePerson($args);
                    break;
                }
                case 'DELETE':{
                    $repo->deletePerson($args);
                    break;
                }
            }
        }else{
            $person=$args;
            $this->_setId($person["id"]);
            $this->_setName($person["name"]);
            $this->_setSurname($person["surname"]);
            $this->_setCode($person["code"]);
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
     * Gets the value of name.
     *
     * @return String
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the value of name.
     *
     * @param String $name the name
     *
     * @return self
     */
    private function _setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the value of surname.
     *
     * @return String
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Sets the value of surname.
     *
     * @param String $surname the surname
     *
     * @return self
     */
    private function _setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Gets the value of code.
     *
     * @return String
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Sets the value of code.
     *
     * @param String $code the code
     *
     * @return self
     */
    private function _setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Gets the value of eban.
     *
     * @return String
     */
    public function getEban()
    {
        return $this->eban;
    }

    /**
     * Sets the value of eban.
     *
     * @param String $eban the eban
     *
     * @return self
     */
    private function _setEban($eban)
    {
        $this->eban = $eban;

        return $this;
    }

    /**
     * Gets the value of bankname.
     *
     * @return String
     */
    public function getBankname()
    {
        return $this->bankname;
    }

    /**
     * Sets the value of bankname.
     *
     * @param String $bankname the bankname
     *
     * @return self
     */
    private function _setBankname($bankname)
    {
        $this->bankname = $bankname;

        return $this;
    }
}