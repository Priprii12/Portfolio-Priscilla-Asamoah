<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load the files you just downloaded
require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
//The code onlyw orks when the button is pressed
  if(
        !empty($_POST['name'])
        && !empty($_POST['email'])
        && !empty($_POST['message'])
    ){
#Get the labels
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$name = htmlspecialchars(strip_tags(trim($_POST['name'])));
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
$message = htmlspecialchars(trim($_POST['message']));

$mail = new PHPMailer(true); // Create the mail object

    try {
        // 1. SMTP Server Settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'rainbowu124@gmail.com'; 
        $mail->Password   = 'kjlh hfsk mbos juce'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // 2. Sender & Recipient
        $mail->setFrom('rainbowu124@gmail.com', 'Portfolio Contact');
        $mail->addAddress('rainbowu124@gmail.com'); 

        // 3. The Actual Email Content
        $mail->isHTML(false); // We are sending plain text for now
        $mail->Subject = "New Portfolio Message from " . $name;
        
        // This is where we build the body of the email
        $mail->Body = "You received a new message:\n\n" .
                      "Name: $name\n" .
                      "Email: $email\n\n" .
                      "Message:\n$message";

        $mail->send();
        echo "Success! Your message has been sent.";
    } catch (Exception $e) {
    // We want to echo "Message failed" and then the specific error 
    // contained in $mail->ErrorInfo.
    echo "Message could not be sent. Mailer Error: " . $mail->ErrorInfo;
}
}
}
?>