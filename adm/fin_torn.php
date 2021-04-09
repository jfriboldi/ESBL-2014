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
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>
        $(function () {
           
           $('#primeiro').change(function() {
              var $options = $("#primeiro > option").clone();
              
                          
             $('#segundo').append($options);
              
            var sel = $("option:selected", this ).val();
            
            
             
             $('#segundo option[value="'+ sel +'"]').remove();
              
           });
           
            $('#segundo').change(function() {
              var $options = $("#segundo > option").clone();
              
                          
             $('#terceiro').append($options);
              
            var sel = $("option:selected", this ).val();
            
            
             
             $('#terceiro option[value="'+ sel +'"]').remove();
              
           });
           
            $('#terceiro').change(function() {
              var $options = $("#terceiro > option").clone();
              
                          
             $('#quarto').append($options);
              
            var sel = $("option:selected", this ).val();
            
            
             
             $('#quarto option[value="'+ sel +'"]').remove();
              
           });
           $('#quarto').change(function() {
              var $options = $("#quarto > option").clone();
              
                          
             $('#outros').append($options);
              
            var sel = $("option:selected", this ).val();
            
            
             
             $('#outros option[value="'+ sel +'"]').remove();
              
           });
           
        });
        
        
        
        </script>
    </head>
    <body>
        <?php
        include_once 'adm_header.php';
        
        $id = $_GET[id];
        
$usuario = "root";
$senha = "";
$banco_de_dados = "esbl";

$con = mysqli_connect("localhost",$usuario,$senha, $banco_de_dados) or die("Erro ao conectar no banco de dados");

$sql = mysqli_query($con, "select * from instorn where torneioid = '$id' ORDER BY teamname ASC");
        ?>
        
        <br>
        <br>
        <form method="post" action="fintorn.php">
            <input type="hidden" name="tornid" value="<?php echo $id; ?>">
Primeiro Lugar <select name="primeiro" id="primeiro">
    <option value=""></option>
    
    <?php 
    
    while($res = $sql->fetch_assoc()){

        echo'<option value="'.$res[teamid].'">'.$res[teamname].'</option>';

        
    }
    
    ?>
</select>
<input type="text" name="pts1" id="pts1" value="100"> <p>
Segundo Lugar <select name="segundo" id="segundo"></select> <input name="pts2" type="text" id="pts2" value="50"> <p>
    Terceiro Lugar <select name="terceiro" id="terceiro"> </select> <input name="pts3" type="text" id="pts3" value="30"> <p>
    Quarto Lugar <select name="quarto" id="quarto"> </select> <input name="pts4" type="text" id="pts4" value="20"> <p>

    Outros colocados:<p> <select name="outros[]" id="outros" multiple></select>  <input name="pts5" type="text" id="pts5" value="10"><p>
    <input type="submit">
        </form>
    </body>
</html>
