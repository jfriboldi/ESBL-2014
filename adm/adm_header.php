<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php 
 session_start(); 
 
 if((!isset ($_SESSION['admlogin']) == true) and (!isset ($_SESSION['admsenha']) == true)) 
     { 
     unset($_SESSION['admlogin']); 
     unset($_SESSION['admsenha']); 
     header('location:adm_login.php'); 
     
     }
 ?>
<html>
    <head>
        <meta charset="UTF-8">
        <script src="//localhost/esbl/scripts/jquery.min.js"></script>
    <script src="//localhost/esbl/scripts/jquery.tablesorter.js"></script>
    <script src="//localhost/esbl/scripts/jquery.tablesorter.widgets.js"></script>
	<script src="//localhost/esbl/scripts/jquery.tablesorter.pager.js"></script>
        <link rel="stylesheet" href="//localhost/esbl/css/theme.default.css">
	
	<link rel="stylesheet" type="text/css" href="//localhost/esbl/css/theme.black-ice.css">
	<link rel="stylesheet" type="text/css" href="//localhost/esbl/css/theme.blue.css">
        <link rel="stylesheet" type="text/css" href="//localhost/esbl/css/theme.dropbox.css">
	<link rel="stylesheet" type="text/css" href="//localhost/esbl/css/jquery.tablesorter.pager.css">
   
        <?php $ativo = basename($_SERVER['SCRIPT_NAME']); ?>
     <?php 
     if ($ativo == 'index.php') { echo '<title>Login - Administrativo</title>'; }
     if ($ativo == 'cad.php') { echo '<title>Cadastro de Operadores</title>'; }
     if ($ativo == 'torn.php') { echo '<title>Torneios</title>'; }
     if ($ativo == 'fin.php') { echo '<title>Financeiro</title>'; }
    
     
     ?>  
<style type="text/css" media="screen">@import "//localhost/esbl/v1.css";</style>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div id="header">
<ul>
	
	<li <?php if ($ativo == 'index.php') { echo 'id="current"'; } ?> > <a href="index.php">Adm</a></li>
        <li <?php if ($ativo == 'cad.php') { echo 'id="current"'; } ?> > <a href="cad.php">Cadastro</a></li>
        <li <?php if ($ativo == 'torn.php') { echo 'id="current"'; } ?> > <a href="torn.php">Torneios</a></li>
        <li <?php if ($ativo == 'fin.php') { echo 'id="current"'; } ?> > <a href="fin.php">Financeiro</a></li>
        
        
</ul>
         <div id="loggin">Logado como <?php echo $_SESSION['admlogin']; ?> </div>   
        </div>
        
    </body>
</html>
