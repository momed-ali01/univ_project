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

  <div class="container my-5 ">
    <h2 class="h3 m-0 text-center ">Ajouter un nouveau club</h2>
    <p class="text-center">Completer cet formulaire pour ajouter un nouveau club en tant administrateur</p>
    <form action="admin_clubs_add.php" method="post">
      <div class="col-6">
        <label for="nom" class="form-label m-0">Nom</label>
        <input type="text" class="form-control" id="nom" name="nom" required />
      </div>
      <div class="my-2">
        <a href="admin_clubs.php" class="btn btn-danger">Annuler</a>
        <input type="submit" class="btn btn-primary" name="submit" value="Ajouter">
      </div>
    </form>
  </div>

</body>

</html>
<?php
include 'db_config.php';
if (isset($_POST['submit'])) {
  
  $nom = $_POST['nom'];

 $query = "INSERT INTO clubs VALUES ('','$nom')";
  if (mysqli_query($conn, $query)) {
    header('Location: admin_clubs.php?msg=nouveau club ajouté avec success');
    exit();
  } else {
    echo 'Erreur: ' . mysqli_error($conn);
  }
}
mysqli_close($conn);
?>