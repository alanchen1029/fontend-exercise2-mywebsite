<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="3,url=index.html">
    <title>Document</title>
    <?php
    $result = '';
    if(isset($_POST['submit'])){
        require 'phpmailer/PHPMailerAutoload.php';

        $mail = new PHPmailer;

        //has to enable if work on localhost, disable it if online
        //$mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';

        $mail->Username = 'alanchenbaby123@gmail.com';
        $mail->Password = 'chenbaby123';

        $mail->setFrom('alanchenbaby123@gmail.com','myWeb');
        $mail->addAddress('alanchen2913@gmail.com');
        $mail->addReplyTo('alanchenbaby123@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = 'Subject: '.$_POST['subject'];
        $mail->Body = '<h2>New Message:</h2> <br> From: '.$_POST['name'].'<br>Email: '.$_POST['email'].'<br> Message: '.$_POST['message'];

        if(!$mail->send()){
            $result = 'Error, please try again';
        }else{
            $result = 'Thanks for contacting me, I will get back to you soon!';
            // echo 'send';
        }
    }
?>
</head>
<body>
    <h2 style="font-size:20px;color: #228b22"><?=$result;?></h2>
</body>
</html>
