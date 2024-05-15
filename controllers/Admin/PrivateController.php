<?php

namespace App\Controllers\Admin;

use App\Core\Controller;

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