<?php


$torneioid = $_POST['torneioid'];
$cap = $_POST['cap']; 
$top  =  $_POST['top'];
$mail_top = $_POST['mail_top'];
$jg = $_POST['jg'];
$mail_jg = $_POST['mail_jg'];
$mid = $_POST['mid'];
$mail_mid = $_POST['mail_mid'];
$adc = $_POST['adc'];
$mail_adc = $_POST['mail_adc'];
$sup = $_POST['sup'];
$mail_sup = $_POST['mail_sup'];
$res1 = $_POST['res1'];
$mail_res1 = $_POST['mail_res1'];
$res2 = $_POST['res2'];
$mail_res2 = $_POST['mail_res2'];
$teamname = $_POST['teamname'];
$userid = $_POST['userid'];


if ($res1 == '')
{
    $res1 = 'null';
}
if ($res2 == '')
{
    $res2 = 'null';
}

$usuario = "root";
$senha = "";
$banco_de_dados = "esbl";

$con = mysqli_connect("localhost",$usuario,$senha, $banco_de_dados) or die("Erro ao conectar no banco de dados");

mysqli_query($con, "INSERT INTO instorn_al (userid, torneioid, cap, teamname, top, mail_top, jg, mail_jg, mid, mail_mid, adc, mail_adc, sup, mail_sup, res1, mail_res1, res2, mail_res2) VALUES ('$userid', '$torneioid', '$cap', '$teamname', '$top', '$mail_top', '$jg', '$mail_jg', '$mid', '$mail_mid', '$adc', '$mail_adc', '$sup', '$mail_sup', '$res1', '$mail_res1', '$res2', '$mail_res2')"); 
mysqli_query($con, "UPDATE users SET nicklol = '$cap' WHERE id = '$userid'");



$to       = $mail_top;
$subject  = 'Cadastro em Torneio no www.esbl.com.br';
$message  = "Olá '.$top.',". "\r\n" . " seu e-mail foi informado no cadastro de uma equipe em um torneio de League of Legends no site www.esbl.com.br ."."\r\n"."para acompanhar a sua equipe, e poder ter maiores informações sobre o site ou sobre o andamento do torneio, aconselhamos a se cadastrar em nosso site. Através do seguinte LINK";
$message = wordwrap($message, 70);
    $headers  = 'From: kebramone@gmail.com' . "\r\n" .
            'Reply-To: kebramone@gmail.com' . "\r\n" .
            'MIME-Version: 1.0' . "\r\n" .
            'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);
    
    $to       = $mail_jg;
    $subject  = 'Cadastro em Torneio no www.esbl.com.br';
    $message  = "Olá '.$jg.',". "\r\n" . " seu e-mail foi informado no cadastro de uma equipe em um torneio de League of Legends no site www.esbl.com.br ."."\r\n"."para acompanhar a sua equipe, e poder ter maiores informações sobre o site ou sobre o andamento do torneio, aconselhamos a se cadastrar em nosso site. Através do seguinte LINK";
    $message = wordwrap($message, 70);
    $headers  = 'From: kebramone@gmail.com' . "\r\n" .
            'Reply-To: kebramone@gmail.com' . "\r\n" .
            'MIME-Version: 1.0' . "\r\n" .
            'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);
    
    $to       = $mail_mid;
$subject  = 'Cadastro em Torneio no www.esbl.com.br';
$message  = "Olá '.$mid.',". "\r\n" . " seu e-mail foi informado no cadastro de uma equipe em um torneio de League of Legends no site www.esbl.com.br ."."\r\n"."para acompanhar a sua equipe, e poder ter maiores informações sobre o site ou sobre o andamento do torneio, aconselhamos a se cadastrar em nosso site. Através do seguinte LINK";
$message = wordwrap($message, 70);
    $headers  = 'From: kebramone@gmail.com' . "\r\n" .
            'Reply-To: kebramone@gmail.com' . "\r\n" .
            'MIME-Version: 1.0' . "\r\n" .
            'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);
    
    $to       = $mail_adc;
$subject  = 'Cadastro em Torneio no www.esbl.com.br';
$message  = "Olá '.$adc.',". "\r\n" . " seu e-mail foi informado no cadastro de uma equipe em um torneio de League of Legends no site www.esbl.com.br ."."\r\n"."para acompanhar a sua equipe, e poder ter maiores informações sobre o site ou sobre o andamento do torneio, aconselhamos a se cadastrar em nosso site. Através do seguinte LINK";
$message = wordwrap($message, 70);
    $headers  = 'From: kebramone@gmail.com' . "\r\n" .
            'Reply-To: kebramone@gmail.com' . "\r\n" .
            'MIME-Version: 1.0' . "\r\n" .
            'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);
    
    $to       = $mail_sup;
$subject  = 'Cadastro em Torneio no www.esbl.com.br';
$message  = "Olá '.$sup.',". "\r\n" . " seu e-mail foi informado no cadastro de uma equipe em um torneio de League of Legends no site www.esbl.com.br ."."\r\n"."para acompanhar a sua equipe, e poder ter maiores informações sobre o site ou sobre o andamento do torneio, aconselhamos a se cadastrar em nosso site. Através do seguinte LINK";
$message = wordwrap($message, 70);
    $headers  = 'From: kebramone@gmail.com' . "\r\n" .
            'Reply-To: kebramone@gmail.com' . "\r\n" .
            'MIME-Version: 1.0' . "\r\n" .
            'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);