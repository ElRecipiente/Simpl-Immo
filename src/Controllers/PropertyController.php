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

    public function createProperty()
    {
        $this->render('properties/properties-create.html.twig');
    }

    public function addProperty()
    {
        $this->repository->create();
        header('Location: /');
        exit;
    }

    public function editProperty($id) {
        $property = $this->repository->getOneById($id);
        $this->render('properties/properties-edit.html.twig', ['property' => $property]);
    }

    public function updateProperty() {
        $this->repository->update();
        header('Location: /');
        exit;
    }
}