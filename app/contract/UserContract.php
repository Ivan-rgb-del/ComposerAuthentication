<?php

  namespace IvanPackage\contract;
  use IvanPackage\model\User;

  interface UserContract {
    public function register(User $user);
    public function login(string $email, string $password);
  }

?>