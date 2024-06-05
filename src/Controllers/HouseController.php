<?php

namespace Controllers;

use Repositories\HouseRepository;

class HouseController extends PropertyController
{
    private HouseRepository $repository;
    private Middleware $middleware;

    public function __construct() {
        parent::__construct();
        $this->repository = new HouseRepository();
        $this->middleware = new Middleware();
    }

    public function createPropertyHouse() {

        if ($this->middleware->isPropertyCreateSecure() && $this->middleware->isHouseCreateSecure()) {
            $this->repository->createHouse();
            header('Location: /');
            exit;
        }
    }

    public function updatePropertyHouse() {

        if ($this->middleware->isPropertyCreateSecure() && $this->middleware->isHouseCreateSecure()) {
            $id = $_POST['id'];
            $this->repository->updateHouse($id);
            header('Location: /');
            exit;
        }
    }
}