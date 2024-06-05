<?php

namespace Controllers;

use Repositories\AppartmentRepository;

class AppartmentController extends PropertyController {

    private AppartmentRepository $repository;
    private Middleware $middleware;

    public function __construct() {
        parent::__construct();
        $this->repository = new AppartmentRepository();
        $this->middleware = new Middleware();
    }

    public function createPropertyAppartment() {

        if ($this->middleware->isPropertyCreateSecure() && $this->middleware->isAppartmentCreateSecure()) {
            $this->repository->createAppartement();
            header('Location: /');
            exit;
        }
    }

    public function updatePropertyAppartment() {

        if ($this->middleware->isPropertyCreateSecure() && $this->middleware->isAppartmentCreateSecure()) {
            $id = $_POST['id'];
            $this->repository->updateAppartement($id);
            header('Location: /');
            exit;
        }
    }


}