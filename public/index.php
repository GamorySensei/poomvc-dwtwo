<?php

define('BASE_URL', '../');

session_start();

// Routeur

try
{
    // Indentification de la zone
    $area = !empty($_GET['area']) ? $_GET['area'] : 'Web';

    // Indetification du contrôleur
    $controllerName = (!empty($_GET['controller']) ? ucfirst($_GET['controller']) : 'Home') . 'Controller';
    $controllerFilename = '../controllers/'.$area.'/' . $controllerName . '.php';

    if(!file_exists($controllerFilename))
        throw new Exception("Controller file does not exist");

    require $controllerFilename;
    $controller = new $controllerName();

    // Indentification de l'action
    $action = !empty($_GET['action']) ? $_GET['action'] : 'index';

    if(!method_exists($controller, $action))
        throw new Exception("Action '" . $action . "' does not exist");

    $controller->$action();

}
catch (Exception $e)
{

    if(isset($_GET['debug']))
    {
        echo $e->getMessage();
    }
    else
    {
        require '../controllers/Web/ErrorController.php';
        $controller = new ErrorController();
        $controller->notFound();
    }
}
