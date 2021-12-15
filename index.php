<?php
session_start();

$page = $_GET["page"] ?? 'homepage';

include 'includes/general.php';
include 'classes/Db.php';
include ROOT_PATH . 'includes/header.php';

 include ROOT_PATH . 'includes/login.php';
 include ROOT_PATH . 'includes/registration.php';
 include ROOT_PATH . 'includes/forgotpassword.php';
 include ROOT_PATH . 'pages/' . $page . '.php';
 include ROOT_PATH . 'includes/footer.php ';