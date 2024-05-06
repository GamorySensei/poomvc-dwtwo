<?php

require '../core/Controller.php';

class ErrorController extends Controller
{

    function notFound()
    {
        http_response_code(404);
        $this->render('error/notFound.html.php');
    }

}