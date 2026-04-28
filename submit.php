<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $to = "medinametchjhon@gmail.com";
  $subject = "New Career Application — " . $_POST["position"];

  $body = "
New application received:\n
First Name: " . $_POST["first_name"] . "
Last Name: " . $_POST["last_name"] . "
Country/Region: " . $_POST["country"] . "
Position: " . $_POST["position"] . "
English Level: " . $_POST["english_level"] . "
Email: " . $_POST["email"] . "
Phone: " . $_POST["phone"] . "
LinkedIn: " . $_POST["linkedin"] . "
  ";

  $headers = "From: noreply@peraltadesignservices.com\r\n";
  $headers .= "Reply-To: " . $_POST["email"] . "\r\n";

  if (isset($_FILES["resume"]) && $_FILES["resume"]["error"] == 0) {
    $filename = $_FILES["resume"]["name"];
    $filetype = $_FILES["resume"]["type"];
    $filedata = chunk_split(base64_encode(file_get_contents($_FILES["resume"]["tmp_name"])));
    $boundary = md5(time());

    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: multipart/mixed; boundary=\"" . $boundary . "\"\r\n";

    $message  = "--" . $boundary . "\r\n";
    $message .= "Content-Type: text/plain; charset=UTF-8\r\n\r\n";
    $message .= $body . "\r\n";
    $message .= "--" . $boundary . "\r\n";
    $message .= "Content-Type: " . $filetype . "; name=\"" . $filename . "\"\r\n";
    $message .= "Content-Transfer-Encoding: base64\r\n";
    $message .= "Content-Disposition: attachment; filename=\"" . $filename . "\"\r\n\r\n";
    $message .= $filedata . "\r\n";
    $message .= "--" . $boundary . "--";
  } else {
    $message = $body;
  }

  if (mail($to, $subject, $message, $headers)) {
    echo "success";
  } else {
    echo "error";
  }
}
