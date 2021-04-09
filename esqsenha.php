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
  
  include "head.php";
  
  
  ?>
    

    
    <div class="container-flid bg-top"></div>
    
    <div class="container-fluid bread-bg">
    	<div class="container">
    		<ol class="breadcrumb">
			  <li><a href="index.php">Home</a></li>
			  <li class="active">Esqueci Minha Senha</li>
			</ol>
    	</div>
    </div>

	<div class="container all-pages">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<h2>Esqueci minha Senha</h2>
				
					<h4>preencha o e-mail de cadastro para renovação da senha</h4>
                                        <form role="form" action="envmail.php" method="post">
					  	<div class="form-group">
					    	<input name="mail" type="email" class="form-control" id="exampleInputEmail1" placeholder="e-mail">
					  	</div>
					  	
                                            <button type="submit" class="btn btn-default btn-black">enviar</button>
                                            <p>
					</form>
				</div>
			</div>
		</div>
	

 <?php
 
 include "foot.php";
 
 ?>
</body>
</html>

