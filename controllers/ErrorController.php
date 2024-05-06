<?php

class ErrorController
{

    function notFound()
    {
        http_response_code(404);
        $template = '../views/error/notFound.html.php';
        require '../views/layout.html.php';
    }

}