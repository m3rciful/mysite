<?php
/**
 * @author Sergei Novitskov
 * @copyright 2KTVRp Group IVKHK 2016
 * 
 * @package LoginController
 */
class Session {
    
    /**
     * Идентификатор сессии
     * @var int
     */
    private $sessionID;

    /**
     *  Считывает состояние сесстт или записывает, изменяет или удаляет ее.
     * @param string $flag  содержит строку-флаг, который определяет действие (START, DESTROY)
     */
    public function __construct($flag=null){

        switch ($flag) {
            case 'START':{
                $sid = session_id();

                if(empty($sid)) {
                    $this->init_session(); // Start the session
                }

                $this->_setSession(session_id());

                break;
            }
            case 'DESTROY':{
                session_unset(); // remove all session variables
                session_destroy(); // destroy the session 
                break;
            }
        }

    }

    /**
     * Эта функция проверяет, существует ли идентификатор сессии, и, если нет, то создает его.
     * @return session_start открытие сессии
     */
    public function init_session() 
    {
        session_start();
    }

    /**
     * Получает значение sessionID
     * @return String;
     */
    public function getSession()
    {
        return $this->sessionID;
    }

    /**
     * Устанавливает значение $id
     * @param int $id пароль устанавливает ID сессии
     * @return self.
     */
    public function _setSession($id)
    {
        $this->sessionID = $id;
        
        return $this;
    }

    /**
     * Меняет идентификатор сессии
     * @return self
     */
    public function refresh() {

        session_regenerate_id(true);
        $this->sessionID = session_id();

        return $this;
    }
}