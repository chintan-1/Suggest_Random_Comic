<?php
    if(isset($SendVerificationMail)){
        require __DIR__.'/SendMailConfig.php';
        $RediretUserTOurl="'http://mailrandomcomic.000webhostapp.com/activate.php?email=".$UserName."&NewUserRegistrationToken=$VerifyNewUserToken";
        $mail->addAddress($UserName);
       
        $mail->isHTML(true);                                  
        $mail->Subject = 'Click on the link below for verification of email-id.';
        $mail->Body    = " Hi<br>
                 <a href=$RediretUserTOurl>Verification link</a><br>
                 ";
        $mail->send();
        echo "Mail has been sent successfully!";
    }
    echo "<script>
        window.location.href='http://mailrandomcomic.000webhostapp.com/index.php';
    </script>";
?>
