<?php
session_start();
if(!isset($_SESSION['identifiant_admin'])) {
  header('location:index.html');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Boostrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
  <title>SpaceClubs</title>
</head>

<body>
  <nav class="navbar sticky-top bg-dark border-bottom border-body mb-5" data-bs-theme="dark">
    <div class="container-fluid d-flex justify-content-between">
      <a class="navbar-brand" href="#">UD Clubs</a>

      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link text-white" href="admin_page.php">Members</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="admin_clubs.php" aria-current="page">Clubs</a>
        </li>
      </ul>
      <a class="btn btn-primary" href="deconnexion.php">Déconnexion</a>
    </div>
  </nav>

  <main>
    <div class="container">
      <?php if(isset($_GET['msg'])){
            $msg = $_GET['msg'];
            echo "<div class='alert alert-primary my-3 text-uppercase' onclick='this.remove()' role='alert'> $msg </div>";
        } ?>
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h2>Liste des Clubs</h2>
          <a href="./admin_add.php" class="btn btn-outline-primary">Nouveau Club</a>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Nombre d'adherent</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php require 'db_config.php';
              $result = mysqli_query($conn, "SELECT clubs.id_club, clubs.nom, COUNT(adherent.id_adh) FROM clubs LEFT JOIN adherent ON clubs.id_club = adherent.id_club GROUP BY clubs.nom ORDER BY clubs.id_club");
              while($row=mysqli_fetch_row($result)) { ?>
              <tr>
                <td><?= $row[0] ?></td>
                <td><?= $row[1] ?></td>
                <td><?= $row[2] ?></td>
                <td>
                  <a href="admin_clubs_update.php?id=<?=$row[0]?>" class="btn btn-success btn-sm">Modifier</a>
                  <a href="admin_clubs_del.php?id=<?=$row[0]?>" class="btn btn-danger btn-sm">Supprimer</a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>

  <footer class="navbar fixed-bottom bg-dark d-flex justify-content-between align-items-center">
    <p class=" text-light mx-5 my-0">
      Made with ☠ by
      <a href="mailto:demahomali01@gmail.com" target="_blank">Mohamed Ali</a> and
      <a href="mailto:mohamedsoma876@gmail.com" target="_blank">Mohamed Moumine</a>
    </p>
    <p class="text-light mx-5 my-0">Copyrights&copy; <span id="year"></span> | Tous droits réservés.</p>
  </footer>

  <script>
  const currentYear = new Date().getFullYear();
  document.getElementById("year").innerHTML = currentYear;
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>