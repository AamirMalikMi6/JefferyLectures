<?php

require 'functions.php';
// require 'Tasks/task1.php';
require 'Database.php';
// require 'router.php';

//connect to the database
$config = require('config.php');




$db = new Database($config['database']);

$id = $_GET['id'];

$query = "select * from posts where id=:id";

$posts = $db->query($query, [':id' => $id])->fetch();
// foreach ($posts as $post){
//     echo "<li>" . $post['title'] ."</li>";
// }

dd($posts);



    
