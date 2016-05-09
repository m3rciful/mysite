<?php
class Address{
    private $id;
    private $street;
    private $house;
    private $room;
    private $city;

    public function __construct($args,$flag)
    {
        $repo=new AddressRepository();
        switch ($flag) {
            case 'READ':{
                $address=$repo->readAddress($args);
                $this->_setId($address["id"]);
                $this->_setStreet($address["street"]);
                $this->_setHouse($address["house"]);
                $this->_setRoom($address["room"]);
                $this->_setCity($address["city"]);
                break;
            }
            case 'INSERT':{
            // echo "<pre>";
            // var_dump($args);
            // echo "</pre>";
                $this->_setId($repo->insertAddress($args));
                break;
            }
            case 'UPDATE':{
                $repo->updateAddress($args);
                break;
            }
            case 'DELETE':{
                $repo->deleteAddress($args);
                break;
            }
        }
    }





    /**
     * Gets the value of city.
     *
     * @return City
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Sets the value of city.
     *
     * @param City $city the city
     *
     * @return self
     */
    private function _setCity($city)
    {
        $this->city = $city;

        return $this;
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
     * Gets the value of street.
     *
     * @return String
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Sets the value of street.
     *
     * @param String $street the street
     *
     * @return self
     */
    private function _setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Gets the value of house.
     *
     * @return String
     */
    public function getHouse()
    {
        return $this->house;
    }

    /**
     * Sets the value of house.
     *
     * @param String $house the house
     *
     * @return self
     */
    private function _setHouse($house)
    {
        $this->house = $house;

        return $this;
    }

    /**
     * Gets the value of room.
     *
     * @return String
     */
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * Sets the value of room.
     *
     * @param String $room the room
     *
     * @return self
     */
    private function _setRoom($room)
    {
        $this->room = $room;

        return $this;
    }
}