<?php

class StudentController{

        public function __construct(){
        }
        /**
         * метод, который оборачивает данные в html
         * @param String $path - путь к шаблону html
         * @param mixin $data - объект или массив с данными, которые будут доступны в шаблоне.
         * @return строка содержащая данные, обернутые в html
         */
        private function renderTemplate($path, $data = null){
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
        public function showStudent_action($id){
            $student=new Student($id,'READ');
            $response=$this->renderTemplate("view/showStudent.php", array('student'=>$student));
            return $response;
        }
        public function addStudent_action(){

            $groupRepository=new GroupRepository();
            $groups=$groupRepository->listAllGroups();

            $cityRepository=new CityRepository();
            $cities=$cityRepository->listAllCities();

            $countryRepository=new CountryRepository();
            $countries=$countryRepository->listAllCountries();

            $response=$this->renderTemplate("view/addStudent.php", array('groups'=>$groups,'cities'=>$cities,'countries'=>$countries));
            return $response;
        }
        public function insertStudent_action($args){
            // echo "<br>InsertStudent_action:<pre>";
            // var_dump($args);
            // echo "</pre>";
                $paramForAddress=array($args['street'],$args['house'],$args['room'],$args['city_id']);
            $address=new Address($paramForAddress,'INSERT');
                $paramForPerson=array($args['name'],$args['surname'],$args['code'],$args['eban'],$args['bankname']);
            $person=new Person($paramForPerson,'INSERT');
                 $paramForStudent=array($args['registry'],$args['group_id'],$person->getId(),$address->getId());
            $student=new Student($paramForStudent,'INSERT');
                $repo=new StudentRepository();
            $students=$repo->getStudentsByGroup($args["group_id"]);
            $group=new Group($args["group_id"],'READ');
            $response=$this->renderTemplate("view/showGroup.php", array('group'=>$group,'students'=>$students));

            return $response;
        }
        public function listExistsStudents_action($group_id){
            $StudentRepository=new StudentRepository();
            $persons=$StudentRepository->listExistsStudents($group_id);
            $response=$this->renderTemplate("view/listExistsStudents.php", array('persons'=>$persons,'group_id'=>$group_id));
            return $response;
        }
        public function insertStudentToGroup_action($args){
            $studentRepository=new StudentRepository();
            $student=$studentRepository->getStudentByPersonId($args['person_id']);
            $studentRepository->insertStudentToGroup([$args['group_id'],$student->getId()]);
            $students=$studentRepository->getStudentsByGroup($args["group_id"]);
            $group=new Group($args["group_id"],'READ');
            $response=$this->renderTemplate("view/showGroup.php", array('group'=>$group,'students'=>$students));

            return $response;
        }


    }