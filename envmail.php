<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>ESBL</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet">
    <link href="css/screen.css" rel="stylesheet">
    <link href="css/league-of-legends.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    
   
</head>
<body>
  <?php 
  $mail = $_POST['mail'];
  include "head.php";
  
  
$usuario = "root";
$senha = "";
$banco_de_dados = "esbl";

$con = mysqli_connect("localhost",$usuario,$senha, $banco_de_dados) or die("Erro ao conectar no banco de dados");

$sql = mysqli_query($con, "select * from users where mail = '$mail'");
  
$row_cnt = $sql->num_rows;


echo '<div class="container-flid bg-top"></div>
    
    <div class="container-fluid bread-bg">
    	<div class="container">
    		<ol class="breadcrumb">
			  <li><a href="index.php">Home</a></li>
			  <li class="active">Esqueci Minha Senha</li>
			</ol>
    	</div>
            </div>';

if ($row_cnt == 0)
{
    
    echo'<div class="container all-pages">
		<div class="row">
			<div class="col-md-12 col-sm-12">
                        
                        <h4>E-mail não encontrado</h4>
                        <p>
                            Por favor verifique o e-mail digitado!
                        <p>
                        <p>
                        <p>
                        </div>
			</div>
		</div>

';
    
}
 else {
    
$token = md5(uniqid(""));



mysqli_query($con, "update users set token = '$token' where mail = '$mail'");




$to       = $mail;
$subject  = 'Renovação de Senha';
$message  = "Olá,\r\n foi solicitado uma renovação de senha no site www.esbl.com.br, caso não foi você que fez essa ação, por favor a ignore.\r\nSiga o link abaixo para criar uma nova senha:\r\npc-boss/esbl/renova.php?t=$token";

    $headers  = 'From: kebramone@gmail.com' . "\r\n" .
            'Reply-To: kebramone@gmail.com' . "\r\n" .
            'MIME-Version: 1.0' . "\r\n" .
            'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
if(mail($to, $subject, $message, $headers)) {
    echo "Email sent";
}
    
else {
    echo "Email sending failed";

     
 }
 }
   
 include "foot.php";
 
 ?>
</body>
</html>
