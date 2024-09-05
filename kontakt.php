<?php
  $email = $_POST['email'] ?? null;
  $message = $_POST['message'] ?? null;

  if (!$email || !$message) {
    die("Nisu prosleđeni svi potrebni podaci.");
  }

  $con = new mysqli('localhost', 'root', '', 'prijava');

  if ($con->connect_error) {
    die('Could not connect: ' . $con->connect_error);
  } else {
    $stmt = $con->prepare("INSERT INTO poruke (email, poruka) VALUES (?, ?)");
    if ($stmt) {
        $stmt->bind_param("ss", $email, $message);
        $stmt->execute();
        echo "Uspešno slanje";
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $con->error;
    }

    $con->close();
	echo '<p><a href="index.html">Povratak na početnu stranicu</a></p>';
  }
?>