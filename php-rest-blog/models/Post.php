<?php 
   Class Post {
     // DB
     private $conn;
     private $table = 'posts';
     
     // Properties da classe Post
     public $id;
     public $category_id;
     public $category_name;
     public $title;
     public $body;
     public $author;
     public $created_at;
     
     // Constructor DB
     public function __construct($db) {
       $this->conn = $db;
     }
     
     // Get Posts
     public function read() {
       // Create query
       $query = 'SELECT
             c.name as category_name,
             p.id,
             p.category_id,
             p.title,
             p.body,
             p.author,
             p.created_at
           FROM
             ' . $this->table . ' p
           LEFT JOIN
             categories c ON p.category_id = c.id
           ORDER BY
             p.created_at DESC';
             
        // statement 'prepare'
        $stmt = $this->conn->prepare($query);
       
        // execução da query
        $stmt->execute();

        return $stmt;




 }
}
