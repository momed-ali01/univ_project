<?php
// Include the SweetAlert2 CSS and JavaScript files
echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">';
echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';

$server = 'localhost';
$user = 'root';
$password = '';
$database = 'gestion_udclubs';


// Create connexion
$conn = mysqli_connect($server, $user, $password, $database);

// check if connexion is successfull 
if (!$conn) {
  die("Connexion échouée: " . mysqli_connect_error());
}
?>