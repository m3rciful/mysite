<?php
class Filter{
    /**
     * [filterId description]
     * @return [type] [description]
     */
    public function filterId(){
        return filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
    }

    /**
     * [filterInsertGroup description]
     * @return [type] [description]
     */
    public function filterInsertGroup(){
        $args = array(
            'abbreviation'   => FILTER_SANITIZE_STRING,
            'groupname'    => FILTER_SANITIZE_STRING,
            'begin_year'     => FILTER_VALIDATE_INT,
            'end_year' => FILTER_VALIDATE_INT,
            'begin_month'   => FILTER_VALIDATE_INT,
            'end_month'    => FILTER_VALIDATE_INT
        );
        return filter_input_array(INPUT_POST, $args);
    }

    /**
     * [filterInsertStudent description]
     * @return [type] [description]
     */
    public function filterInsertStudent(){
        $args = array(
            'group_id'   => FILTER_VALIDATE_INT,
            'name'    => FILTER_SANITIZE_STRING,
            'surname'     => FILTER_SANITIZE_STRING,
            'code' => FILTER_SANITIZE_STRING,
            'registry'   => FILTER_VALIDATE_INT,
            'eban'    => FILTER_SANITIZE_STRING,
            'bankname'    => FILTER_SANITIZE_STRING,
            'street'    => FILTER_SANITIZE_STRING,
            'house'    => FILTER_VALIDATE_INT,
            'room'    => FILTER_VALIDATE_INT,
            'city_id'    => FILTER_VALIDATE_INT,
            'country_id'    => FILTER_VALIDATE_INT
        );

        return filter_input_array(INPUT_POST, $args);
    }

    /**
     * [filterGetUri description]
     * @return [type] [description]
     */
    public function filterGetUri()
    {
        return filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_STRING);
    }

    /**
     * [insertStudentToGroup description]
     * @return [type] [description]
     */
    public function insertStudentToGroup()
    {
        $args = array(
            'group_id'  => FILTER_VALIDATE_INT,
            'person_id'    => FILTER_VALIDATE_INT
        );
        return filter_input_array(INPUT_GET, $args);
    }

    /**
     * Форма логина
     * @return [type] [description]
     */
    public function filterInsertLogin(){
        $args = array(
            'username'  => FILTER_SANITIZE_STRING,
            'password'  => FILTER_SANITIZE_STRING
        );
        return filter_input_array(INPUT_POST, $args);
    }

    /**
     * Добавление нового пользователя
     * @return [type] [description]
     */
    public function filterInsertUser(){
        $args = array(
            'name'      => FILTER_SANITIZE_STRING,
            'pass'      => FILTER_SANITIZE_STRING,
            'email'     => FILTER_SANITIZE_STRING,
            'access'    => FILTER_VALIDATE_INT
        );
        return filter_input_array(INPUT_POST, $args);
    }

}