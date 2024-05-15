<?php

namespace App\Controllers\Admin;

use App\Models\ArtistManager;

class ArtistController extends PrivateController
{
    private ArtistManager $artistManager;

    public function __construct()
    {
        parent::__construct();
        $this->artistManager = new ArtistManager();
    }


    public function index()
    {
        $artists = $this->artistManager->getAllArtists();

        $this->render('admin/artist/index.html.php',[
            'artists' => $artists,
        ]);
    }

    // GET & POST
    public function create()
    {
        // On vérifie que le formulaire est bien envoyé grâce au name du bouton
        if (isset($_POST['create_artist_submit'])) {
            if (!empty($_POST['artist']['name'])) {
                // On appel la fonction du manager pour insérer les données en bdd
                if ($this->artistManager->addArtist($_POST['artist'])) {

                    // Tout s'est bien passé, alors on redirihe l'utilisateur vers la liste des artistes 
                    header('Location: /?controller=artist&action=index');
                    exit;
                }
            }
        }
        
        $this->render('admin/artist/create.html.php');
    }
}
