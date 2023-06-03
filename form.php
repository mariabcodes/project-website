<?php

$errors = [];
$errorMessage = '';

//var_dump($_POST);

$fnameErr = $lnameErr = $emailErr = $descriptionErr = "";
$fname = $lname = $mailFrom = $description = "";
$successMessage = "Success! You have submitted the form and it will be received shortly.";
$request_method = strtoupper(getenv('REQUEST_METHOD'));
$http_methods = array('GET', 'POST', 'HEAD');

function test_input($data) {
    $data = trim($data);
    return $data;
}

if (in_array($request_method, $http_methods)) {
    if($request_method == "POST") {
        //this checks that the variable is not empty//
        if (empty($_POST["first-name"])) {
            $fnameErr = "First name is required";
        } else {
            $fname = test_input($_POST["first-name"]);
            //check name format - only letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
                $fnameErr = "Only letters and white space allowed";
           }
        }
    
        if (empty($_POST["last-name"])) {
            $lnameErr = "Last name is required";
        } else {
            $lname = test_input($_POST["last-name"]);
            //check name format - only letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/",$lname)) {
                $lnameErr = "Only letters and white space allowed";
           }
        } 
    
        if (empty($_POST["email-address"])) {
            $emailErr = "Email is required";
        } else {
            $mailFrom = test_input($_POST["email-address"]);
            //check the email format
             if (!filter_var($mailFrom, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        } 
    
        if (empty($_POST["description"])) {
            $descriptionErr = "Enquiry is required";
        } else {
            $description = test_input($_POST["description"]);
        } 
    } 
}

if (isset($_POST['submit-btn'])) {
    $fname = $_POST['first-name'];
    $lname = $_POST['last-name'];
    $mailFrom = $_POST['email-address'];
    $description = $_POST['description'];

    $to = "krugermaria@outlook.com";

    $subject = "Message from website";

    $message = "You have received an email from ".$fname. "".$lname."\r\n".$description;
    $message = wordwrap($message, 70, "\r\n");

    $additional_headers = 'From: {$fname} {$mailFrom}' ."\r\n";
    $additional_headers .= 'Reply-To: "$mailFrom'. "\r\n";
    $additional_headers .= 'Content-type: text/html; charset=utf-8';

    echo $successMessage;

    mail($to, $subject, $message, $additional_headers);
      /*header("Location: form.php?mailsend");//to get a confirmation that the mail has been sent//*/
} else {
    echo 'The form has not been submitted. Please check your entry.';
}
?>