<?php

Class Database {
  // Parâmetros do banco de dados
  private $host = 'localhost';
  private $db_name = 'myblog';
  private $username = 'root';
  private $password = '123456';
  private $conn;



//Função para coneccao com banco de dados

public function connect() {
  $this->conn = null;
  
  
  try {
    $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_names,
    $this->username, $this->password);
    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_E);
  } catch(PDOException $e) {
    echo 'Connection Error: ' . $e->getMessage();
  }
  
  return $this->conn;
  
 }
}
