<?php

session_start();

$login = $_GET['login'];
$pass = md5($_GET['senha']);


$usuario = "root";
$senha = "";
$banco_de_dados = "esbl";

$con = mysqli_connect("localhost",$usuario,$senha, $banco_de_dados) or die("Erro ao conectar no banco de dados");

$result = mysqli_query($con, "select id, login, pass, nick, img from users where login = '$login' and pass = '$pass'");

$row_cnt = $result->num_rows;

if ($row_cnt > 0)
{
    $_SESSION['login'] = $login;
    $_SESSION['senha'] = $pass;
    $_SESSION['logged'] = true;
    
    while ($obj = $result->fetch_object()) {
    
        $_SESSION['nick'] = $obj->nick;
        $_SESSION['id'] = $obj->id;
        $_SESSION['img'] = $obj->img;
    
    
}
    if ($_SESSION['img'] == '1')
    {
       echo '<div class="container-fluid top-user-loged">
      				<img id="smallimg" src="/esbl/uploads/'.$_SESSION['id'].'.png" alt="">
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
      			</div>';  
    }
    
    else
    {
        echo '<div class="container-fluid top-user-loged">
      				<img id="smallimg" src="/esbl/imgs/perfil-user.jpg" alt="">
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
      			</div>';
    }
    
}

else 
{
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    unset($_SESSION['nick']);
    unset($_SESSION['id']);
    unset($_SESSION['img']);
    $_SESSION['logged'] = false;
    
    echo "0";
}

