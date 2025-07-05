<?php 
session_start();
include 'db_config.php';
 
// Data to retrieve from the db
$email = strtolower($_GET['email']);
$password = $_GET['password'];

// Use prepared statement to prevent SQL injection
$query = "SELECT * FROM administrateur WHERE email=? AND mot_de_passe=?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "ss", $email, $password);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {
  // Fetch the first row 
  $row = mysqli_fetch_assoc($result);
  
  // Set session variables
   $_SESSION['identifiant_admin'] = $row['id_admin'];
  
  // Redirect to a logged-in page or do any further processing
  header("location:admin_page.php");
  exit();
} else {
  echo "<h2>Email ou password incorrecte</h2>";
  echo "<a href='./index.html'>Retour a la page d'accueuil</a>";
}
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>