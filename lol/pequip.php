<?php

$searchw=$_POST["searchw"];

$usuario = "root";
$senha = "";
$banco_de_dados = "esbl";

$con = mysqli_connect("localhost",$usuario,$senha, $banco_de_dados) or die("Erro ao conectar no banco de dados");


$sql = mysqli_query($con, "select equips.id, equips.nome, equips.top, equips.jg, equips.mid, equips.adc, equips.sup, equips.logo, sum(class.pts) as tp from class inner join equips on equips.id = class.id_equip where equips.nome like '%$searchw%' group by equips.id order by equips.nome ");

$dados = array();
                                $imgtop = 0;
                                $imgjg = 0;
                                $imgmid = 0;
                                $imgadc = 0;
                                $imgsup = 0;
while($res = $sql->fetch_assoc()){
    
    $id = $res[id];
    $nome = $res[nome];
    $top = $res[top];
    $jg = $res[jg];
    $mid = $res[mid];
    $adc = $res[adc];
    $sup = $res[sup];
    $logo = $res[logo];
    $tp = $res[tp];
            
    $sqltop = mysqli_query($con, "select id, img from users where nicklol = '$res[top]'");
                                    
                                    while($restop = $sqltop->fetch_assoc()){
                                    
                                        if ($restop[img] == 1){
                                        $imgtop = 1;
                                        $topid = $restop[id];
                                        }
                                    }
                                    $sqljg = mysqli_query($con, "select id, img from users where nicklol = '$res[jg]'");
                                    
                                    while($resjg = $sqljg->fetch_assoc()){
                                    
                                        if ($resjg[img] == 1){
                                        $imgjg = 1;
                                        $jgid = $resjg[id];
                                        }
                                    }
                                    $sqlmid = mysqli_query($con, "select id, img from users where nicklol = '$res[mid]'");
                                    
                                    while($resmid = $sqlmid->fetch_assoc()){
                                    
                                        if ($resmid[img] == 1){
                                        $imgmid = 1;
                                        $midid = $resmid[id];
                                        }
                                    }
                                    $sqladc = mysqli_query($con, "select id, img from users where nicklol = '$res[adc]'");
                                    
                                    while($resadc = $sqladc->fetch_assoc()){
                                    
                                        if ($resadc[img] == 1){
                                        $imgadc = 1;
                                        $adcid = $resadc[id];
                                        }
                                    }
                                    $sqlsup = mysqli_query($con, "select id, img from users where nicklol = '$res[sup]'");
                                    
                                    while($ressup = $sqlsup->fetch_assoc()){
                                    
                                        if ($ressup[img] == 1){
                                        $imgsup = 1;
                                        $supid = $ressup[id];
                                        }
                                    }
    
    
    $dados['tes'][] = array( 
                                                                                                                'id' => $id,
                                                                                                                'nome' => $nome,
                                                                                                                'top' => $top,
                                                                                                                'jg' => $jg,
                                                                                                                'mid' => $mid,
                                                                                                                'adc' => $adc,
                                                                                                                'sup' => $sup,
                                                                                                                'logo' => $logo,
                                                                                                                'tp' => $tp,
                                                                                                                'imt' => $imgtop,
                                                                                                                'idt' => $topid,
                                                                                                                'imj' => $imgjg,
                                                                                                                'idj' => $jgid,
                                                                                                                'imm' => $imgmid,
                                                                                                                'idm' => $midid,
                                                                                                                'ima' => $imgadc,
                                                                                                                'ida' => $adcid,
                                                                                                                'ims' => $imgsup,
                                                                                                                'ids' => $supid,
                                                                                                                                        );
    
    $imgtop = 0;
                                $imgjg = 0;
                                $imgmid = 0;
                                $imgadc = 0;
                                $imgsup = 0;
    
}
echo json_encode($dados); 
