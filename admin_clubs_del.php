<?php
require_once 'db_config.php';
$id = $_GET['id'];

$query = "DELETE FROM clubs WHERE id_club = $id";

if (mysqli_query($conn, $query)) {
  header('Location: admin_clubs.php?msg=club supprimé avec success');
  exit();
} else {
  echo 'Erreur: ' . mysqli_error($conn);
}
mysqli_close($conn);
?>