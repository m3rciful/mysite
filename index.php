<?php
/**
 * @author Sergei Novitskov
 * @copyright Group 2KTVRp. IVKHK 2016
 * @version 1.0
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

    /**
     * функция автозагрузки классов по требованию
     * @param  string $class_name - название папки
     * @return подключает файл, если он еще не был подключен.
     */
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
    
    spl_autoload_register('myLoader'); //регистрация автозагрузчика

    $filter=new Filter();

    $uri=$filter->filterGetUri();
    $s = explode('?', $uri);
    $uri = $s[0];
    $uri=rtrim($uri,'/');
    $uriPrefix= $_SERVER['SCRIPT_NAME']; // путь /mysite/index.php


$groupController=new GroupController();
$studentController=new StudentController();
$loginController=new LoginController();

$sid = new Session('START'); // Считываем сессию SESSION_ID
$user=new User( $sid->getSession(), 'READ'); // Проверяем есть ли такой сеанс в базе

if (!$user->getId()) {
    $uri = $uriPrefix.'/login';
}

switch ($uri) {
    case $uriPrefix.'':
        $response=$groupController->getAllGroups_action();
        break;
    case $uriPrefix.'/showgroup':
        $response=$groupController->getGroup_action($filter->filterId());
        break;
    case $uriPrefix.'/addgroup':
        if($user->getAccess() > 3) // Проверка на доступ (4 - типа супер-юзер, 1 - чайник)
            $response=$groupController->addGroup_action(); else $response=false;
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
    case $uriPrefix.'/login':
        $response=$loginController->showLogin_action($filter->filterInsertLogin());
        break;
    case $uriPrefix.'/logout':
        $response=$loginController->showLogout_action($user->getId());
        break;
    case $uriPrefix.'/adduser':
        if($user->getAccess() > 3)
            $response=$loginController->addUser_action();  else $response=false;
        break;
    case $uriPrefix.'/insertuser':
        if($user->getAccess() > 3)
            $response=$loginController->insertUser_action($filter->filterInsertUser());  else $response=false;
        break;
    case $uriPrefix.'/showuser':
        $response=$loginController->listExistsUsers_action();
        break;
}
    
    if(isset($response)){
        // Если доступ был запрещен, предлагает авторизироваться
        if(!$response) $response=$loginController->showLogin_action($filter->filterInsertLogin());

        echo $response;
    }


