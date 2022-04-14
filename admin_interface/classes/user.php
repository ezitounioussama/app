<?php

require_once 'database.php';

class User
{
  private $conn;

  // Constructor
  public function __construct()
  {
    $database = new Database();
    $db = $database->dbConnection();
    $this->conn = $db;
  }


  // Execute queries SQL
  public function runQuery($sql)
  {
    $stmt = $this->conn->prepare($sql);
    return $stmt;
  }

  // Insert
  public function insert($name, $pass, $function, $id)
  {
    try {
      $stmt = $this->conn->prepare("INSERT INTO login (name, pass, function) VALUES(:name, :pass , :function)");
      $stmt->bindparam(":name", $name);
      $stmt->bindparam(":pass", $pass);
      $stmt->bindparam(":function", $function);
      $stmt->execute();
      return $stmt;
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }


  // Update
  public function update($name, $pass, $function, $id)
  {
    try {
      $stmt = $this->conn->prepare("UPDATE login SET name = :name, pass = :pass ,function = :function WHERE id = :id");
      $stmt->bindparam(":name", $name);
      $stmt->bindparam(":pass", $pass);
      $stmt->bindparam(":function", $function);
      $stmt->bindparam(":id", $id);
      $stmt->execute();
      return $stmt;
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }


  // Delete
  public function delete($id)
  {
    try {
      $stmt = $this->conn->prepare("DELETE FROM login WHERE id = :id");
      $stmt->bindparam(":id", $id);
      $stmt->execute();
      return $stmt;
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

  // Redirect URL method
  public function redirect($url)
  {
    header("Location: $url");
  }
}
