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

            ob_start();
            require $path;
            $html=ob_get_clean();
            return $html;
        }
        /**
         * Добывает список активных групп и оборачивает его в html
         * @return string  ответ сервера клиенту (браузеру)
         */

        public function showLogin_action($args) {

            $paramForResponse = array('alert' => 'hide','title' => null, 'msg' => null);

            if($args) 
            {  
                $user = new User($args,'READ');

                if($user->getId())
                {
                    $session = new Session();
                    $session->refresh();
    
                    $paramForUser = array($session->getSession(), $user->getId());
                    $user = new User($paramForUser, 'UPDATE');
    
                    header('Location: http://'.$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME']); // временное решение
                    exit();
                }
                else {
                    $paramForResponse = array(
                    'alert' => null, 
                    'title' => "Ошибка",
                    'msg' => "Вы ввели неверный <b>логин</b> или <b>пароль</b>");
                }
            }

            $response=$this->renderTemplate("view/login.php", $paramForResponse);
            return $response;
        }

        public function showLogout_action($id) {

            $userRepository=new userRepository();
            $userRepository->destroyUserSession($id);

            return header('Location: http://'.$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME']); // временное решение
        }

        // Список всех пользователей
        public function listExistsUsers_action() {

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
        public function insertUser_action($args) {

            if($args['name'] AND $args['pass']) {
                
                $user=new User($args,"INSERT");
                return $this->listExistsUsers_action();
            }
            else {
                return $this->addUser_action();
            }
        }


    }