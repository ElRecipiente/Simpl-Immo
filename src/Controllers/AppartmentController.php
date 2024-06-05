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

    public function editProperty($id) {

        $property = $this->repository->getOneById($id);
        $data = ['property' => $property];

        if (isset($_SESSION['error'])) {
            $data['error'] = $_SESSION['error'];
            unset($_SESSION['error']);
        }

        $this->render('properties/properties-edit.html.twig', $data);
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