<?php

// On inclut dynamiquement le fichier de contrôleur
if(!empty($_GET['controller']))
{
    $controllerName = $_GET['controller'];
}
else
{
    $controllerName = 'home'; // Contrôleur par défaut
}

$controllerClassName = ucfirst($controllerName) . 'Controller'; // ex: HomeController

// On vérifie que le fichier de contrôleur existe
if(file_exists('../controllers/' . $controllerClassName .'.php'))
{

    // On inclut dynamiquement le fichier de contrôleur
    require '../controllers/' . $controllerClassName .'.php';

    // On instancie le contrôleur
    $controller = new $controllerClassName(); // ex: new HomeController() par défaut


    // On vérifie qu'une action est passée dans l'URL
    if(!empty($_GET['action']))
    {
        $action = $_GET['action'];
    }
    else
    {
        $action = 'index'; // Action par défaut du contrôleur
    }

    if(method_exists($controller, $action))
    {
        $controller->$action(); // index() par défaut
    }
    else
    {
        require '../controllers/ErrorController.php';
        $controller = new ErrorController(); //
        $controller->notFound(); // Action 404
    }

}
else
{
    require '../controllers/ErrorController.php';
    $controller = new ErrorController(); //
    $controller->notFound(); // Action 404
}

