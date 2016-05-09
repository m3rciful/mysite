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
$loginController=new LoginController(); // Контроллер для авторизации

// Считываем сессию
$user=new Session('READ');

// временный код ----------------
if ($user->getId()) // Если айди есть, значит пользователь вошел
{
    echo "Вы вошли как, <b>".$user->getUser()."</b> (<a href='/mysite/index.php/logout'>Выйти</a>) - ";
    echo "<b>".$user->getAccess()."</b>";
}
else
    $uri = $uriPrefix.'/login';
// временый код ------------------

switch ($uri) {
    case $uriPrefix.'':
        $response=$groupController->getAllGroups_action();
        break;
    case $uriPrefix.'/showgroup':
        $response=$groupController->getGroup_action($filter->filterId());
        break;
    case $uriPrefix.'/addgroup':
    if($user->getAccess() > 4) // Проверка на доступ (4 - типа супер-юзер, 1 - чайник)
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
    case $uriPrefix.'/login': // by Sergei - Авторизация ВХОД
        $response=$loginController->showLogin_action($filter->filterInsertLogin());
        break;
    case $uriPrefix.'/logout': // by Sergei - Авторизация ВЫХОД
        $response=$loginController->showLogout_action();
        break;
}
    // Если доступ был запрещен, кидает на логин форму
    if(!$response) $response=$loginController->showLogin_action($filter->filterInsertLogin());
    
    if(isset($response)){
        echo $response;
    }


