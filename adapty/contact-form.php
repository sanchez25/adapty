<?php
    /*if($_SERVER["REQUEST_METHOD"] == "POST") {
        $first_name = strip_tags(trim($_POST['first_name']));
        $last_name = strip_tags(trim($_POST['last_name']));
        $email = strip_tags(trim($_POST['email']));
        $phone = $_POST['phone'];
        $company_name = trim($_POST['company_name']);
        $company_size = $_POST['company_size'];

        if(strlen($first_name) == 0 || strlen($last_name) == 0 || strpos($email, '@') == false || empty($phone) || strlen($company_name) == 0 || empty($company_size)) {
            http_response_code(400);
            echo "Oops! There was a problem with your submission. Please complete the form and try again.";
            exit;
        }

        $recipient = "sanchez.bubnoff25@gmail.com";
        $subject = "New contact from $name";

        $email_content .= "Name: $name";
        $email_content .= "Email: $email";
        $email_content .= "Message: $message";

        $email_headers = "From: $name <$email>";

        if(mail($recipient, $subject, $email_content, $email_headers)) {
            http_response_code(200);
            echo "Thank You! Your message has been sent.";
            header('Location: /');
        } else {
            http_response_code(500);
            echo "Oops! Something went wrong and we couldn'tsend your message.";
            header('Location: /contact');
        }

    } else {
        http_response_code(403);
        echo "Therewas a problem with your submission, pleasetryagain.";
    }*/

    session_start();

    unset($_SESSION['first_name']);
    unset($_SESSION['last_name']);
    unset($_SESSION['email']);
    unset($_SESSION['phone']);
    unset($_SESSION['company_name']);
    unset($_SESSION['company_size']);

    unset($_SESSION['error_first_name']);
    unset($_SESSION['error_last_name']);
    unset($_SESSION['error_email']);
    unset($_SESSION['error_phone']);
    unset($_SESSION['error_company_name']);
    unset($_SESSION['error_company_size ']);

    unset($_SESSION['success_mail']);

    function redirect() {
        header('Location: /contact');
        exit;
    }

    $first_name = strip_tags(trim($_POST['first_name']));
    $last_name = strip_tags(trim($_POST['last_name']));
    $email = strip_tags(trim($_POST['email']));
    $phone = $_POST['phone'];
    $company_name = trim($_POST['company_name']);
    $company_size = $_POST['company_size'];

    if(strlen($first_name) <= 1) {
        $_SESSION['error_first_name'] = 'Please enter your first name';
        redirect();
    }
    else if(strlen($last_name) <= 1) {
        $_SESSION['error_last_name'] = 'Please enter your last name';
        redirect();
    }
    else if(strpos($email, '@') == false) {
        $_SESSION['error_email'] = 'Please enter a valid email address';
        redirect();
    }
    else if(empty($phone)) {
        $_SESSION['error_phone'] = 'Please enter your phone number';
        redirect();
    }    
    else if(strlen($company_name) == 0) {
        $_SESSION['error_company_name'] = 'Please enter your company name'; 
        redirect();
    }  
    else if(empty($company_size)) {
        $_SESSION['error_company_size'] = 'Please enter your company size';
        redirect();
    }
    else {
        $subject = "=?utf-8?B?".base64_encode($subject)."?=";
        $headers = "From: $email\r\nReply-to: $email\r\nContent-type:text/plain; charset=urf-8\r\n";
        mail("sanchez.bubnoff25@gmail.com", $subject, $headers );
        $_SESSION['success_mail'] = 'You have successfully sent an email';
        redirect();
    }

?>