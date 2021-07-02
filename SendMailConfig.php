<?php  
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require __DIR__.'/vendor/autoload.php';
    $mail = new PHPMailer(true);
    $mail->SMTPDebug = 0;                                       
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com;';                    
    $mail->SMTPAuth   = true;                             
    $mail->Username   = 'YOUR_MAIL_ID';                 
    $mail->Password   = 'YOUR_MAIL_ID_PASS';                        
    $mail->SMTPSecure = 'tls';                              
    $mail->Port       = 587;  
    $mail->setFrom($mail->Username, 'System');          
?>
