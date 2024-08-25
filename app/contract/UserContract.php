<?php

  namespace IvanPackage\contract;
  use IvanPackage\model\User;

  interface UserContract {
    public function register(User $user);
  }

?>