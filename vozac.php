<?php
$valid_password = '123';

$password = $_POST['password'];

if ($password === $valid_password) {
    $servername = "localhost";
    $username = "root";
    $dbname = "prijava";

    $conn = new mysqli('localhost', 'root', '', 'prijava');

    if ($conn->connect_error) {
        die("Konekcija neuspešna: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM voznja";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Lista vožnji:</h2>";
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Telefon</th>
                    <th>Lokacija</th>
                </tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["telefon"] . "</td>
                    <td>" . $row["lokacija"] . "</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "Nema dostupnih vožnji.";
    }

    $conn->close();
    
    echo '<p><a href="voznja.html">Povratak na prijavu</a></p>';
} else {
    echo "Pogrešna lozinka!";
    echo '<p><a href="voznja.html">Povratak na prijavu</a></p>';
}
?>
