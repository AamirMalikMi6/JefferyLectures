<?php

use Core\App;

use Core\Database;

// $config = require base_path('config.php');

// $db = new Database($config['database']);

$db =  App::resolve(Database::class);


// $heading = 'My Notes';

$notes = $db->query('SELECT * FROM notes where user_id = 1')->get();

// dd($notes);


// require "views/notes/index.view.php";

view("notes/index.view.php", [
    'heading' => 'My Notes',
    'notes' => $notes
]);