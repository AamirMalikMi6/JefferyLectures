<?php

require base_path('Core/Validator.php');

$config = require base_path('config.php');

$db = new Database($config['database']);

$errors = [];
// $heading = 'Create Note';

if($_SERVER['REQUEST_METHOD'] == 'POST'){


    // $validator = new Validator();

    if(!Validator::string($_POST['body'] ,1 , 1000)){

        $errors['body'] = 'A body of no more than 1000 characters is required';
    }

    // if(strlen($_POST['body']) > 1000){

    //     $errors['body'] = 'A body is not more than 1000 characters';

    // }

    if(empty($errors)){

        $db->query('INSERT INTO notes(body, user_id) VALUES (:body, :user_id)', [
            'body' => $_POST['body'],
            'user_id' => 1
           ]);

    }

}

// require 'views/notes/create.view.php';

view("notes/create.view.php", [
    'heading' => 'Create Note',
    'errors' => $errors
]);