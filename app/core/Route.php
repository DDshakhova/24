<?php

namespace App\core;

define('CONTROLLERS_NAMESPACE', 'App\\controllers\\');

class Route {

public static function start()
{
    $controllerClassname = 'home';
    //$actionName = 'index';
    $payload = [];

    $routes = explode('/', $_SERVER["REQUEST_URI"]);

    // получаем имя контроллера
    if (!empty($routes[1])) {
        $controllerClassname = $routes[1];
    }
    // получаем имя экшена
    $actionName = empty($routes[2]) ? 'index' : $routes[2];

    // получаем то что дальше
    if (!empty($routes[3])) {
    $payload = array_slice($routes, 3);
    }

    // всё ещё имя контроллера
    $controllerName = CONTROLLERS_NAMESPACE . ucfirst($controllerClassname);

    // файл с классом модели
    $modelName = 'model_' . $actionName;
    $modelFile = strtolower($modelName). '.php';
    $model_path = MODEL . $modelFile;
    if(file_exists($model_path)){
        include_once $model_path;
    } 
    // у меня модель есть только для страницы портфолио, поэтому никаких else
    
    // файл с классом контроллера
    $controllerFile = ucfirst(strtolower($controllerClassname)) . '.php';

    $controller_path = CONTROLLER . $controllerFile;
    if(file_exists($controller_path)){
        include_once $controller_path;
    } else {
        echo 'controller';
        Route::Error();
    }
// оставила вывод контроллер/метод на будущее, если захочется покопаться и что-то изменить,
// потому что мне так действительно легче понять, где ошибка

    $controller = new $controllerName();

    $method = $actionName;
    if(method_exists($controller, $method)) {
        $controller->$method($payload);
    } else {
        echo 'method';
        Route::Error();
    }

}

public static function Error(){
    header('HTTP/1 404 Not Found');
    header('Status: 404 Not Found');
    header('Location:/error');
}

}