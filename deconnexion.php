<?php
session_start();
$_SESSION=array();

session_destroy();
unset($_SESSION['identifiant_admin']);

header("Cache-Control:no-store,no-cache,must-revalidate");
header('location:index.html');
exit();
?>