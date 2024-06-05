<?php

namespace Controllers;

class Middleware {

    public function isPropertyCreateSecure()
    {
        // Check if all fields are set.
        if (!isset($_POST["surface_area"], $_POST["price"], $_POST["description"], $_POST["type_property"], $_POST["type_transaction"])) {
            $_SESSION['error'] = "Tous les champs sont obligatoires.";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }

        // Check fields are not empty
        if (empty(trim($_POST["surface_area"])) || empty(trim($_POST["price"])) || empty(trim($_POST["description"])) || empty(trim($_POST["type_property"])) || empty(trim($_POST["type_transaction"]))) {
            $_SESSION['error'] = "Les champs ne peuvent pas être vides.";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }

        // Check if surface area and price fields are decimal
        if (!filter_var($_POST["surface_area"], FILTER_VALIDATE_FLOAT) || !filter_var($_POST["price"], FILTER_VALIDATE_FLOAT)) {
            $_SESSION['error'] = "Le prix et la surface doivent être des nombres décimaux valides.";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }

        return true;

    }

    public function isAppartmentCreateSecure() {

        // Check if all fields are set
        if (!isset($_POST["a_room_number"], $_POST["a_bedroom_number"], $_POST["garden"])) {
            $_SESSION['error'] = "Tous les champs sont obligatoires(BIS).";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }

        if (empty(trim($_POST["a_room_number"])) || empty(trim($_POST["a_bedroom_number"])) || empty(trim($_POST["garden"]))) {
            $_SESSION['error'] = "Les champs ne peuvent pas être vides(BIS).";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }

        if (!filter_var($_POST["a_room_number"], FILTER_VALIDATE_INT) || !filter_var($_POST["a_bedroom_number"], FILTER_VALIDATE_INT)) {
            $_SESSION['error'] = "Le nombre de pièces et de chambres doit être un nombre valide.";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }

        return true;

    }

    public function isHouseCreateSecure() {

        // Check if all fields are set
        if (!isset($_POST["room_number"], $_POST["bedroom_number"], $_POST["garden_size"])) {
            $_SESSION['error'] = "Tous les champs sont obligatoires(BIS).";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }

        if (empty(trim($_POST["room_number"])) || empty(trim($_POST["bedroom_number"])) || empty(trim($_POST["garden_size"]))) {
            $_SESSION['error'] = "Les champs ne peuvent pas être vides(BIS).";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }

        if (!filter_var($_POST["room_number"], FILTER_VALIDATE_INT) || !filter_var($_POST["bedroom_number"], FILTER_VALIDATE_INT)) {
            $_SESSION['error'] = "Le nombre de pièces et de chambres doit être un nombre valide.";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }

        return true;

    }

    public function isGarageCreateSecure() {

        // Check if all fields are set
        if (!isset($_POST["type"], $_POST["underground"])) {
            $_SESSION['error'] = "Tous les champs sont obligatoires(BIS).";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }

        if (empty(trim($_POST["type"])) || empty(trim($_POST["underground"]))) {
            $_SESSION['error'] = "Les champs ne peuvent pas être vides(BIS).";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }

        return true;

    }

}