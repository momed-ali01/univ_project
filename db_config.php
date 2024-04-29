<?php
$conn = mysqli_connect('localhost','root','', 'udclubs_db');
if(!$conn) {
die("Connexion to the DB failed" . mysqli_connect_error());
} 