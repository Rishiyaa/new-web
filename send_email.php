<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Include the PHPMailer library

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subject = 'Inquiry: ' . $_POST['subject'];
    $fullName = $_POST['full_name'];
    $description = $_POST['description'];

    $phpmailer = new PHPMailer(); // Create a new PHPMailer instance
    $phpmailer->isSMTP();
    $phpmailer->Host = 'smtp.gmail.com';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 587;
    $phpmailer->Username = 'rishithaamodya99@gmail.com';
    $phpmailer->Password = 'rxmcxxdzudmfwbco';

    $phpmailer->setFrom('rishithaamodya99@gmail.com', 'Sender Name'); // Set the sender
    $phpmailer->addAddress('thusharalakshan71@gmail.com', 'Recipient Name'); // Set the recipient

    $phpmailer->isHTML(true);
    $phpmailer->Subject = $subject;
    $phpmailer->Body = "Full Name: $fullName<br>Description: $description";

    if ($phpmailer->send()) {
        echo 'Email sent successfully';
    } else {
        echo 'Email could not be sent.';
    }
}
?>
