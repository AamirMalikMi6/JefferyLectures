<?php 

use Core\Validator;

use Core\App;

use Core\Database;

$db = App::resolve(Database::class);

$email = $_POST['email'];

$password = $_POST['password'];


// validate the form inputs
$errors = [];
if (!Validator::email($email)) {
    $errors['email'] = 'Please enter a valid email';
}

if (!Validator::string($password , 7, 15)) {
    $errors['password'] = 'Please enter a valid password between 7 and 15 characters';
}

if (!empty($errors)) {

    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}


$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email
])->find();

if ($user) {

    header('location:/');
    exit();

}else {

    $db->query('INSERT INTO users (email, password) VALUES (:email, :password)',[
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT)
    ]);

    login($user);

    header('location: /');
    exit();
}