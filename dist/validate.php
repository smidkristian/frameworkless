<?php
session_start();

require_once __DIR__.'/../php/mail/mail.php';

$errors = [];

if (!hash_equals($_SESSION['csrfToken'], $_POST['token'])) {
    echo 'Error! CSRF attack detected';
    // redirection to access denied page or any other logic
    exit();
}

if (!empty($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    if (empty($name)) {
        $errors[] = 'Name is required';
    }

    if (empty($email)) {
        $errors[] = 'Email is required';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email is invalid';
    }

    if (!empty($errors)) {
        $allErrors = join(", ", $errors);
        echo $allErrors;
    } else {
        $mail = new Mail( $name, $email );
        $newEmail = $mail->sendMail();
        echo $newEmail;
    }
} else {
    echo 'No data';
}