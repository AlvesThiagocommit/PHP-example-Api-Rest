<?php
  // headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: Application/json');
  
  include_once '../../config/Database.php';
  include_once '../../models/Post.php';
  
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();
  
  // Instancia do post object
  $post = new Post($db);
  
  // Blog post query
  $result = $post->read();
  // Get row count
  $num = $result->rowCount();
  
  // checa se existe algo nos posts
  if($num > 0) {
    // Post array
    $posts_arr = array();
    $posts_arr['data'] = array();
    
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      
      $post_item = array(
        'id' => $id,
        'title' => $title,
        'body' => html_entity_decode($body),
        'author' => $author,
        'category_id' => $category_id,
        'category_name' => $category_name
        );
        
        //push
        array_push($posts_arr['data'], $post_item);
    } 
    
    // transformar o array em tipo json
    echo json_encode($post_arr);
    
  } else {
    //se nao tiver nenhum post
    echo json_encode(
      array('massage' => 'Nenhum post foi encontrado')
      );
  }
