<?php
use Core\App;
use Core\Database;
use Core\Validator;


$db = App::resolve(Database::class);

$email = $_POST['email'];

$password = $_POST['password'];

// validate the form inputs
// $errors = [];
// if (!Validator::email($email)) {
//     $errors['email'] = 'Please enter a valid email';
// }

// if (!Validator::string($password)) {
//     $errors['password'] = 'Please enter a valid password';
// }

// if (!empty($errors)) {
//     return view('sessions/create.view.php', [
//         'errors' => $errors
//     ]);
// }
// login users if creditals is matched
$user = $db->query('SELECT * from users where email =:email', [
    'email' => $email
])->find();

if ($user) {

    // password check

    if (password_verify($password, $user['password'])) {

        login([
            'email' => $email
        ]);

        header('location:/');
        exit();

    }

}



return view('sessions/create.view.php', [
    'errors' => [
        'email' => 'No Matching account found for that email address and password'
    ]
]);

