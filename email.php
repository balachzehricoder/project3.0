<?php

/* 
	https://github.com/PHPMailer/PHPMailer

	Download PHPMailer, open the zip file and extract the folder to your project directory.

	Rename the extracted directory to PHPMailer and write the below code inside of your php script (the script must be outside of the PHPMailer folder)
*/


// PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception;
// Base files 
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
// create object of PHPMailer class with boolean parameter which sets/unsets exception.
$mail = new PHPMailer(true);                              
try {
    $mail->isSMTP(); // using SMTP protocol                                     
    $mail->Host = 'smtp.gmail.com'; // SMTP host as gmail 
    $mail->SMTPAuth = true;  // enable smtp authentication                             
    $mail->Username = 'phonesell7896@gmail.com';  // sender gmail host              
    $mail->Password = 'udrdzgdacirugtim'; // sender gmail host password                          
    $mail->SMTPSecure = 'tls';  // for encrypted connection                           
    $mail->Port = 587;   // port for SMTP     

    $mail->setFrom('phonesell7896@gmail.com', "Sender"); // sender's email and name
    $mail->addAddress('balachzehr7@gmail.com', "Receiver");  // receiver's email and name

    $mail->Subject = 'your bill';
    $mail->Body    = 'Test body';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) { // handle error.
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>