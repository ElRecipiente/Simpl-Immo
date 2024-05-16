<?php

namespace Controllers;

use Repositories\PropertyRepository;

/**
 * Define Controller for property
 */
class PropertyController extends BaseController
{

    /**
     * @var PropertyRepository
     */
    private PropertyRepository $repository;

    /**
     *
     */
    public function __construct() {
        parent::__construct();
        $this->repository = new PropertyRepository();
    }

    /**
     * @return void
     * Get all properties and render
     */
    public function display() {
        $properties = $this->repository->getAll();
        $this->render('properties/properties.html.twig', ['properties' => $properties]);
    }

    public function addProperty() {

        $this->repository->create();
        $this->render('properties/properties.html.twig');
    }

}