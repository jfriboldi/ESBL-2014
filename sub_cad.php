<?php

include "head.php";
include "headg.php";

    $nome           =   $_POST['nome'];
    $sobrenome      =   $_POST['sobrenome'];
    $cpf            =   $_POST['cpf'];
    $mail           =   $_POST['mail'];
    $nasc           =   $_POST['nasc'];
    $tel            =   $_POST['tel'];
    $end            =   $_POST['end'];
    $cep            =   $_POST['cep'];
    $complemento    =   $_POST['complemento'];
    $cidade         =   $_POST['cidade'];
    $num            =   $_POST['num'];
    $bairro         =   $_POST['bairro'];
    $uf             =   $_POST['uf'];
    $login          =   $_POST['login'];
    $pass           =   md5($_POST['pass']);
    $nick           =   $_POST['nick'];
    
    
$usuario = "root";
$senha = "";
$banco_de_dados = "esbl";

$con = mysqli_connect("localhost",$usuario,$senha, $banco_de_dados) or die("Erro ao conectar no banco de dados");

$sql = mysqli_query($con, "INSERT INTO users( login, pass, nick, nome, sobrenome, cpf, nasc, mail, tel, endereco, cidade, cep, num, bairro, complemento, uf) VALUES ('$login', '$pass', '$nick', '$nome', '$sobrenome', '$cpf', '$nasc', '$mail', '$tel', '$end', '$cidade', '$cep', '$num', '$bairro', '$complemento', '$uf')");   

if ($sql)
    {
        echo '<div class="container all-pages"><h2>Cadastro Efetuado</h2><p>'
    . 'Obrigado <strong>'.$nick.'</strong> por se inscrever!</div>';
    }
else {
    echo'Erro ao cadastrar ao BD';
}




include "foot.php";


