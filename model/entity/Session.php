<?php
class Session {
    private $sessionID;

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

    public function init_session() 
    {
        session_start();
    }

    public function getSession()
    {
        return $this->sessionID;
    }

    public function _setSession($id)
    {
        $this->sessionID = $id;
        
        return $this;
    }

    public function refresh() {

        session_regenerate_id(true);
        $this->sessionID = session_id();

        return $this;
    }
}