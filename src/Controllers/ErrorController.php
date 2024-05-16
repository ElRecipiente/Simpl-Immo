<?php

namespace Controllers;

class ErrorController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function pageNotFound(){
        $this->render('Error/Error.html.twig');
    }
}