<?php

$searchw=$_POST["searchw"];

$usuario = "root";
$senha = "";
$banco_de_dados = "esbl";

$con = mysqli_connect("localhost",$usuario,$senha, $banco_de_dados) or die("Erro ao conectar no banco de dados");


$sql = mysqli_query($con,"select equips.id, equips.logo, equips.lp, equips.p, equips.nome as equipes , sum(class.pts) as totalpoints from class inner join equips on class.id_equip = equips.id where equips.nome like '%$searchw%' group by id_equip ORDER BY equips.p ASC");

$dados = array();


while($res = $sql->fetch_assoc()){
    
    
    
    $dados['pcl'][] = array( 
                                                                                                                'id' => $res[id],
                                                                                                                'p' => $res[p],
                                                                                                                'lp' => $res[lp],
                                                                                                                'equip' => $res[equipes],
                                                                                                                'totalpoints' => $res[totalpoints],
                                                                                                                'logo' => $res[logo],
        
        );
}
echo json_encode($dados); 
