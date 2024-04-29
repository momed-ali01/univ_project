<?php
session_start();
if(!isset($_SESSION['admin_id'])) {
  header('Location: index.html');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Boostrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />

  <!-- Font Awesome link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

  <!-- Google Fonts links -->
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap" />

  <title>SpaceClubs</title>
</head>

<body>

  <?php require 'db_config.php';
  $query = mysqli_query($conn, "SELECT * FROM adherent");  ?>
  <!-- Add New Adherent -->
  <div class="modal fade" id="newMember" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add new member</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="admin_page.php" method="post">
            <div class="mb-2">
              <label for="name" class="form-label">Nom</label>
              <input type="text" class="form-control" id="name" name="nom" placeholder="James Bond" required />
            </div>

            <div class="mb-2">
              <label for="email" class="form-label">Email </label>
              <input type="email" class="form-control" id="email" name="email" placeholder="me@example.com" required />
            </div>

            <div class="mb-2">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" required />
            </div>

            <div class="mb-2">
              <label for="filiere" class="form-label">Filière</label>
              <input type="text" class="form-control" id="filiere" name="filiere" placeholder="Informatique" required />
            </div>

            <div class="mb-2">
              <label for="select-where" class="form-label">Which club do you want to integrate?</label>
              <select class="form-select" id="select-where" name="club" required>
                <option selected>Please choose one option:</option>
                <option value="1">Debate Club</option>
                <option value="2">Theater Club</option>
                <option value="3">Chess Club</option>
                <option value="4">IT Club</option>
              </select>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Ajouter Adherent</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit Adherent -->
  <div class="modal fade" id="editMember" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit member</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="admin_page.php" method="post">
            <div class="mb-2">
              <label for="name" class="form-label">Nom</label>
              <input type="text" class="form-control" id="name" name="nom" value="<?php ?>" required />
            </div>

            <div class="mb-2">
              <label for="email" class="form-label">Email </label>
              <input type="email" class="form-control" id="email" name="email" placeholder="me@example.com" required />
            </div>

            <div class="mb-2">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" required />
            </div>

            <div class="mb-2">
              <label for="filiere" class="form-label">Filière</label>
              <input type="text" class="form-control" id="filiere" name="filiere" placeholder="Informatique" required />
            </div>

            <div class="mb-2">
              <label for="select-where" class="form-label">Which club do you want to integrate?</label>
              <select class="form-select" id="select-where" name="club" required>
                <option selected>Please choose one option:</option>
                <option value="1">Debate Club</option>
                <option value="2">Theater Club</option>
                <option value="3">Chess Club</option>
                <option value="4">IT Club</option>
              </select>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Ajouter Adherent</button>
        </div>
      </div>
    </div>
  </div>

  <nav class="navbar sticky-top bg-dark border-bottom border-body mb-5" data-bs-theme="dark">
    <div class="container-fluid d-flex justify-content-between">
      <a class="navbar-brand" href="#">UD Clubs</a>

      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Members</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Clubs</a>
        </li>
      </ul>
      <a class="btn btn-primary" href="deconnexion.php">Déconnexion</a>
    </div>
  </nav>

  <main>
    <div class="container">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h2>Adhérent des clubs</h2>
          <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#newMember">
            Nouveau Adhérent
          </button>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Password</th>
                <th>Filiere</th>
                <th>Club Inscrit</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php require 'db_config.php';
              $sql = "SELECT adherent.id_adh, adherent.nom, adherent.email, adherent.mot_de_passe, adherent.filiere, clubs.nom
              FROM adherent, clubs WHERE adherent.id_adh = clubs.id_club";
              $resultat = mysqli_query($conn, $sql);
              while($row=mysqli_fetch_row($resultat)) { ?>
              <tr>
                <td><?= $row[1] ?></td>
                <td><?= $row[2] ?></td>
                <td><?= $row[3] ?></td>
                <td><?= $row[4] ?></td>
                <td><?= $row[5] ?></td>
                <td class=" text-center ">
                  <button type="button" value="<?= $row[0]?>"
                    class="editStudentBtn btn btn-success btn-sm">Edit</button>
                  <button type="button" value="<?= $row[0]?>"
                    class="deleteStudentBtn btn btn-danger btn-sm">Delete</button>
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