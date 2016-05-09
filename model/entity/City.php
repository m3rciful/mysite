<?php
class City{
    private $id;
    private $name;
    private $country;

    public function __construct($args,$flag=0)
    {
        if($flag!=null){
            $repo=new CityRepository();
            switch ($flag) {
                case 'READ':{
                    $city=$repo->readCity($args);
                    $this->_setId($city['id']);
                    $this->_setName($city['name']);
                    $this->_setCountry($city['country']);
                    break;
                }
                case 'INSERT':{
                    $this->_setId($repo->insertCity($args));
                    break;
                }
                case 'UPDATE':{
                    $city=$repo->updateCity($args);
                    $this->_setId($city['id']);
                    $this->_setName($city['name']);
                    $this->_setCountry($city['country']);
                    break;
                }
                case 'DELETE':{
                    # code...
                    break;
                }
            }
        }else{
            $city=$args;
            $this->_setId($city['id']);
            $this->_setName($city['name']);
            $this->_setCountry($city['country']);
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
     * Gets the value of country.
     *
     * @return Country object
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Sets the value of country.
     *
     * @param Country $country the country
     *
     * @return self
     */
    private function _setCountry($country)
    {
        $this->country = $country;

        return $this;
    }
}