<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Boostrap Link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <title>Ajouter adhérent</title>
</head>

<body>

  <div class="container my-5 ">
    <h2 class="h3 m-0 text-center ">Ajouter un nouveau club</h2>
    <p class="text-center">Completer cet formulaire pour ajouter un nouveau club en tant administrateur</p>
    <form action="admin_add.php" method="post">
      <div class="row mb-2">
        <div class="col">
          <label for="nom" class="form-label m-0">Nom</label>
          <input type="text" class="form-control" id="nom" name="nom" required />
        </div>

        <div class="col">
          <label for="description" class="form-label m-0">Description</label>
          <input type="text" class="form-control" id="description" name="description" required />
        </div>
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
  $description = $_POST['description'];

 $query = "INSERT INTO adherent(nom, details) VALUES ('$nom','$description')";
  if (mysqli_query($conn, $query)) {
    header('Location: admin_clubs.php?msg=nouveau club ajouté avec success');
    exit();
  } else {
    echo 'Erreur: ' . mysqli_error($conn);
  }
}
mysqli_close($conn);
?>