<?php

namespace App\Controllers\Web;

use App\Core\Controller;

class SecurityController extends Controller
{
    /**
     * Fonction d'action par défaut du controleur "home"
     */
    public function login() 
    {
        // Traitement du formulaire de login
        if(isset($_POST['submit_login_form']))
        {
            $_SESSION['user'] = 1;
            $this->redirectToRoute(
                controller :'artist', 
                area : 'admin'
            );
        }

        $this->render('web/security/login.html.php');
    }

    public function logout()
    {
        session_destroy();
        unset($_SESSION['user']);
        setcookie('PHPSESSID');
        unset($_COOKIE['PHPSESSID']);

        $this->redirectToRoute(
            controller: 'security', 
            action: 'login'
        );
    }

}