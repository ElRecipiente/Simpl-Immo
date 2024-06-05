<?php
namespace Controllers;

use Repositories\UserRepository;
use Controllers\PropertyController;

class UserController extends BaseController
{
    private UserRepository $repository;
    private PropertyController $propertyController;

    public function __construct() {
        parent::__construct();
        $this->repository = new UserRepository();
        $this->propertyController = new PropertyController();
    }

    public function showLoginForm()
    {
        echo $this->render('users/user-connexion.html.twig');
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $mail = $_POST['mail'];
            $password = $_POST['password'];

            $user = $this->repository->getUserByMail($mail);

            if ($user && password_verify($password, $user->password)) {
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION['user_id'] = $user->id;
                header('Location: /dashboard');
                exit();
            } else {
                echo $this->render('users/user-connexion.html.twig', ['error' => 'Email ou mot de passe incorrect']);
            }
        } else {
            $this->showLoginForm();
        }
    }

    public function dashboard()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }

        $user = $this->repository->getUserById($_SESSION['user_id']);
        $properties = $this->propertyController->getAllProperties();

        echo $this->render('users/dashboard.html.twig', [
            'user' => $user,
            'properties' => $properties
        ]);
    }

    public function display()
    {
        $users = $this->repository->getAll();
        $this->render('users/users.html.twig', ['users' => $users]);
    }

    public function createUser()
    {
        $this->render('users/user-create.html.twig');
    }

    public function connexion()
    {
        $this->render('users/user-connexion.html.twig');
    }

    public function addUser()
    {
        $this->repository->create();
        header('Location: /');
        exit();
    }
}

