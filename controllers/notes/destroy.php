<?php

use Core\App;

use Core\Database;


// $config = require base_path('config.php');

// $db = new Database($config['database']);

$db =  App::resolve(Database::class);

// dd($db);

$currentUserId = 1;

    $note = $db->query('SELECT * FROM notes where id = :id', ['id' => $_POST['id']])->findOrFail();


    authorize($note['user_id'] == $currentUserId);

    // delete the current note

    // dd($_POST['id']);

    $db->query('DELETE from notes where id = :id', [

        'id' => $_POST['id']
    ]);

    header('location: /notes');
    exit();

