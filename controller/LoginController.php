<?php

class LoginController{

        public function __construct(){
        }
        /**
         * метод, который оборачивает данные в html
         * @param String $path - путь к шаблону html
         * @param mixin $data - объект или массив с данными, которые будут доступны в шаблоне.
         * @return строка содержащая данные, обернутые в html
         */
        private function renderTemplate($path, $data = null) {
            // echo "<pre>";
            // var_dump($data);
            // echo "</pre>";
            ob_start();
            require $path;
            $html=ob_get_clean();
            return $html;
        }
        /**
         * Добывает список активных групп и оборачивает его в html
         * @return string  ответ сервера клиенту (браузеру)
         */
        public function showLogin_action($args){

            if($args) 
            {
                new User($args,'READ'); // Если пользователь есть в базе - записываем в сессию.
                header( 'Location: http://' . $_SERVER['HTTP_HOST']  . '/mysite/index.php' );
            }

            $response=$this->renderTemplate("view/login.php", array());

            return $response;
        }

        public function showLogout_action(){
            
            $session = new Session('DESTROY');
            header( 'Location: http://' . $_SERVER['HTTP_HOST']  . '/mysite/index.php' );
        }

        // Список всех пользователей
        public function listExistsUsers_action(){
            $userRepository=new userRepository();
            $users=$userRepository->listExistsUsers();
            $response=$this->renderTemplate("view/listExistsUsers.php", array('users'=>$users));
            return $response;
        }

        // Добавление нового пользователя (input)
        public function addUser_action(){

            $response=$this->renderTemplate("view/addUser.php", array());
            return $response;
        }

        // Добавление нового пользователя (send)
        public function insertUser_action($args){
             echo "<br>InsertStudent_action:<pre>";
             var_dump($args);
             echo "</pre>";
            $response=$this->listExistsUsers_action();

            return $response;
        }


    }