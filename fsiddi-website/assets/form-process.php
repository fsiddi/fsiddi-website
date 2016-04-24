<?php

$errorMSG = "";

// Email
if (empty($_POST["email"]) ) {
    $errorMSG .= "Email is required ";
} elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errorMSG .= "Email is not valid ";
} else {
    $email = $_POST["email"];
}

// Subject
if (empty($_POST["subject"])) {
    $errorMSG = "Subject is required ";
} else {
    $subject = $_POST["subject"];
}

// Message
if (empty($_POST["message"])) {
    $errorMSG .= "Message is required ";
} else {
    $message = $_POST["message"];
}


$EmailTo = "francesco.siddi@gmail.com";
$ServerSender = "contact@fsiddi.com";

// prepare email body text
$Body = "";
$Body .= $message;
$Body .= "\n";

$Headers = "From: " . $ServerSender . "\r\n";
$Headers .= "Reply-To: " . $email . "\r\n";

// send email
$success = mail($EmailTo, $subject, $Body, $Headers);

// redirect to success page
if ($success && $errorMSG == ""){
   echo "success";
}else{
    if($errorMSG == ""){
        echo "Something went wrong :(";
    } else {
        echo $errorMSG;
    }
}

?>
