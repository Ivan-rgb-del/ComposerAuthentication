<?php

  require_once __DIR__ . "/../database/base.php";
  require_once __DIR__ . "/../contract/UserContract.php";

  class UserRepository extends Base implements UserContract {
    public function register(User $user)
    {
      $username = $this->conn->real_escape_string($user->username);
      $email = $this->conn->real_escape_string($user->email);
      $password = $this->conn->real_escape_string($user->password);

      $stmt = $this->conn->prepare(
        "INSERT INTO users (username, email, password) VALUES (?, ?, ?)"
      );

      $stmt->bind_param("sss", $username, $email, $password);

      try {
        $stmt->execute();
        $stmt->close();
      } catch(Exception $err) {
        var_dump($err);
        exit();
      }
    }
  }

?>