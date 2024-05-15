<?php

namespace Controllers;

use Models\Property;
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
     * @var Property
     */
    private Property $model;

    /**
     *
     */
    public function __construct() {
        parent::__construct();
        $this->model = new Property();
        $this->repository = new PropertyRepository();
    }

    /**
     * @return void
     * Get all properties and render
     */
    public function display() {
        $properties = $this->repository->getAll();
        $this->render('properties', ['properties' => $properties]);
    }

}