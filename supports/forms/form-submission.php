<?php
// header('Content-type: application/json');

use PHPMailer\PHPMailer\PHPMailer; //to get the class PHPMailer
use PHPMailer\PHPMailer\Exception; //to get the class Exception

require '../../vendor/autoload.php'; //to get the package
include "../../configs/database.php";
if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["message"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    $insertQuery = "INSERT INTO contact(name,email,message) VALUES('$name','$email','$message')";

    $mailSendStatus = true;
    $mailSendErrorBag = [];
    try {
        $mail = new PHPMailer(true);
        // $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host       = 'smtp.mailgun.org';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'postmaster@sandbox5e4b186375a1465b9c2c9b99501b6e60.mailgun.org';
        $mail->Password   = 'd722fcc421658720785dafdbb5b506bd-c02fd0ba-d45f5290';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom($email, $name);
        $mail->addAddress('jees1612@gmail.com');
        //$mail->addAddress('receiver2@gfg.com', 'Name');

        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body    = "
        <h1>Contact Form Submission</h1>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Message:</strong><br>$message</p>
        ";
        $mail->AltBody = 'Name: $name\nEmail: $email\nMessage:\n$message';
        $mail->send();
    } catch (Exception $e) {
        $mailSendStatus = false;
        $mailSendErrorBag[] = $mail->ErrorInfo;
    }

    if ($con->query($insertQuery) && $mailSendStatus) {
        echo json_encode([
            'status' => 200,
            'message' => "Submitted successfully",
            'data' => [],
            'errors' => []
        ]);
        exit;
    } else {
        echo json_encode([
            'status' => 500,
            'message' => "Failed to Submit",
            'data' => [],
            'errors' => $mailSendErrorBag
        ]);
        exit;
    }
    $con->close();


    //// Old method to redirect to response page

    // if($con->query($insertQuery)) 
    //     header("location:../alerts/success.php");
    // else
    //     header("location:../alerts/error-alert.php");

    // $to = "jees1612@gmail.com"; // this is your Email address
    // $from = $email; // this is the sender's Email address
    // $first_name = $name;
    // $subject = "Form submission";
    // $subject2 = "Copy of your form submission";
    // $message = $first_name . " wrote the following:" . "\n\n" . $message;
    // // $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];

    // $headers = "From:" . $from;
    // $headers2 = "From:" . $to;
    // mail($to, $subject, $message, $headers);
    // mail($from,$subject2,$message2,$headers2);
    // sends a copy of the message to the sender
    // echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.



}
