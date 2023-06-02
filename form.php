<?php

$errors = [];
$errorMessage = '';

/*if (!empty($_POST)) {
   $fname = $_POST['first-name'];
   $lname = $_POST['last-name'];
   $email = $_POST['email-address'];
   $message = $_POST['description'];
  
   if (empty($fname)) {
       $errors[] = 'Name is empty';
   }

   if (empty($lname)) {
       $errors[] = 'Name is empty';
   }

   if (empty($email)) {
       $errors[] = 'Email is empty';
   } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $errors[] = 'Email is invalid';
   }

   if (empty($message)) {
       $errors[] = 'Message is empty';
   }

   if (!empty($errors)) {
       $toEmail = 'krugermaria@outlook.com';
       $emailSubject = 'You have received an email from your contact form';
       $headers = ['From' => $email, 'Reply-To' => $email, 'Context-type' => 'text/html; charset=utf-8'];
       $description = ["Name: {$fname}", "Email: {$email}", "Enquiry:", $message];
       $body = join(PHP_EOL, $description);

     if (mail($toEmail, $emailSubject, $body, $headers))
       header('Location: thank-you.html');
    }  else {
        $errorMessage = 'The form has not been submitted. Please check your entry.';
    } 
   } else {
       $allErrors = join('<br/>', $errors);
       $errorMessage = "<p style= color: red;'>{$allErrors}</p>";
   }*/


var_dump($_POST);

$fnameErr = $lnameErr = $emailErr = $descriptionErr = "";
$fname = $lname = $email = $description = "";
$successMessage = "Success! You have submitted the form and it will be received shortly.";
$request_method = strtoupper(getenv('REQUEST_METHOD'));$http_methods = array('GET', 'POST', 'HEAD');

$_POST['first-name'] = $fname;
$_POST['last-name'] = $lname;
$_POST['email'] = $email;
$_POST['description']= $description;

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
    
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            //check the email format
             if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
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
    $mailFrom = $_POST['email'];
    $message = $_POST['description'];

    $mailTo = "krugermaria@outlook.com";
    $headers = ['From' => $email, 'Reply-To' => $email, 'Context-type' => 'text/html; charset=utf-8'];
    $subject = "Message from website";
    $txt = "You have received an email from ".$name. ".\n\n".$message;

    echo $successMessage;

    mail($mailTo, $subject, $txt, $headers);
    header("Location: form.php?mailsend");//to get a confirmation that the mail has been sent//
} else {
    echo 'The form has not been submitted. Please check your entry.';
}
?>