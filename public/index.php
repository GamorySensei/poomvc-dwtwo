<?php

define('BASE_URL', '../');
session_start();

require BASE_URL . 'config/autoload.php';

// Routeur

try
{
    // Indentification de la zone
    $area = !empty($_GET['area']) ? $_GET['area'] : 'Web';

    // Indetification du contrôleur
    $controllerName = "App\\Controllers\\".ucfirst($area)."\\" . (!empty($_GET['controller']) ? ucfirst($_GET['controller']) : 'Home') . 'Controller';
    $controller = new $controllerName();

    // Indentification de l'action
    $action = !empty($_GET['action']) ? $_GET['action'] : 'index';

    if(!method_exists($controller, $action))
        throw new Exception("Action '" . $action . "' does not exist");

    $controller->$action();

}
catch (\Exception $e)
{

    if(isset($_GET['debug']))
    {
        echo $e->getMessage();
    }
    else
    {
        require '../controllers/Web/ErrorController.php';
        $controller = new App\Controllers\Web\ErrorController();
        $controller->notFound();
    }
}
