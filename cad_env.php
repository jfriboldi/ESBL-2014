<?php
$login = $_POST['login']; 
$pass = md5($_POST['senha']);

$usuario = "root";
$senha = "";
$banco_de_dados = "esbl";

$con = mysqli_connect("localhost",$usuario,$senha, $banco_de_dados) or die("Erro ao conectar no banco de dados");



mysqli_query($con, "INSERT INTO adm_login (login, senha) VALUES ('$login', '$pass')");

header('location:adm_index.php'); 
