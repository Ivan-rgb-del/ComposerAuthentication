<?php

  namespace IvanPackage\repository;

  use IvanPackage\database\Base;
  use IvanPackage\contract\UserContract;
  use IvanPackage\model\User;
  use Exception;

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

    public function login(string $email, string $password)
    {
      $email = $this->conn->real_escape_string($email);
      $password = $this->conn->real_escape_string($password);

      $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
      $stmt->bind_param("ss", $email, $password);
      $stmt->execute();
      $result = $stmt->get_result();

      if ($result->num_rows === 0) {
        die("Invalid email or password");
      }

      $user = $result->fetch_assoc();
      return $user;
    }
  }

?>