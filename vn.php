<?php
$nick=$_GET["nick"];
$login=$_GET["login"];
$mail = $_GET["mail"];

$usuario = "root";
$senha = "";
$banco_de_dados = "esbl";

$con = mysqli_connect("localhost",$usuario,$senha, $banco_de_dados) or die("Erro ao conectar no banco de dados");

if ($nick)
{

    $sql = mysqli_query($con, "select nick from users where nick = '$nick'");
    
   $row_cnt = $sql->num_rows;
   
   echo $row_cnt;
}

if ($login)
{
    $sql = mysqli_query($con, "select login from users where login = '$login'");
    
    $row_cnt = $sql->num_rows;
   
   echo $row_cnt;
}

if ($mail)
{
    $sql = mysqli_query($con, "select login from users where mail = '$mail'");
    
    $row_cnt = $sql->num_rows;
   
   echo $row_cnt;
}