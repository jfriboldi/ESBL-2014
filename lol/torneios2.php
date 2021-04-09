<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <title>ESBL</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../css/carousel.css" rel="stylesheet">
    <link href="../css/screen.css" rel="stylesheet">
    <link href="../css/league-of-legends.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <script>
   
     
    
   
   
   $(document).ready(function(){
   var q = 0;
   $("#btn1").click(function(){
    q = q + 3;
      $.ajax({
         type: "POST", 
         url: "gtorn.php?n=" + q , //URL de destino
         dataType: "json", //Tipo de Retorno
         success: function(json){ //Se ocorrer tudo certo
            $.each(json.torn, function(key, value){
            $('<li><div class="container-fluid tab-games"><div class="row"><div class="col-md-10 col-sm-9"><div class="col-md-12 col-sm-12"><h5>' + value.nome + '</h5></div><div class="col-md-12 col-sm-12"><div class="col-md-3 data-screen">data <span>' + value.dia + '</span></div><div class="col-md-3 horario-screen">horário <span>' + value.hora + '</span></div><div class="col-md-3 inscricao-screen">inscrição <span>R$' + value.valor +'</span></div><div class="col-md-3 premio-screen">prêmio <span>R$' + value.premiacao + '</span></div></div></div><div class="col-md-2 col-sm-3"><a role="button" href="#" class="btn btn-sm btn-info">inscreva-se</a></div></div></div></li>').appendTo("#home ul").show();
        });
                     
         }
      });
   });
});
     
       

    </script>
    
</head>
<body>
    <?php 
    
    include "../head.php";
    include "../headg.php";
    
$usuario = "root";
$senha = "";
$banco_de_dados = "esbl";

$con = mysqli_connect("localhost",$usuario,$senha, $banco_de_dados) or die("Erro ao conectar no banco de dados");

