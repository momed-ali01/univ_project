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

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- Google Fonts links -->
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet" />

  <title>SpaceClubs</title>
  <link rel="stylesheet" href="./css/general.css" />
  <link rel="stylesheet" href="./css/components/header.css" />
  <link rel="stylesheet" href="./css/components/footer.css" />
  <link rel="stylesheet" href="./css/styles.css" />
</head>

<body>


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <header class="header">
    <div class="logo">
      <a href="#">UD Clubs</a>
    </div>
    <nav id="main-nav">
      <ul>
        <li><a class="main-nav-link" href="">Members</a></li>
        <li><a class="main-nav-link" href="">Clubs</a></li>
      </ul>
    </nav>
    <div class="cta-buttons">
      <a class="buton buton--full" href="deconnexion.php">Déconnexion</a>
    </div>
  </header>

  <main>
    <div class="container">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h1>Membres des clubs</h1>
          <!-- <button class="btn btn-lg btn-outline-primary">Add Student</button> -->
          <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add Student
          </button>
        </div>
        <div class="card-body"></div>
      </div>
    </div>

  </main>

  <footer>
    <p>
      Made with ☠ by
      <a href="mailto:demahomali01@gmail.com" target="_blank">Mohamed Ali</a> and
      <a href="mailto:mohamedsoma876@gmail.com" target="_blank">Mohamed Moumine</a>
    </p>
    <p>Copyrights&copy; <span id="year"></span> | Tous droits réservés.</p>
  </footer>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

  <script src="./js/script.js"></script>
</body>

</html>