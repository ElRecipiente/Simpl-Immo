<?php

namespace Controllers;

abstract class BaseController {
    private $twig;

    public function __construct()
    {
        $loader = new \Twig\Loader\FilesystemLoader('../src/templates');
        $this->twig = new \Twig\Environment($loader, ['debug' => true]);
        $this->twig->addExtension(new \Twig\Extension\DebugExtension());
    }
    public function render($name, $data = [])
    {
        echo $this->twig->render($name, $data);
    }
}

