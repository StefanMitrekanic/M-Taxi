<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email = $_POST['email'] ?? null;
    $message = $_POST['message'] ?? null;

   
    if (!$email || !$message) {
        die("Nisu prosleđeni svi potrebni podaci.");
    }

    
    $to = "loznicamtaxi@gmail.com";  
    $subject = "Nova poruka sa sajta";
    $email_content = "Imate novu poruku od: $email\n\nPoruka:\n$message";
    $headers = "From: $email";  

    
    if (mail($to, $subject, $email_content, $headers)) {
        echo "Poruka je uspešno poslata!";
    } else {
        echo "Došlo je do greške prilikom slanja poruke.";
    }
}
?>
