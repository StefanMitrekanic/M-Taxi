<?php
  $email = $_POST['email'] ?? null;
  $password = $_POST['password'] ?? null;

  if (!$email || !$password) {
    die("Nisu prosleđeni svi potrebni podaci.");
  }

  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  $con = new mysqli('localhost', 'root', '', 'prijava');

  if ($con->connect_error) {
    die('Could not connect: ' . $con->connect_error);
  } else {
    $stmt = $con->prepare("INSERT INTO korisnici (email, password) VALUES (?, ?)");
    if ($stmt) {
        $stmt->bind_param("ss", $email, $hashed_password);
        $stmt->execute();
        echo "Uspešna Prijava";
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $con->error;
    }

    $con->close();
	echo '<p><a href="index.html">Povratak na početnu stranicu</a></p>';
  }
?>
