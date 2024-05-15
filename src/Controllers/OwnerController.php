<?php

namespace Controllers;

use Models\Owner;
use Repositories\OwnerRepository;

/**
 * Define Controller for Owner
 */
class OwnerController extends BaseController
{

    /**
     * @var OwnerRepository
     */
    private OwnerRepository $repository;

    /**
     * @var Owner
     */
    private Owner $model;

    /**
     *
     */
    public function __construct() {
        parent::__construct();
        $this->model = new Owner();
        $this->repository = new OwnerRepository();
    }

    /**
     * @return void
     * Get all properties and render
     */
    public function display() {
        $owners = $this->repository->getAll();
        $this->render('owners/owners.html.twig', ['owners' => $owners]);
    }

}