$sql = mysqli_query($con, "select nome, jogo, dia, valor, premiacao, min, maxi from torn where jogo = 'lol' limit 3");





    
    ?>

    <div class="container-flid bg-top"></div>
    
    <div class="container-fluid bread-bg">
    	<div class="container">
    		<ol class="breadcrumb">
			  <li><a href="index.php">Home</a></li>
			  <li class="active">regulamento</li>
			</ol>
    	</div>
    </div>

	<div class="container all-pages">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<h2>próximos torneios</h2>
				<div class="container">
			      	<div class="jumbotron">
			      		<div class="col-md-8 col-sm-8">
			      			<h4>league of legends</h4>
				        	<p>Desafie jogadores de todos os níveis neste campeoanto de League of Legendas da esbl.com.br ou aprimorare suas habilidades na prática partidas contra alguns dos maiores estrategistas deste game. Monte seu time, chame seus amigos, inscreva-se e prepare para se divertir e ganhar dinheiro!</p>
			      		</div>
			        	<div class="col-md-4 col-sm-4">
			        		<p><a role="button" href="#" class="btn btn-lg btn-info">inscreva-se e jogue</a></p>
			        	</div>
			      	</div>
			    </div>
				<div class="torneios int">
					<div class="container">
						<div class="row">
							<div class="col-md-12 col-sm-12">
							    <div class="tab-content" id="myTabContent">
							      	<div id="home" class="tab-pane fade active in">
							      		<ul id="cm">
                                                                            <?php
                                                                            
                                                                                while($res = $sql->fetch_assoc()){
                                                                                
                                                                                    $data = substr($res[dia], 0, 10); 
                                                                                    $hora = substr($res[dia], 11, 8); 




                                                                                    $data = explode("-", $data);
                                                                                    $data = $data[2]."/".$data[1]."/".$data[0];





                                                                                    
                                                                                    
                                                                                   
                                                                                echo
                                                                                    '<li>
							      				<div class="container-fluid tab-games">
													<div class="row">
														<div class="col-md-10 col-sm-9">
															<div class="col-md-12 col-sm-12">
																<h5>'.$res[nome].'</h5>
															</div>
															<div class="col-md-12 col-sm-12">
																<div class="col-md-3 data-screen">data <span>'.$data.'</span></div>
																<div class="col-md-3 horario-screen">horário <span>'.$hora.'</span></div>
																<div class="col-md-3 inscricao-screen">inscrição <span>R$'.$res[valor].'</span></div>
																<div class="col-md-3 premio-screen">prêmio <span>R$'.$res[premiacao].'</span></div>
															</div>
														</div>
														<div class="col-md-2 col-sm-3">
															<a role="button" href="#" class="btn btn-sm btn-info">inscreva-se</a>
														</div>
													</div>
												</div>
							      			</li>';
                                                                                
                                                                                }
							      		
                                                                                ?>
                                                                            
							      		</ul>
							     	</div>
							    </div>
							  </div>
                                                    <button type="button" class="btn btn-default btn-black extend" id="btn1">carregar mais</button>
						</div>
					</div>
					
				</div>
				
				<h2>torneios anteriores</h2>
				<div class="container">
			      	<div class="jumbotron">
			      		<div class="col-md-8 col-sm-8">
			      			<h4>league of legends</h4>
				        	<p>Desafie jogadores de todos os níveis neste campeoanto de League of Legendas da esbl.com.br ou aprimorare suas habilidades na prática partidas contra alguns dos maiores estrategistas deste game. Monte seu time, chame seus amigos, inscreva-se e prepare para se divertir e ganhar dinheiro!</p>
			      		</div>
			        	<div class="col-md-4 col-sm-4">
			        		<p><a role="button" href="#" class="btn btn-lg btn-info">inscreva-se e jogue</a></p>
			        	</div>
			      	</div>
			    </div>
				<div class="torneios int">
					<div class="container">
						<div class="row">
							<div class="col-md-12 col-sm-12">
							    <div class="tab-content" id="myTabContent">
							      	<div id="home2" class="tab-pane fade active in">
							      		<ul>
							      			<li>
							      				<div class="container-fluid tab-games">
													<div class="row">
														<div class="col-md-10 col-sm-9">
															<div class="col-md-12 col-sm-12">
																<h5>Dota 2</h5>
															</div>
															<div class="col-md-12 col-sm-12">
																<div class="col-md-3 data-screen">data <span>30/06</span></div>
																<div class="col-md-3 horario-screen">horário <span>20h</span></div>
																<div class="col-md-3 inscricao-screen">inscrição <span>R$ 39,00</span></div>
																<div class="col-md-3 premio-screen">prêmio <span>R$ 1.000,00</span></div>
															</div>
														</div>
														<div class="col-md-2 col-sm-3">
															<a role="button" href="#" class="btn btn-sm btn-info">inscreva-se</a>
														</div>
													</div>
												</div>
							      			</li>
							      			<li>
							      				<div class="container-fluid tab-games">
													<div class="row">
														<div class="col-md-10 col-sm-9">
															<div class="col-md-12 col-sm-12">
																<h5>Dota 2</h5>
															</div>
															<div class="col-md-12 col-sm-12">
																<div class="col-md-3 data-screen">data <span>30/06</span></div>
																<div class="col-md-3 horario-screen">horário <span>20h</span></div>
																<div class="col-md-3 inscricao-screen">inscrição <span>R$ 39,00</span></div>
																<div class="col-md-3 premio-screen">prêmio <span>R$ 1.000,00</span></div>
															</div>
														</div>
														<div class="col-md-2 col-sm-3">
															<a role="button" href="#" class="btn btn-sm btn-info">inscreva-se</a>
														</div>
													</div>
												</div>
							      			</li>
							      			<li>
							      				<div class="container-fluid tab-games">
													<div class="row">
														<div class="col-md-10 col-sm-9">
															<div class="col-md-12 col-sm-12">
																<h5>Dota 2</h5>
															</div>
															<div class="col-md-12 col-sm-12">
																<div class="col-md-3 data-screen">data <span>30/06</span></div>
																<div class="col-md-3 horario-screen">horário <span>20h</span></div>
																<div class="col-md-3 inscricao-screen">inscrição <span>R$ 39,00</span></div>
																<div class="col-md-3 premio-screen">prêmio <span>R$ 1.000,00</span></div>
															</div>
														</div>
														<div class="col-md-2 col-sm-3">
															<a role="button" href="#" class="btn btn-sm btn-info">inscreva-se</a>
														</div>
													</div>
												</div>
							      			</li>
							      		</ul>
							     	</div>
							    </div>
							  </div>
							  <button type="button" class="btn btn-default btn-black extend">carregar mais</button>
						</div>
					</div>
					
				</div>
				
			</div>
		</div>
	</div>

    <?php 
    
    include "../foot.php";
    ?>
</body>
</html>
