<?php

namespace App\Core;

//require '../core/View.php';

abstract class Controller
{
    
    /**
     * Permet d'afficher le rendu d'une View
     *
     * @param  string $template
     * @param  string $data
     * @return void
     */
    public function render(string $template, array $data = [])
    {
        $view = new View($template, $data);
        $view->render();
    }

    public function redirectToRoute($controller, $action = null, $area = null)
    {
        $url = '/?';
        if($area)
        {
            $url .= 'area=' . $area . '&controller=' . $controller;
        }
        else
        {
            $url .= 'controller=' . $controller;
        }

        if($action)
        {
            $url .= '&action=' . $action;
        }

        header('Location: ' . $url);
        exit; 
    }
}

