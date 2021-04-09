<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php

 session_start(); 
 
 
 if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) 
     {
     $_SESSION['logged'] = false;
     unset($_SESSION['login']); 
     unset($_SESSION['senha']); 
     
     }
     else
         
     {
         $_SESSION['logged'] = true;
     }
     
  ?>


<html>
    <head>
        <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>ESBL</title>
    
    
        
        
        <script>
            
        function confLogin()
        {
           var login = document.getElementById("login").value;
           var senha = document.getElementById("senha").value;
            
            $.get( "/esbl/ver_user.php?login=" + login +"&senha=" + senha, function( data ) {
                if (data === "0")
                {
                    alert("Senha invalida");
                }
                               
                else
                {
                $('#all').html(data);
                
                }
                
                    
            });
        }
        
        function sair()
        {
            $.get( "/esbl/ver_user.php?login=0&senha=0", function( data ) {
                if (data === "0")
                {
                    $('#all').html('<div class="container-fluid">' +
      				'<form class="form-inline" role="form">' +
	      				'<div class="form-group">' +
	      					'<input type="text" class="form-control" id="login" placeholder="Login/Email">' +
	      				'</div>' +
	      				'<div class="form-group">' +
	      					'<input type="password" class="form-control" id="senha" placeholder="Senha">' +
	      				'</div>' +
	      				'<div class="form-group">' +
	      					'<button class="btn btn-default btn-black" onClick="confLogin(); return false;">ok</button>' +
	      				'</div>' +
	      			'</form>' +
	      			'<form class="form-inline" role="form">' +
	      				'<div class="form-group">' +
	      					'<input type="text" class="form-control" placeholder="Busque aqui...">' +
	      				'</div>' +
	      			'</form>' +
      			'</div>'); 
                }
            });
        }
        </script>
    </head>
    <body>
        <div class="container">
      	<div class="row top-margin">

      		<div class="col-md-3">
      			<div class="logo">
                            <a href="/esbl/index.php"><h1>ESBL</h1></a>
      			</div>
      		</div>

      		<div class="col-md-9 menu-top">
      			<div class="container-fluid">
					<a href="youtube" class="youtube">Youtube</a>
					<a href="twitter" class="twitter">Twitter</a>
					<a href="#facebook" class="facebook">Facebook</a>
					<nav role="navigation" class="navbar">
					    <ul class="nav navbar-nav navbar-right">
				            <li><a href="#">FAQ</a></li>
				            <li><a href="#">Quem Somos</a></li>
				            <li><a href="#">Contato</a></li>
				            <li><a href="/esbl/cadastro.php">Cadastre-se</a></li>
				            <li><a href="/esbl/esqsenha.php">Esqueci minha senha</a></li>
					    </ul>
					</nav>
      			</div>
<?php

if ($_SESSION['logged'] == true)
{
   echo'<div id="all"><div class="container-fluid top-user-loged">
                                <img id="smallimg" src="'; if ($_SESSION['img'] == '1') { echo '/esbl/uploads/'.$_SESSION['id'].'.png?'; } else { echo '/esbl/imgs/perfil-user.jpg'; } echo'" alt="">
      				<div class="con-user">
      					<strong>'.$_SESSION['nick'].'</strong>
                                        <span><a href="/esbl/user.php">Meu Perfil</a></span>
                                        <span><a href="" onClick="sair()">Sair</a></span>
      				</div>
	      			<form class="form-inline" role="form">
	      				<div class="form-group loged-input">
	      					<input type="text" class="form-control" placeholder="Busque aqui...">
	      				</div>
	      			</form>
      			</div>
                       </div>'; 
    
}

else
{


      			echo'<div id="all">
                            <div class="container-fluid">
      				<form class="form-inline" role="form">
	      				<div class="form-group">
	      					<input type="text" class="form-control" id="login" placeholder="Login/Email">
	      				</div>
	      				<div class="form-group">
	      					<input type="password" class="form-control" id="senha" placeholder="Senha">
	      				</div>
	      				<div class="form-group">
	      					<button class="btn btn-default btn-black" onClick="confLogin(); return false;">ok</button>
	      				</div>
	      			</form>
	      			<form class="form-inline" role="form">
	      				<div class="form-group">
	      					<input type="text" class="form-control" placeholder="Busque aqui...">
	      				</div>
	      			</form>
      			</div>
                        </div>';
                    
                    }
                   
                  
                    ?>
      		</div>
      	</div>
    </div>
    </body>
</html>


