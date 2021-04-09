<?php
$n=$_GET["n"];

$usuario = "root";
$senha = "";
$banco_de_dados = "esbl";

$con = mysqli_connect("localhost",$usuario,$senha, $banco_de_dados) or die("Erro ao conectar no banco de dados");


$sql = mysqli_query($con, "select id, nome, jogo, dia, valor, premiacao, min, maxi from torn where final = '0' order by id limit $n, 3 ");

$x = 0;

$dados = array();

while($res = $sql->fetch_assoc()){
                                                                                
                                                                                    $dia = substr($res[dia], 0, 10); 
                                                                                    $hora = substr($res[dia], 11, 8); 




                                                                                    $dia = explode("-", $dia);
                                                                                    $dia = $dia[2]."/".$dia[1]."/".$dia[0];


                                                                                    $nome = $res[nome];
                                                                                    $valor = $res[valor];
                                                                                    $premiacao = $res[premiacao];
                                                                                    $id = $res[id];

                                                                                    $dados['torn'][] = array( 
                                                                                                                'nome' => $nome,
                                                                                                                'dia' => $dia,
                                                                                                                'hora' => $hora,
                                                                                                                'valor' => $valor,
                                                                                                                'premiacao' => $premiacao,
                                                                                                                'id' => $id,
                                                                                                                                        );


                                                                                  
                                                                                    
                                                                                   
                                                                                


}
echo json_encode($dados); 




