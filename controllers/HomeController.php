<?php
require '../core/Controller.php';

class Person{
    public $firstName;

    public function __construct($firstName)
    {
        $this->firstName = $firstName;
    }
}

class HomeController extends Controller
{
    /**
     * Fonction d'action par défaut du controleur "home"
     */
    public function index() 
    {
        $person = new Person('john');


        $this->render('home/index.html.php', [
            'title' => 'Bienvenue sur la page d\'accueil',
            'test' => $person,
        ]);
    }

    public function about()
    {
        $this->render('home/about.html.php', [
            'title' => 'À propos de nous',
        ]);
    }
}