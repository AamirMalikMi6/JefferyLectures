<?php

use Core\App;

use Core\Database;


// $config = require base_path('config.php');

// $db = new Database($config['database']);

$db =  App::resolve(Database::class);

$currentUserId = 1;


    // $heading = 'Note';


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


