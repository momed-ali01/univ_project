<?php
require_once 'db_config.php';
$id = $_GET['id'];

$query = "DELETE FROM adherent WHERE id_adh = $id";

if (mysqli_query($conn, $query)) {
  header('Location: admin_page.php?msg=adhérent supprimé avec success');
  exit();
} else {
  echo 'Erreur: ' . mysqli_error($conn);
}
mysqli_close($conn);
?>