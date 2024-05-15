<?php

namespace Controllers;

abstract class BaseController {
    private $twig;

    public function __construct()
    {
        $loader = new \Twig\Loader\FilesystemLoader('../src/Views');
        $this->twig = new \Twig\Environment($loader);
    }

    // On parle ici de façade, on fait ce que fait déjà la méthode twig, mais pour le faire avec notre controller
    public function render($name, $data = [])
    {
        echo $this->twig->render($name, $data);
    }
}