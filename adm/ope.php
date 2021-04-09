<?php 

// session_start inicia a sessão 

session_start(); 

// as variáveis login e senha recebem os dados digitados na página anterior 
 
$admlogin = $_POST['admlogin']; 
$admpass = md5($_POST['admsenha']); 

$usuario = "root";
$senha = "";
$banco_de_dados = "esbl";

mysql_connect("localhost",$usuario,$senha) or die("Erro ao conectar no banco de dados");
mysql_select_db($banco_de_dados) or die("Erro ao selecionar o banco de dados");

// A vriavel $result pega as varias $login e $senha, faz uma pesquisa na tabela de usuarios 
 
$result = mysql_query("SELECT * FROM adm_login WHERE login = '$admlogin' AND senha = '$admpass'"); 

/* Logo abaixo temos um bloco com if e else, verificando se a variável $result foi bem sucedida, ou seja se ela estiver encontrado algum registro idêntico o seu valor será igual a 1, se não, se não tiver registros seu valor será 0. Dependendo do resultado ele redirecionará para a pagina site.php ou retornara para a pagina do formulário inicial para que se possa tentar novamente realizar o login */ 

if(mysql_num_rows ($result) > 0 ) 
    { 
    
    $_SESSION['admlogin'] = $admlogin; 
    $_SESSION['admsenha'] = $admpass; 
    header('location:index.php'); 
    
    } 

else
    { 
    unset ($_SESSION['admlogin']); 
    unset ($_SESSION['admsenha']); 
    header('location:adm_login.php'); 
    
    } 



