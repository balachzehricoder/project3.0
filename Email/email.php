<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $_SESSION['recipient_email'] = $email; // Store the email in a session variable for later use
}

// Retrieve the recipient email from the session
$recipientEmail = isset($_SESSION['recipient_email']) ? $_SESSION['recipient_email'] : '';

if (!empty($recipientEmail)) {
    // Create an instance of PHPMailer class
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'phonesell7896@gmail.com'; // Replace with your Gmail email
        $mail->Password = 'ijkzkkuwqzjwyapd'; // Replace with your Gmail password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('phonesell7896@gmail.com', 'Sender');
        $mail->addAddress($email, 'Receiver');

        $mail->Subject = 'Your bill';
        $mail->Body = 'Test body';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}
?>