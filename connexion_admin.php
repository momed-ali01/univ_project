<<?php 
// Start session
session_start();

// Create connexion
$conn = mysqli_connect('localhost','root','', 'gestion_udclubs') or die("Connexion to the db failed");
 
// Data to retrieve from the db
$email = strtolower($_GET['email']);
$password = $_GET['password'];
$result = mysqli_query($conn,"SELECT * FROM administrateur WHERE email='$email' AND mot_de_passe='$password'");

if (mysqli_num_rows($result) > 0) {
  // Fetch the first row 
  $row = mysqli_fetch_assoc($result);
  
  // Set session variables
   $_SESSION['admin_id'] = $row['id_admin'];
  
  // Redirect to a logged-in page or do any further processing
  header("Location: page_acceuil_admin.php");
  exit();
} else {
  echo "No user found with the given email";
}
mysqli_close($conn);
?>