<?php

  require_once "../repository/UserRepository.php";
  require_once "../controller/UserController.php";

  $userRepo = new UserRepository();
  $userController = new UserController($userRepo);

  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $userController->register($username, $email, $password);

?>