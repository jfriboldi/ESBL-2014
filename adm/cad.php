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
          include_once 'adm_header.php';
        ?>
        <form action="cad_env.php" method="post" name="cad">
            
    Login:  <input type="text" name="login" class="campos" size="40"> <p>
           
        Senha:  <input type="password" name="senha" class="campos" size="40"> <p>
           
            <input type="submit" class="input" value="Enviar">
           
        </form>        
       
    </body>
</html>
