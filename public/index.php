<?php
session_start();
const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'Core/functions.php';
// require 'Tasks/task1.php';
// require base_path('Core/Database.php');
// require base_path('Core/Response.php');

spl_autoload_register(function ($class){

    // Core\Database
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);


    require base_path("{$class}.php");

});

require base_path('bootstrap.php');

// require base_path('Core/router.php');

$router = new \Core\Router();
$routes = require base_path('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);

//connect to the database



// $id = $_GET['id'];

// $query = "select * from posts where id=:id";

// $posts = $db->query($query, [':id' => $id])->fetch();
// foreach ($posts as $post){
//     echo "<li>" . $post['title'] ."</li>";
// }

// dd($posts);



    
