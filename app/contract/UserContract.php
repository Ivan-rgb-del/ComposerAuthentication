<?php

  interface UserContract {
    public function register(User $user);
    public function login(string $email, string $password);
  }

?>