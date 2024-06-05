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
        $data = [];

        if (isset($_SESSION['error'])) {
            $data['error'] = $_SESSION['error'];
            unset($_SESSION['error']);
        }

        $this->render('properties/properties-create.html.twig', $data);
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

    public function updateProperty() {

        $id = $_POST['id'];

        // Check if all fields are set.
        if (!isset($_POST["surface_area"], $_POST["price"], $_POST["description"], $_POST["type_property"], $_POST["type_transaction"])) {
            $_SESSION['error'] = "Tous les champs sont obligatoires.";
            header("Location: /edit-property?id=$id");
            exit;
        }

        // Check fields are not empty
        if (empty(trim($_POST["surface_area"])) || empty(trim($_POST["price"])) || empty(trim($_POST["description"])) || empty(trim($_POST["type_property"])) || empty(trim($_POST["type_transaction"]))) {
            $_SESSION['error'] = "Les champs ne peuvent pas être vides.";
            header("Location: /edit-property?id=$id");
            exit;
        }

        // Check if surface area and price fields are decimal
        if (!filter_var($_POST["surface_area"], FILTER_VALIDATE_FLOAT) || !filter_var($_POST["price"], FILTER_VALIDATE_FLOAT)) {
            $_SESSION['error'] = "Le prix et la surface doivent être des nombres décimaux valides.";
            header("Location: /edit-property?id=$id");
            return;
        }

        $this->repository->update();
        header('Location: /');
        exit;
    }

    public function deleteProperty($id) {
        $this->repository->delete($id);
        header('Location: /');
        exit;
    }

    public function getAllProperties() {
        return $this->repository->getAll();
    }
}