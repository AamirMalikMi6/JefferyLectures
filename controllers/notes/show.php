<?php

$config = require base_path('config.php');

$db = new Database($config['database']);


// $heading = 'Note';

$currentUserId = 1;


$note = $db->query('SELECT * FROM notes where id = :id', ['id' => $_GET['id']])->findOrFail();


authorize($note['user_id'] == $currentUserId);

// if($note['user_id'] != $currentUserId){

//     abort(Response::FORBIDDEN);

// }

// dd($notes);


// require "views/notes/show.view.php";

view("notes/show.view.php", [
    'heading' => 'Note',
    'note' => $note
]);