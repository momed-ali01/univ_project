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
  <?php require 'db_config.php';
  $id = $_GET['id'];
  // Use prepared statement to prevent SQL injection
  $query = "SELECT * FROM adherent WHERE id_adh = ?";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_row($result);
  mysqli_stmt_close($stmt);
  ?>
  <div class="container my-5 ">
    <h2 class="h3 m-0 text-center ">Modifier un adhérent</h2>
    <p class="text-center">Modifier à partir de cet formulaire les informations d'un adhérent en tant administrateur
    </p>
    <form action="admin_update.php?id=<?=$row[0]?>" method="post">
      <div class="row mb-2">
        <div class="col">
          <label for="first-name" class="form-label m-0">Prénom</label>
          <input type="text" class="form-control" id="firstname" name="first_name" value="<?=$row[1]?>" required />
        </div>

        <div class="col">
          <label for="last-name" class="form-label m-0">Nom</label>
          <input type="text" class="form-control" id="last-name" name="last_name" value="<?=$row[2]?>" required />
        </div>
      </div>

      <div class="row mb-2">
        <div class="col">
          <label for="email" class="form-label m-0">Email </label>
          <input type="email" class="form-control" id="email" name="email" value="<?=$row[3]?>" required />
        </div>

        <div class="col">
          <label for="filiere" class="form-label m-0">Filière</label>
          <input type="text" class="form-control" id="filiere" name="filiere" value="<?=$row[4]?>" required />
        </div>
      </div>

      <div class="my-3">
        <label for="select-where">Quel club souhaitez-vous intégrer?</label>
        <select id="select-where" class="form-select" name="club" required>
          <option selected>Veuillez choisir une option:</option>
          <?php require 'db_config.php';
              $query = mysqli_query($conn, "SELECT * from clubs");
              while($result = mysqli_fetch_row($query)){ ?>
          <option value="<?=$result[0]?>"><?=$result[1]?></option>
          <?php } ?>
        </select>
      </div>

      <div class="my-2">
        <a href="admin_page.php" class="btn btn-danger">Annuler</a>
        <input type="submit" class="btn btn-primary" name="submit" value="Modifier">
      </div>
    </form>
  </div>

</body>

</html>
<?php require 'db_config.php';
if (isset($_POST['submit'])) {
  $id = $_GET['id'];
  $prenom = $_POST['first_name'];
  $nom = $_POST['last_name'];
  $email = strtolower($_POST['email']);
  $filiere = strtoupper($_POST['filiere']);
  $club = $_POST['club'];

  // Use prepared statement to prevent SQL injection
  $query = "UPDATE `adherent` SET `prenom`=?,`nom`=?,`email`=?,`filiere`=?,`id_club`=? WHERE `id_adh`= ?";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "ssssii", $prenom, $nom, $email, $filiere, $club, $id);
  
  if (mysqli_stmt_execute($stmt)) {
    header('Location: admin_page.php?msg=adhérent modifié avec success');
    exit();
  } else {
    echo 'Erreur: ' . mysqli_error($conn);
  }
  mysqli_stmt_close($stmt);
}
mysqli_close($conn);
?>