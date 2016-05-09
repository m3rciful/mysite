<?php
class Country{
    private $id;
    private $name;

    public function __construct($args,$flag=null){
        if($flag!=null){
        $repo=new CountryRepository();
        switch ($flag) {
            case 'READ':{
                $country=$repo->readCountry($args);
                $this->_setId($country["id"]);
                $this->_setName($country["name"]);
                break;
            }
            case 'INSERT':{
                $this->_setId($repo->insertCountry($args));
                break;
            }
            case 'UPDATE':{
                $repo->updateCountry($args);
                break;
            }
            case 'DELETE':{
                $repo->updateCountry($args);
                break;
            }
        }
    }else{
        $country=$args;
        $this->_setId($country["id"]);
        $this->_setName($country["name"]);
    }
    }


    /**
     * Gets the value of id.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the value of id.
     *
     * @param mixed $id the id
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
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the value of name.
     *
     * @param mixed $name the name
     *
     * @return self
     */
    private function _setName($name)
    {
        $this->name = $name;

        return $this;
    }
}