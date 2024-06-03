<?php

namespace Controllers;

use Repositories\AppartmentRepository;

/**
 * Define Controller for Appartment
 */
class AppartmentController extends BaseController
{

    /**
     * @var AppartmentRepository
     */
    private AppartmentRepository $repository;

    /**
     * Constructor method to initialize the repository
     */
    public function __construct() {
        parent::__construct();
        $this->repository = new AppartmentRepository();
    }

    /**
     * Get all appartments and render the view
     *
     * @return void
     */
    public function display() {
        $appartments = $this->repository->getAll();
        $this->render('appartments/appartments.html.twig', ['appartments' => $appartments]);
    }
    public function createAppartment() {
        $this->render('appartments/appartment-create.html.twig');
    }
    public function addAppartment(){
        $this->repository->create();
        header('Location: /');
        exit;
    }
}