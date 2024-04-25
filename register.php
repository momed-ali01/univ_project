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
</head>

<body>
  <header class="header">
    <div class="logo">
      <a href="#">SpaceLogo</a>
    </div>
    <nav id="main-nav">
      <ul>
        <li><a class="main-nav-link" href="index.html">Home</a></li>
        <li><a class="main-nav-link" href="#">About</a></li>
        <li><a class="main-nav-link" href="#">Testimonials</a></li>
        <li><a class="main-nav-link" href="#">Contact us</a></li>
      </ul>
    </nav>
    <div class="cta-buttons">
      <a class="btn btn--form" href="register.php">Register</a>
      <a class="btn btn--full btn--show-modal" href="#">Connexion</a>
    </div>
  </header>

  <main class="section-cta">
    <div class="cta">
      <div class="cta-text-box">
        <h2 class="heading-secondary">Register to a club now!</h2>

        <form class="cta-form" action="register.php" method="post">
          <div>
            <label for="full-name">Full Name</label>
            <input type="text" id="full-name" name="full-name" placeholder="James Bond" required />
          </div>

          <div>
            <label for="email">Email </label>
            <input type="email" id="email" name="email" placeholder="me@example.com" required />
          </div>

          <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="James Bond" required />
          </div>

          <div>
            <label for="filiere">Filière</label>
            <input type="text" id="filiere" name="filiere" placeholder="Informatique" required />
          </div>

          <div>
            <label for="select-where">Which club do you want to integrate?</label>
            <select id="select-where" name="club" required>
              <option selected>Please choose one option:</option>
              <option value="Debate Club">Debate Club</option>
              <option value="Theater Club">Theater Club</option>
              <option value="Chess Club">Chess Club</option>
              <option value="IT Club">IT Club</option>
            </select>
          </div>

          <input type="submit" class="btn btn--form" name="signup" value="Sign up now">

          <!-- <input type="checkbox" />
                <input type="number" /> -->
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
  <script src="js/script.js"></script>
</body>

</html>
<?php
require('dbcon.php');
if (isset($_POST['signup'])) {

  // Data to insert to the db
  $fullName = $_POST['full-name'];
  $email = strtolower($_POST['email']);
  $password = $_POST['password'];
  $filiere = strtoupper($_POST['filiere']);
  $club = $_POST['club'];

  try{
    $query = "INSERT INTO client VALUES ('','$fullName','$email','$password','$filiere','$club')";

    if (mysqli_query($con, $query)) {
      // Display a success pop-up message
      echo '<script>';
      echo 'Swal.fire("Success!", "Registration successful!", "success");';
      echo '</script>';
  } else {
      echo "Erreur lors de l'insertion : " . mysqli_error($query);
  }

  } catch(mysqli_sql_exception) {
    echo '<script>';
    echo 'Swal.fire("Error!", "Registration failed!", "error");';
    // echo 'Swal.fire({
    //         icon: "error",
    //         title: "Oops...",
    //         text: "Something went wrong!"
    //         text: "Registration failed!"
    //       });';
    echo '</script>';
    // echo 'Error : ' . mysqli_error;
  }
}
mysqli_close($con);
?>