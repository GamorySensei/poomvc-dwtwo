<?php

require BASE_URL . 'core/Controller.php';

abstract class PrivateController extends Controller
{

    public function __construct()
    {   
        if(empty($_SESSION['user']))
        {
            $this->redirectToRoute(
                controller: 'security', 
                action: 'login'
            );
        }
    }





}