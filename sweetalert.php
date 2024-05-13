<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- Include the SweetAlert2 CSS and JavaScript files -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- <script src="sweetalert2.min.js"></script>
  <link rel="stylesheet" href="sweetalert2.min.css"> -->

  <script src="sweetalert2.all.min.js"></script>

  <link rel="stylesheet" href="./css/general.css">
  <style>
  body {
    display: grid;
    place-items: center;
    min-height: 100vh;
  }

  button {
    cursor: pointer;
  }

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
  <button id="clicked" class="btn btn--full">Click me</button>

  <!-- <script src="./js/script.js"></script> -->
  <script>
  const btnClicked = document.getElementById('clicked');
  btnClicked.addEventListener('click', () => {
    const Toast = Swal.mixin({
      toast: true,
      position: "bottom-start",
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: toast => {
        toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
      },
    });
    Toast.fire({
      icon: "success",
      title: "Signed in successfully",
      customClass: {
        container: "toastAlert", // Add your custom class here
      }
    });

    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Registration failed!",
      timer: 3000,
      timerProgressBar: true,
      customClass: {
        container: "modalAlert", // Add your custom class here
      }
    });

    Swal.fire({
      icon: "success",
      title: "Congrats 🎉",
      text: "Registration was successful!",
      timer: 3000,
      timerProgressBar: true,
      customClass: {
        container: "modalAlert",
      }
    })
  });
  </script>
</body>

</html>