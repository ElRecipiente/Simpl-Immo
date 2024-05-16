<?php

namespace Controllers;

use Models\Appartment;
use Repositories\AppartmentRepository;

/**
 * Define Controller for Appartement
 */
class AppartmentController extends BaseController
{

    /**
     * @var AppartmentRepository
     */
    private AppartmentRepository $repository;

    /**
     * @var Appartment
     */
    private Appartment $model;

    /**
     *
     */
    public function __construct() {
        parent::__construct();
        $this->model = new Appartment();
        $this->repository = new AppartmentRepository();
    }

    /**
     * @return void
     * Get all properties and render
     */
    public function display() {
        $appartments = $this->repository->getAll();
        $this->render('appartments/appartments.html.twig', ['appartments' => $appartments]);
    }

}