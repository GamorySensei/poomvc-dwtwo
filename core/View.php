<?php

namespace App\Core;

class View
{
    private string $template;

    private array $data;

    private string $layout = 'web/layout.html.php';

    public function __construct(string $template, array $data = [])
    {
        $this->template = $template;
        $this->data = $this->cleanData($data);
    }

    public function render()
    {
        // Extraction des clés en variables
        extract($this->data);

        ob_start(); // Démarage du tampon
        require '../views/' . $this->template;
        $bodyContent = ob_get_clean(); // Récupération du contenu executé en mémoire tampon

        require '../views/' . $this->layout;
    }

    private function cleanData(array $data)
    {
        return array_map(function($value){

            if(empty($value))
            {
                return $value;
            }

            if(is_array($value))
            {
                return $this->cleanData($value);
            }
            else if(is_object($value))
            {
                return $value;
            }
            else
            {
                return htmlspecialchars($value);
            }
        }, $data);
    }

    public function linkToRoute($controller, $action = null, $area = null)
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

        return $url;
    }

}