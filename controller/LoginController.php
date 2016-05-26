<?php
/**
 * @author Sergei Novitskov
 * @copyright 2KTVRp Group IVKHK 2016
 * 
 * @category LoginController
 */
class LoginController{

        /**
         * Конструктор
         * @access public
         */
        public function __construct(){
        }

        /**
         * метод, который оборачивает данные в html
         * @param  String $path путь к шаблону html
         * @param  array $data объект или массив с данными, которые будут доступны в шаблоне.
         * @access private
         * @return строка содержащая данные, обернутые в html
         */
        private function renderTemplate($path, $data = null) {

            ob_start();
            require $path;
            $html=ob_get_clean();
            return $html;
        }

        /**
         * метод, который обрабатывает данные из формы авторизации и создает сессию, если пользователь существует.
         * @param  массив $args содержит значения (user, pass) для полей в таблице user
         * @return string ответ сервера клиенту (браузеру)
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

        /**
         * Метод, который получает session_id пользователя и закрывает сессию
         * @param  string $session_id - сессия пользователя
         * @return возвращает функцию header для передаресации на index.php
         */
        public function showLogout_action($session_id) {

            $userRepository=new userRepository();
            $userRepository->destroyUserSession($session_id);

            return header('Location: http://'.$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME']); // временное решение
        }

        /**
         * Добывает список пользователей и оборачивает его в html
         * @return string ответ сервера клиенту (браузеру)
         */
        public function listExistsUsers_action() {

            $userRepository=new userRepository();
            $users=$userRepository->listExistsUsers();

            $response=$this->renderTemplate("view/listExistsUsers.php", array('users'=>$users));
            return $response;
        }

        /**
         * Выводит форму для добавления нового пользователя
         * @return string  ответ сервера клиенту (браузеру)
         */
        public function addUser_action(){

            $response=$this->renderTemplate("view/addUser.php", array());
            return $response;
        }

        /**
         * Записывает информацию о новом пользователу в базу
         * @param  массив $args содержит значения для полей в таблице user
         * @return список всех пользователей (перенаправление)
         */
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