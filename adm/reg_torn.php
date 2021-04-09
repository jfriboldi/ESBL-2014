<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $usuario = "root";
$senha = "";
$banco_de_dados = "esbl";

$con = mysqli_connect("localhost",$usuario,$senha, $banco_de_dados) or die("Erro ao conectar no banco de dados");

        
        include_once 'adm_header.php';
        
        $nome = $_POST['nome'];
        $jogo = $_POST['jogo']; 
        $dia = $_POST['dia'];
        $valor = $_POST['valor'];
        $premiacao = $_POST['premiacao'];
        $min = $_POST['min'];
        $max = $_POST['max'];
        $bb = $_POST['bb'];
        
mysqli_query($con, "INSERT INTO torn (nome, jogo, dia, valor, premiacao, min, maxi, bb) VALUES ('$nome', '$jogo', '$dia', '$valor', '$premiacao', '$min', '$max', '$bb')"); 
        header('location:torn.php');
        ?>
        
    </body>
</html>
