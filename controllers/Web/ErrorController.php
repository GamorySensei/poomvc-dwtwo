<?php
namespace App\Controllers\Web;

use App\Core\Controller;

class ErrorController extends Controller
{

    function notFound()
    {
        http_response_code(404);
        $this->render('web/error/notFound.html.php');
    }

}