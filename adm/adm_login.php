<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <style type="text/css">
        * { margin: 0; padding: 0; font-family:Tahoma; font-size:9pt;}
        #divCenter { 
                background-color: #e1e1e1; 
                width: 450px; 
                height: 150px; 
                left: 50%; 
                margin: -130px 0 0 -210px; 
                padding:10px;
                position: absolute; 
                top: 50%;
                border-radius: 1em
                
        }
        
        .campos {
            position: absolute;
            left: 12%;
            font: 20px georgia, sans-serif;
            
        }
        
        #c1 {
            position: absolute;
            top: 10%;
            font: 15px georgia, sans-serif;
        }
        
        #c2 {
            position: absolute;
            top: 40%;
            font: 15px georgia, sans-serif;
        }
        #c3 {
            position: absolute;
            top: 80%;
            left: 7%
            
        }
        .input {     
            border: 1px solid #006;
            width: 30em;  height: 2em;
            
                   
         }
    </style>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
     <div id="divCenter">
        <form action="ope.php" method="post" name="adm_login">
            
            <div id="c1"> Login:  <input type="text" name="admlogin" class="campos" size="40"> </div>
           
            <div id="c2"> Senha:  <input type="password" name="admsenha" class="campos" size="40"></div>
           
            <div id="c3"> <input type="submit" class="input" value="Entrar"></div>
           
        </form>   
     </div>  
    </body>
</html>
