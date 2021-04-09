<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$nick = $_POST['nick'];

$usuario = "root";
$senha = "";
$banco_de_dados = "esbl";

$con = mysqli_connect("localhost",$usuario,$senha, $banco_de_dados) or die("Erro ao conectar no banco de dados");

$sql = mysqli_query($con, "select teamname from instorn where top = '$nick' or jg = '$nick' or mid = '$nick' or adc = '$nick' or sup = '$nick' or res1 = '$nick' or res2 = '$nick'");

$row_cnt = $sql->num_rows;
        
if ($row_cnt > 0) {

    echo'<div class="col-md-10 padding-user">
				
				<div class="col-md-12 col-user times-all">';
    $time = '';
    while($res = $sql->fetch_assoc()){
        
        if ($time != $res[teamname]){
            
            echo'<div class="col-md-3 times-user">
						<div class="bg-times-user-lol bg-times-user">
							<p class="text-center"><img alt="" src="imgs/perfil-user.jpg" width="60"></p>
							<h4>'.$res[teamname].'</h4>
							<p class="text-center"><small>League of Legends <br>300 pontos</small></p>
							<div class="col-md-4 hero"><img src="imgs/hero1.jpg" height="67" width="67" alt=""></div>
							<div class="col-md-4 hero"><img src="imgs/hero2.jpg" height="67" width="67" alt=""></div>
							<div class="col-md-4 hero"><img src="imgs/hero3.jpg" height="67" width="67" alt=""></div>
						</div>
					</div>';
            
            
            
        }
        $time = $res[teamname];
        
        
        
        
        
        
    }
    
    echo '</div>
				
			</div>';
    
}



					
					
				