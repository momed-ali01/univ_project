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

    <!-- Always include this line of code!!! -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap"
      rel="stylesheet" />

    <title>SpaceClubs</title>
    <link rel="stylesheet" href="./css/general.css" />
    <link rel="stylesheet" href="./css/components/header.css" />
    <link rel="stylesheet" href="./css/components/footer.css" />
    <link rel="stylesheet" href="./css/styles.css" />
  </head>
  <body>
    <header class="header">
      <div class="logo">
        <a href="#">SpaceLogo</a>
      </div>
      <nav id="main-nav">
        <ul>
          <li><a class="main-nav-link" href="index.html">Home</a></li>
          <li><a class="main-nav-link" href="#">Add Club</a></li>
          <li><a class="main-nav-link" href="#">See All Clubs</a></li>
        </ul>
      </nav>
      <div class="cta-buttons">
        <a class="btn btn--full" href="deconnexion.php">Déconnexion</a>
      </div>
    </header>

    <main class="section-hero"></main>

    <footer>
      <p>
        Made with 🧡 by
        <a href="mailto:demahomali01@gmail.com" target="_blank">Mohamed Ali</a>
      </p>
      <p>Copyrights&copy; <span id="year"></span> | Tous droits réservés.</p>
    </footer>
  </body>
</html>
