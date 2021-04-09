<html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>ESBL</title>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
     <script src="//localhost/esbl/scripts/jquery.blockUI.js"></script>
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
  <script src="//localhost/esbl/scripts/jquery.plugin.js"></script>
<script src="//localhost/esbl/scripts/jquery.countdown.js"></script>
<script src="//localhost/esbl/scripts/jquery.challonge.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="//localhost/esbl/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="//localhost/esbl/css/carousel.css" rel="stylesheet">
    <link href="//localhost/esbl/css/screen.css" rel="stylesheet">
    <link href="//localhost/esbl/css/league-of-legends.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>

    
    
  
    
    

    
<body>
<?php

$id = $_GET['id'];

$usuario = "root";
$senha = "";
$banco_de_dados = "esbl";

$con = mysqli_connect("localhost",$usuario,$senha, $banco_de_dados) or die("Erro ao conectar no banco de dados");

$sql = mysqli_query($con, "select * from torn where id = '$id'");

$f = mysqli_fetch_array($sql);

    include "../head.php";
    include "../headg.php"; 
    
    
 
    
    
    
     echo'<iframe src="'.$f[bb].'" class="binarybeast" width="100%" height="100%" scrolling="auto" frameborder="0">
    </iframe>';
            



include "../foot.php";

?>

</body>
</html>