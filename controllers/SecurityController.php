<?php
require '../core/Controller.php';

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
            header("Location: /?controller=artist");
            exit;
        }

        $this->render('security/login.html.php');
    }

}