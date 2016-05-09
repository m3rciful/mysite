<?php

class GroupController{

        public function __construct(){
        }
        /**
         * метод, который оборачивает данные в html
         * @param String $path - путь к шаблону html
         * @param mix $data - объект или массив с данными, которые будут доступны в шаблоне.
         * @return строка содержащая данные, обернутые в html
         */
        private function renderTemplate($path, $data = null)
        {
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
        public function getAllGroups_action(){
            $groupRepository=new GroupRepository();
            $listAllGroups=$groupRepository->listAllGroups();
            $response=$this->renderTemplate("view/listGroups.php", array('list'=>$listAllGroups));
            return $response;
        }
        /**
         * Добывает информацию о группе и оборачивает ее в html
         * @param  int $id  идентификатор группы
         * @return string  ответ сервера клиенту (браузеру)
         */
        public function getGroup_action($id){
            $group=new Group($id,'READ');
            $studentRepository=new StudentRepository();
            $students=$studentRepository->getStudentsByGroup($id);
            $response=$this->renderTemplate("view/showGroup.php", array('group'=>$group,'students'=>$students));
            return $response;
        }
        /**
         * Записывает информацию о новой группе в базу
         * @param массив $args содержит значения для полей в таблице group
         * (проследите последовательность полей согласно их расположению втаблице)
         */
        public function insertGroup_action($args){
            $group=new Group($args,"INSERT");
            return $this->getAllGroups_action();
        }

        public function addGroup_action(){
            $person = new Person('1','READ');
            $response=$this->renderTemplate("view/addGroup.php");
            return $response;
        }


    }