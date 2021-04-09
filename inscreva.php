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
    
    <script>
    function confLogin1()
        {
           var login = document.getElementById("exampleInputEmail1").value;
           var senha = document.getElementById("exampleInputPassword1").value;
           
            
            $.get( "/esbl/ver_user.php?login=" + login +"&senha=" + senha, function( data ) {
                if (data === "0")
                {
                    alert("Senha invalida");
                }
                else
                {
                    window.open('/esbl/lol/torneios.php','_self',false);
                }
            });
        }
    </script>
</head>
<body>
  <?php 
  
  include "head.php";
  include "headg.php"
  
  ?>
    

    
    <div class="container-flid bg-top"></div>
    
    <div class="container-fluid bread-bg">
    	<div class="container">
    		<ol class="breadcrumb">
			  <li><a href="index.php">Home</a></li>
			  <li class="active">Identificação</li>
			</ol>
    	</div>
    </div>

	<div class="container all-pages">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<h2>Identificação</h2>
				<div class="col-md-6 col-sm-6">
					<h4>não tenho cadastro</h4>
					<p>Para se inscrever e participar de campeonatos na ESBL é necessário ter um cadastro como capitão e ser o administrador do time. Para isso é necessário ter um cadastro válido e também por questões de segurnaça para pagamento. Este cadastro só será feito uma vez e irá adiantar nas suas próximas inscrições.</p>
					<a href="cadastro.php" class="btn btn-default btn-black">criar cadastro</a>
					<a href="" class="btn btn-default btn-black">facebook login</a>
				</div>
				<div class="col-md-6 col-sm-6 left-6">
					<h4>já tenho cadastro</h4>
					<form role="form">
					  	<div class="form-group">
					    	<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Login">
					  	</div>
					  	<div class="form-group">
					    	<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
					  	</div>
                                            <button type="submit" class="btn btn-default btn-black" onClick="confLogin1(); return false;">login</button>
					</form>
				</div>
			</div>
		</div>
	</div>

 <?php
 
 include "foot.php";
 
 ?>
</body>
</html>
