<?php

$errorMSG = "";

// NAME
if (empty($_POST["name"])) {
    $errorMSG = "Name is required ";
} else {
    $name = $_POST["name"];
}

// EMAIL
if (empty($_POST["email"]) ) {
    $errorMSG .= "Email is required ";
} elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errorMSG .= "Email is not valid ";
} else {
    $email = $_POST["email"];
}

// MESSAGE
if (empty($_POST["message"])) {
    $errorMSG .= "Message is required ";
} else {
    $message = $_POST["message"];
}


$EmailTo = "francesco.siddi@gmail.com";
$Subject = "Contact via fsiddi.com";
$ServerSender = "contact@fsiddi.com";

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $message;
$Body .= "\n";

$Headers = "From: " . $ServerSender . "\r\n";
$Headers .= "Reply-To: " . $email . "\r\n";

// send email
$success = mail($EmailTo, $Subject, $Body, $Headers);

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
