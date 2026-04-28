<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $to      = "metch.m@peraltadesignservices.com";
    $subject = "New Contact Inquiry from " . htmlspecialchars($_POST["first_name"]) . " " . htmlspecialchars($_POST["last_name"]);

    $body  = "New contact inquiry received:\n\n";
    $body .= "First Name: " . htmlspecialchars($_POST["first_name"])  . "\n";
    $body .= "Last Name: "  . htmlspecialchars($_POST["last_name"])   . "\n";
    $body .= "Email: "      . htmlspecialchars($_POST["email"])       . "\n";
    $body .= "Phone: "      . htmlspecialchars($_POST["phone"])       . "\n";
    $body .= "Message:\n"   . htmlspecialchars($_POST["description"]) . "\n";

    $headers  = "From: noreply@peraltadesignservices.com\r\n";
    $headers .= "Reply-To: " . $_POST["email"] . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "success";
    } else {
        echo "error";
    }
}
?>