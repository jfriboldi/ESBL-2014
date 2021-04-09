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
     unset($_SESSION['login']); 
     unset($_SESSION['senha']); 
     header('location:adm_login.php'); 
     
     }
 ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
    </body>
</html>
