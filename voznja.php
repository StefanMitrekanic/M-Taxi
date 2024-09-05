<?php
$telefon = filter_input(INPUT_POST, 'telefon');
$lokacija = filter_input(INPUT_POST, 'lokacija');
if (!empty($telefon)) {
  if (!empty($lokacija)) {
    $host="localhost";
    $dbusername="root";
    $dbpassword="";
    $dbname="prijava";

    $conn= new mysqli ($host, $dbusername, $dbpassword, $dbname);
    if(mysqli_connect_error()){
      die('Connect Error ('.mysqli_connect_errno() .')'
      .mysqli_connect_error());
    }
    else{
      $sql = "INSERT INTO voznja(telefon, lokacija)
      values ('$telefon', '$lokacija')";
      if($conn->query($sql)) {
        echo "Vaša vožnja je potvrđena!";
		echo '<p><a href="index.html">Povratak na početnu stranicu</a></p>';
      }
      else {
        echo "Error:".$sql."<br>".$conn->error;
      }
    $conn->close();

    }

  }
  else {
    echo "Unesite vašu lokaciju";
    die();
  }

}
else {
  echo "Unesite broj telefona";
  die();
}
