<?php
require_once __DIR__.'/phpmail/class.phpmailer.php';
require_once __DIR__.'/phpmail/class.smtp.php';

    function email($to, $subject, $msg)
    {
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->SMTPDebug = 0;
            $mail->Debugoutput = 'HTML';
            $mail->SMTPAuth = true;
            $mail->Host ='smtp.163.com';
            $mail->Port = '465';
            $mail->CharSet = "utf-8";
            $mail->SMTPSecure = 'ssl';
            
            //配置 
            $mail->Username = '******@163.com';
            $mail->Password = '******';
            $mail->setFrom('******@163.com', 'eson');
            
            $mail->addAddress($to);
            $mail->Subject = $subject;
            $mail->MsgHTML($msg);

            if (!$mail->send()) {
                echo "Mailer Error: " . $mail->ErrorInfo;
            } else {
                echo "Message sent!";
            }
    }

$to='834767372@qq.com';
$subject='田馥甄-2017巡回演唱会PLUS成都站';
ob_start();
require_once __DIR__.'/txt.php';
$a = ob_get_contents();
ob_end_clean();
email($to, $subject, $a);