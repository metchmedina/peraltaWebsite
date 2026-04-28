<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $to = "medinametchjhon@gmail.com";
    $subject = "New Contact Inquiry from " . $_POST["first_name"] . " " . $_POST["last_name"];

    $body = "
New contact inquiry received:

First Name: " . $_POST["first_name"] . "
Last Name: " . $_POST["last_name"] . "
Email: " . $_POST["email"] . "
Phone: " . $_POST["phone"] . "
Message: " . $_POST["description"] . "
  ";

    $headers = "From: noreply@peraltadesignservices.com\r\n";
    $headers .= "Reply-To: " . $_POST["email"] . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "success";
    } else {
        echo "error";
    }
}
