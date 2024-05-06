<?php

class View
{
    private string $template;

    private array $data;

    public function __construct(string $template, array $data = [])
    {
        $this->template = $template;
        $this->data = $data;
    }

    public function render()
    {
        // Extraction des clés en variables
        extract($this->data);

        ob_start(); // Démarage du tampon
        require '../views/' . $this->template;
        $bodyContent = ob_get_clean(); // Récupération du contenu executé en mémoire tampon

        require '../views/layout.html.php';
    }


}