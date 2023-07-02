<?php

  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once('../core/initialize.php');

  $post = new Post($pdo);

  //get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  // $post->id = $data->id;  //pass the id as a json object in raw data
  $post->id = isset($_GET['id']) ? $_GET['id'] : die(); //pass the id as a param in the url

  //delete post
  if($post->delete()) {
    echo json_encode(
      array('message' => 'Post deleted.')
    );
  } else {
    echo json_encode(
      array('message' => 'Post is not deleted.')
    );
  }