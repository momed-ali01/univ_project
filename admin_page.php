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

  <!-- Boostrap links -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

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
      <a class="btn btn--full" href="deconnexion.php">Déconnexion</a>
    </div>
  </header>
  <main class="container-fluid">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h2>Membres des clubs</h2>
        <button class="btn btn-primary">Add Student</button>
      </div>
      <div class="card-body"></div>
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

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

  <script src="./js/script.js"></script>
</body>

</html>