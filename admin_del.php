<?php
require_once 'db_config.php';
$id = $_GET['id'];

// Use prepared statement to prevent SQL injection
$query = "DELETE FROM adherent WHERE id_adh = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $id);

if (mysqli_stmt_execute($stmt)) {
  header('Location: admin_page.php?msg=adhérent supprimé avec success');
  exit();
} else {
  echo 'Erreur: ' . mysqli_error($conn);
}
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>