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


$sql = mysqli_query($con, "select torn.nome, torn.jogo, torn.dia, torn.valor, instorn.teamname from torn join instorn on torn.id = instorn.torneioid where top = '$nick' or jg = '$nick' or mid = '$nick' or adc = '$nick' or sup = '$nick' or res1 = '$nick' or res2 = '$nick'");

$row_cnt = $sql->num_rows;
        
if ($row_cnt > 0) {
   
echo '<div class="col-md-10 padding-user">
				<h5>Torneios cadastrados</h5>';    


while($res = $sql->fetch_assoc()){
    $dia = substr($res[dia], 0, 10); 
    $hora = substr($res[dia], 11, 8); 
    $dia = explode("-", $dia);
    $dia = $dia[2]."/".$dia[1]."/".$dia[0];   
    
    
echo '
				<div class="col-md-12 col-user">
					<div class="col-md-12 no-padding user-torneio-box">
						<div class="col-md-3"><img src="imgs/layout_pre_home_LA02.png" alt=""></div>
						<div class="col-md-2"><p class="text-center"><img src="imgs/calendar.png" height="34" width="34" alt="">'.$dia.'</p></div>
						<div class="col-md-2"><p class="text-center"><img src="imgs/calendar.png" height="34" width="34" alt="">'.$hora.'</p></div>
						<div class="col-md-2"><p class="text-center"><img src="imgs/calendar.png" height="34" width="34" alt="">'.$res[valor].'</p></div>
						<div class="col-md-3"><p class="text-right"><a role="button" href="#" class="btn btn-default btn-black btn-sm">inscreva-se e jogue</a></p></div>
					</div>
				</div>';    
}

echo '<h5>Torneios anteriores</h5>
				<div class="col-md-12 col-user">
					<div class="disable">
						<p class="text-center">você ainda não participou de nenhum torneio</p>
					</div>
				</div>
			</div>';

}