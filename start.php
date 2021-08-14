<?php
require_once('Session.php');

$password = $_REQUEST['password'];
$email = $_REQUEST['email'];

$session = new Session;
$session->StartSession($email, $password);
$session->closedtSession();
