<?php

namespace Controllers;

use Repositories\GarageRepository;

class GarageController extends PropertyController {

    private GarageRepository $repository;
    private Middleware $middleware;

    public function __construct() {
        parent::__construct();
        $this->repository = new GarageRepository();
        $this->middleware = new Middleware();
    }

    public function createPropertyGarage() {

        if ($this->middleware->isPropertyCreateSecure() && $this->middleware->isGarageCreateSecure()) {
            $this->repository->createGarage();
            header('Location: /');
            exit;
        }
    }

    public function updatePropertyGarage() {

        if ($this->middleware->isPropertyCreateSecure() && $this->middleware->isGarageCreateSecure()) {
            $id = $_POST['id'];
            $this->repository->updateGarage($id);
            header('Location: /');
            exit;
        }
    }
}