<?php

namespace App\Controllers\Web;

use App\Core\Controller;

class HomeController extends Controller
{
    /**
     * Fonction d'action par défaut du controleur "home"
     */
    public function index() 
    {
        $this->render('web/home/index.html.php', [
            'title' => 'Bienvenue sur la page d\'accueil',
        ]);
    }

    public function about()
    {
        $this->render('web/home/about.html.php', [
            'title' => 'À propos de nous',
        ]);
    }
}