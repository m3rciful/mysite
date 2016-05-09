<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

    //функция автозагрузки классов по требованию
    function myLoader($class_name){

        $myDirs=array(  'controller/',
                        'model/entity/',
                        'model/repository/',
                        'model/',
                        'route/',
                        'view/',
                        'utils/'
                    );
        foreach($myDirs as $directory)
        {
            if(file_exists($directory.$class_name .'.php'))
            {
                require_once($directory.$class_name .'.php');
                return;
            }
        }
    }
    //регистрация автозагрузчика
    spl_autoload_register('myLoader');

    $filter=new Filter();

    $uri=$filter->filterGetUri();
    $s = explode('?', $uri);
    $uri = $s[0];
    $uri=rtrim($uri,'/');
    $uriPrefix='/mysite/index.php';


$groupController=new GroupController();
$studentController=new StudentController();

switch ($uri) {
    case $uriPrefix.'':
        $response=$groupController->getAllGroups_action();
        break;
    case $uriPrefix.'/showgroup':
        $response=$groupController->getGroup_action($filter->filterId());
        break;
    case $uriPrefix.'/addgroup':
        $response=$groupController->addGroup_action();
        break;
    case $uriPrefix.'/insertgroup':
        $response=$groupController->insertGroup_action($filter->filterInsertGroup());
        break;
    case $uriPrefix.'/showstudent':
        $response=$studentController->showStudent_action($filter->filterId());
        break;
    case $uriPrefix.'/addnewstudent':
        $response=$studentController->addStudent_action();
        break;
    case $uriPrefix.'/insertstudent':
        $response=$studentController->insertStudent_action($filter->filterInsertStudent());
        break;
    case $uriPrefix.'/addstudent':
        $response=$studentController->listExistsStudents_action($filter->filterId());
        break;
    case $uriPrefix.'/insertstudenttogroup':
        $response=$studentController->insertStudentToGroup_action($filter->insertStudentToGroup());
        break;
}

    if(isset($response)){
        echo $response;
    }


