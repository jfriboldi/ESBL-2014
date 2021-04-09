<?php
include_once 'adm_header.php';
$tornid = $_POST[tornid];
$primeiro = $_POST[primeiro];
$segundo = $_POST[segundo];
$terceiro = $_POST[terceiro];
$quarto = $_POST[quarto];
$outros = $_POST[outros];
$pts1 = $_POST[pts1];
$pts2 = $_POST[pts2];
$pts3 = $_POST[pts3];
$pts4 = $_POST[pts4];
$pts5 = $_POST[pts5];


$usuario = "root";
$senha = "";
$banco_de_dados = "esbl";

$con = mysqli_connect("localhost",$usuario,$senha, $banco_de_dados) or die("Erro ao conectar no banco de dados");

$sql = mysqli_query($con, "INSERT INTO `esbl`.`class` (`id_equip`, `id_torn`, `colocacao`, `pts`) VALUES ('$primeiro', '$tornid', '1', '$pts1'), ('$segundo', '$tornid', '2', '$pts2'), ('$terceiro', '$tornid', '3', '$pts3'), ('$quarto', '$tornid', '4', '$pts4');");


foreach($outros as $idtime){
 $sql2 = mysqli_query($con, "INSERT INTO `esbl`.`class` (`id_equip`, `id_torn`, `colocacao`, `pts`) VALUES ('$idtime', '$tornid', '0', '$pts5')");
}

$sql3 = mysqli_query($con, "UPDATE torn SET final = '1' WHERE id = '$tornid'");


$sql4 = mysqli_query($con, "select equips.p, class.id_equip, sum(class.pts) as totalpoints from class inner join equips on class.id_equip = equips.id  group by class.id_equip ORDER BY `totalpoints` DESC");
$c = 0;
$pp = 0;
$sc = 0;
while($res = $sql4->fetch_assoc()){
    $p = $res[p];
    $e = $res[id_equip];
    $tp = $res[totalpoints];
    
    if ($pp != $tp)
    {
     
     $pp = $tp; 
     $c = $c + $sc;
     $c++;
     $sc = 0;
    }
    else {
        $sc++;
    }
    
    $sql3 = mysqli_query($con, "UPDATE equips SET lp = '$p', p = '$c' WHERE id = '$e'");
    
   
}





echo'Torneio Finalizado com Sucesso';

