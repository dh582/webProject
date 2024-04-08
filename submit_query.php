<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Email configuration
    $mail = new PHPMailer(true); // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com'; // Gmail SMTP server
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = 'xolovd01@gmail.com'; // Your Gmail address
        $mail->Password = 'oyredsueclghfwep'; // Your Gmail app password
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption
        $mail->Port = 587; // TCP port to connect to

        // Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('xolovd01@gmail.com'); // Add your email

        // Content
        $mail->isHTML(false); // Set email format to plain text
        $mail->Subject = "New Inquiry from $name";
        $mail->Body = "Name: $name\nEmail: $email\n\n$message";

        // Send email
        $mail->send();
        echo "Your message has been sent successfully!";
    } catch (Exception $e) {
        echo "Sorry, something went wrong. Please try again later. Error: {$mail->ErrorInfo}";
    }
} else {
    // If not a POST request, redirect back to the contact form
    header("Location: contact.html");
}



