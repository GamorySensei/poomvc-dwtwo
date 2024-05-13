<?php

require BASE_URL . 'core/Controller.php';

abstract class PrivateController extends Controller
{

    public function __construct()
    {   
        if(empty($_SESSION['user']))
        {
            header('Location: /?controller=security&action=login');
            exit;
        }
    }



}