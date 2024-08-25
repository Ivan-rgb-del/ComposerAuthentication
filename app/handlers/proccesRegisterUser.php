<?php

  require_once __DIR__ . "/../../vendor/autoload.php";

  use IvanPackage\controller\UserController;
  use IvanPackage\repository\UserRepository;

  $userRepo = new UserRepository();
  $userController = new UserController($userRepo);

  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $userController->register($username, $email, $password);

?>