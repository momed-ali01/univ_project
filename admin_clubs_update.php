<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Boostrap Link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Ajouter Club</title>
</head>

<body>
  <?php require 'db_config.php';
  $id = $_GET['id'];
  $query = mysqli_query($conn, "SELECT * FROM clubs WHERE id_club = $id");
  $row = mysqli_fetch_row($query);
  ?>
  <div class="container my-5 ">
    <h2 class="h3 m-0 text-center ">Ajouter un nouveau club</h2>
    <p class="text-center">Completer cet formulaire pour ajouter un nouveau club en tant administrateur</p>
    <form action="admin_clubs_update.php?id=<?=$row[0]?>" method="post">
      <div class="col-6">
        <label for="nom" class="form-label m-0">Nom</label>
        <input type="text" class="form-control" id="nom" name="nom" value="<?=$row[1]?>" required />
      </div>
      <div class="my-2">
        <a href="admin_clubs.php" class="btn btn-danger">Annuler</a>
        <input type="submit" class="btn btn-primary" name="submit" value="Modifier">
      </div>
    </form>
  </div>

</body>

</html>
<?php
include 'db_config.php';
if (isset($_POST['submit'])) {
  $id = $_GET['id'];
  $nom = $_POST['nom'];
  $query = "UPDATE clubs set `nom`= '$nom' WHERE id_club='$id'";
  if (mysqli_query($conn, $query)) {
    header('Location: admin_clubs.php?msg=club modifié avec success');
    exit();
  } else {
    echo 'Erreur: ' . mysqli_error($conn);
  }
}
mysqli_close($conn);
?>