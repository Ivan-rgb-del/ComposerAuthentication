<?php

  namespace IvanPackage\controller;

  use IvanPackage\contract\UserContract;
  use IvanPackage\model\User;
  use IvanPackage\repository\UserRepository;

  class UserController {
    private readonly UserContract $_usercontract;

    public function __construct(UserRepository $userRepo) {
      $this->_usercontract = $userRepo;
    }

    public function register(
      $username,
      $email,
      $password
    ) {
      $newUser = new User();

      $newUser->username = $username;
      $newUser->email = $email;
      $newUser->password = $password;

      $this->_usercontract->register($newUser);
    }
  }

?>