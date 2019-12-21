<?php
/**
 * Created by PhpStorm.
 * User: огпе
 * Date: 05.03.2019
 * Time: 22:27
 */
use \controllers\ControllerException;
//запускаем сессию
session_start();

require 'constants.php';
require ROOT_DIR . 'autoloader.php';
require ROOT_DIR . 'bootstrap.php';
$config = include_once 'config.php';

$uri = explode('/', str_replace('mvc/', '', $_SERVER['REQUEST_URI']));

//игнорируем запрос favicon
if(strpos($_SERVER['REQUEST_URI'],'favicon.ico')){
    return true;
}
//избавляемся от слеша в начале URI
array_shift($uri);

//разбираем URI на контроллер и действие
list($controllerName, $action) = [$uri[0], $uri[1]];

$controllerName = !empty($controllerName) ? $controllerName : 'index';
//приводим название контроллера в надлежащий вид
$controllerName = stristr($controllerName, 'Controller') ? $controllerName : ucfirst($controllerName) . 'Controller';



//добавляем namespace
$controllerName = 'controllers\\' . $controllerName;

//ловим пользовательские данные
$userData = !empty($_REQUEST) ? $_REQUEST : [];
//создаем экземпляр контроллера и передаем в него данные
$controller = new $controllerName($userData);
try {
    //если действия в контроллере нет, ставим по умолчанию
    $action = empty($action) ? 'index' : $action;
    //вызываем действие
    $controller->$action();
} catch (ControllerException $exception){
    echo $exception->getMessage();
} finally {
    //попробуем найти какой-нибудь view (html-шаблон) от контроллера
    $html = $controller->hasView() ? $controller->getView() : '';
    //расскоментировать в случае использования ajax-запросов
    $isAjax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
    if($isAjax) {
        $response['error'] = $exception->getMessage();
        $response['status'] = $controller->getStatus();
//        $response['view'] = $html;
        $response = json_encode($response, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
    }
    echo !empty($response) ? $response : $html;
}