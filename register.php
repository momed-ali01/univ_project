<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Always include this line of code!!! -->
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet" />

  <!-- Include the SweetAlert2 CSS and JavaScript files -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <title>SpaceClubs</title>
  <link rel="stylesheet" href="./css/general.css" />
  <link rel="stylesheet" href="./css/components/header.css" />
  <link rel="stylesheet" href="./css/components/footer.css" />
  <link rel="stylesheet" href="./css/styles.css" />

  <style>
  .toastAlert .swal2-popup {
    height: 70px;
    font-size: 17px;
    /* background: #000; */
  }

  .modalAlert .swal2-popup {
    font-size: 15px;
    /* width: 400px; */
    /* height: 300px; */
  }
  </style>

</head>

<body>
  <header class="header">
    <div class="logo">
      <a href="index.html">SpaceLogo</a>
    </div>
    <nav id="main-nav">
      <ul>
        <li><a class="main-nav-link" href="index.html">Home</a></li>
        <li><a class="main-nav-link" href="about.html">About</a></li>
        <li><a class="main-nav-link" href="contact.html">Contact us</a></li>
      </ul>
    </nav>
    <div class="cta-buttons">
      <a class="btn btn--form" href="register.php">Register</a>
      <button class="btn btn--full btn--show-modal">Connexion</button>
    </div>
  </header>

  <main class="section-cta">
    <div class="cta">
      <div class="cta-text-box">
        <h2 class="heading-secondary">Rejoignez un club maintenant!</h2>

        <form class="cta-form" action="register.php" method="post">
          <div>
            <label for="first-name">Prénom</label>
            <input type="text" id="first-name" name="first_name" placeholder="James" required />
          </div>

          <div>
            <label for="last-name">Nom</label>
            <input type="text" id="last-name" name="last_name" placeholder="Bond" required />
          </div>

          <div>
            <label for="email">Email </label>
            <input type="email" id="email" name="email" placeholder="me@example.com" required />
          </div>

          <div>
            <label for="filiere">Filière</label>
            <input type="text" id="filiere" name="filiere" placeholder="Informatique" required />
          </div>

          <div>
            <label for="select-where">Quel club souhaitez-vous intégrer?</label>
            <select id="select-where" name="club" required>
              <option selected>Veuillez choisir une option:</option>
              <?php 
              require 'db_config.php';
              $query = mysqli_query($conn, "SELECT * from clubs");
              while($result = mysqli_fetch_row($query)){ ?>
              <option value="<?=$result[0]?>"><?=$result[1]?></option>
              <?php } ?>
            </select>
          </div>
          <input type="submit" class="btn btn--form" name="signup" value="Inscrivez-vous">
        </form>
      </div>
      <div class="cta-img-box" role="img" aria-label="Woman enjoying food"></div>
    </div>
  </main>

  <footer>
    <p>
      Made with 🧡 by
      <a href="mailto:demahomali01@gmail.com" target="_blank">Mohamed Ali</a> and
      <a href="mailto:mohamedsoma876@gmail.com" target="_blank">Mohamed Moumine</a>
    </p>
    <p>Copyrights&copy; <span id="year"></span> | Tous droits réservés.</p>
  </footer>

  <div class="modal hidden">
    <button class="btn--close-modal">&times;</button>
    <h2 class="modal__header">
      Connect as an <span class="highlight">Admin</span>
    </h2>
    <form class="modal__form" action="connexion_admin.php" method="get">
      <label for="email">Email </label>
      <input type="email" id="email" name="email" />
      <label for="password">Password </label>
      <input type="password" id="password" name="password" />

      <input type="submit" class="btn--login" name="login" value="Login">
    </form>
  </div>
  <div class="overlay hidden"></div>
  <script src="./js/script.js"></script>
</body>

</html>
<?php
require 'db_config.php';
if (isset($_POST['signup'])) {
  $prenom = $_POST['first_name'];
  $nom = $_POST['last_name'];
  $email = strtolower($_POST['email']);
  $filiere = strtoupper($_POST['filiere']);
  $club = $_POST['club'];

  $query = "INSERT INTO adherent(prenom, nom, email, filiere, id_club) VALUES ('$prenom','$nom','$email','$filiere','$club')";

  if (mysqli_query($conn, $query)) {
    echo '<script> 
                Swal.fire({
                  icon: "success",
                  title: "Bravo!",
                  text: "Votre inscription a été réussie!🎉",
                  timer: 3000,
                  timerProgressBar: true,
                  customClass: {
                    container: "modalAlert",
                  }
                })
          </script>';
    } else {
      echo '<script>
              Swal.fire({
                icon: "error",
                title: ""Désolé",
                text: "Il semble y avoir eu une erreur lors de votre inscription. Veuillez réessayer plus tard. 🛠️",
                timer: 3000,
                timerProgressBar: true,
                customClass: {
                  container: "modalAlert",
                }
              })
            </script>';
  }
}
mysqli_close($conn);
?>