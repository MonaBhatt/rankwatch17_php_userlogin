<?php
include_once 'db_connect.php';
include_once 'functions.php';
session_start(); // Our custom secure way of starting a PHP session.

if (isset($_POST['email'], $_POST['p'])) {
    $email = $_POST['email'];
    $password = $_POST['p']; // The hashed password.
	$captcha = @$_POST['ct_captcha']; // the user's entry for the captcha code
	 require_once dirname(__FILE__) . '/securimage/securimage.php';
	  $securimage = new Securimage();

	 if ($securimage->check($captcha) == false) {
	   // Login failed
        header('Location: ../index.php?error=2');
	 }
    else if (login($email, $password, $mysqli) == true) {
        // Login success
        header('Location: ../protected_page.php');
    } else {
        // Login failed
        header('Location: ../index.php?error=1');
    }
} else {
    // The correct POST variables were not sent to this page.
    echo 'Invalid Request';
}