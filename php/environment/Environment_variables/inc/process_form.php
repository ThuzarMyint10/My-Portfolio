<?php
function process_form(){
    $name = trim(filter_input(INPUT_POST,'name',FILTER_SANITIZE_STRING));
    $email = trim(filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL));
    $message = trim(filter_input(INPUT_POST,'message',FILTER_SANITIZE_SPECIAL_CHARS));


    if($name == ''){
        return 'Please enter Your Name';
    }
    if($email == ''){
        return 'Invalid Email Address';
    }

    if(empty($message)){
        return 'Please enter your message';
    }
    
    $secret = getenv('SECRET_KEY');
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
    $captcha = json_decode($verifyResponse,true);
    // var_dump($captcha);

    if($captcha['success'] == false){
        return 'Enable to verify captcha';
    }



    //To Do Email
    $mail = new PHPMailer;
        
    //Tell PHPMailer to use SMTP
    $mail->isSMTP();
    //Enable SMTP debugging
    // 0 = off (for production use)
    // 1 = client messages
    // 2 = client and server messages
    $mail->SMTPDebug = getenv('SMTP_DEBUG');
    //Set the hostname of the mail server
    $mail->Host = getenv('SMTP_HOST');
    // use
    // $mail->Host = gethostbyname('smtp.gmail.com');
    // if your network does not support SMTP over IPv6
    //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
    $mail->Port = getenv('SMTP_PORT');
    //Set the encryption system to use - ssl (deprecated) or tls
    $mail->SMTPSecure = getenv('SMTP_SECURE');
    //Whether to use SMTP authentication
    $mail->SMTPAuth = getenv('SMTP_AUTH');
    //Username to use for SMTP authentication - use full email address for gmail
    $mail->Username = getenv('SMTP_USRNAME');
    //Password to use for SMTP authentication
    $mail->Password = getenv('SMTP_PASSWORD');



    //It's important not to use the submitter's address as the from address as it's forgery,
    //which will cause your messages to fail SPF checks.
    //Use an address in your own domain as the from address, put the submitter's address in a reply-to
    $mail->setFrom( getenv('SMTP_FROM'), $name);
    $mail->addReplyTo($email, $name);
    $mail->addAddress(getenv('MAILTO_EMAIL'), getenv('MAILTO_NAME'));
    $mail->Subject = 'Website Contact from' . $name;
    if ($mail->send()){
        echo $message= "Thanks for your response, I'll check it out shortly!";
    }
    
    
}
?>