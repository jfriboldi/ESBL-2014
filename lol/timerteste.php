<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title>jQuery Countdown</title>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="../scripts/jquery.plugin.js"></script>
<script src="../scripts/jquery.countdown.js"></script>



    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../css/carousel.css" rel="stylesheet">
    <link href="../css/screen.css" rel="stylesheet">
    <link href="../css/league-of-legends.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<script>
$(function () {
	var testDay = new Date(2015, 1 - 1, 17);
	
	$('#clockcd').countdown({until: testDay, layout:'<span class="insc-date">{dnn}<br><small>dias</small> </span>' +
							'<span class="insc-hr">{hnn}:<br><small>horas</small></span>' +
							'<span class="insc-hr">{mnn}<br><small>minutos</small></span>' });
	
});

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
            $('<li>' +
												'<div class="row">' +
													'<div class="col-md-10 col-sm-9">' +
														'<div class="col-md-12 col-sm-12 padding-li">' +
															'<div class="col-md-3 data-screen">data <span>' + value.dia + '</span></div>' +
															'<div class="col-md-3 horario-screen">horário <span>' + value.hora + '</span></div>' +
															'<div class="col-md-3 inscricao-screen">inscrição <span>R$ ' + value.valor + '</span></div>' +
															'<div class="col-md-3 premio-screen">prêmio <span>R$ ' + value.premiacao + '</span></div>' +
														'</div>' +
													'</div>' +
													'<div class="col-md-2 col-sm-3">' +
														'<a role="button" href="#" class="btn btn-sm btn-info btn-block">inscreva-se</a>' +
													'</div>' +
												'</div>' +
							      			'</li>').appendTo("#home ul").show();
        });
                     
         }
      });
   });
});
     
       

    </script>
</head>

<body>
<?php include "../head.php"; 
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
			  <li class="active">Torneios</li>
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
			      			<h3><small>XV Torneio de</small><br>league of legends</h3>
			      		</div>
			      	</div>
			      	<div class="col-md-12 display-torn">
			      		<div class="col-md-5">
			      			<span class="insc-title"><img src="../imgs/clock.png" height="34" width="34" alt="">Faltam</span>
			      			<div id="clockcd"></div>
			      		</div>
			      		<div class="col-md-5">
			      			<span class="insc-title"><img src="../imgs/calle.png" height="34" width="34" alt="">começa em</span>
			      			<span class="insc-date">04/10/14<br><small>04 DE DEZEMBRO DE 2014</small></span>
			      		</div>
			      		<div class="col-md-2 no-padding">
			      			<a role="button" href="#" class="btn btn-lg btn-warning btn-block">participar</a>
			      		</div>
			      	</div>
			    </div>
				<div class="torneios int">
					<div class="container">
						<div class="row">
								<div id="home" class="col-md-12 col-sm-12">
							    
							      	
							      		<ul>
                                                                            
                                                                            <?php
                                                                            
                                                                                while($res = $sql->fetch_assoc()){
                                                                                
                                                                                    $data = substr($res[dia], 0, 10); 
                                                                                    $hora = substr($res[dia], 11, 8); 




                                                                                    $data = explode("-", $data);
                                                                                    $data = $data[2]."/".$data[1]."/".$data[0];





                                                                                    
                                                                                    
                                                                                   
                                                                                echo'<li>
												<div class="row">
													<div class="col-md-10 col-sm-9">
														<div class="col-md-12 col-sm-12 padding-li">
															<div class="col-md-3 data-screen">data <span>'.$data.'</span></div>
															<div class="col-md-3 horario-screen">horário <span>'.$hora.'</span></div>
															<div class="col-md-3 inscricao-screen">inscrição <span>R$ '.$res[valor].'</span></div>
															<div class="col-md-3 premio-screen">prêmio <span>R$ '.$res[premiacao].'</span></div>
														</div>
													</div>
													<div class="col-md-2 col-sm-3">
														<a role="button" href="#" class="btn btn-sm btn-info btn-block">inscreva-se</a>
													</div>
												</div>
							      			</li>';
                                                                                
                                                                                }
                                                                                
                                                                                ?>
							      			
							      			
							      		</ul>
							     	
							    
							  	</div>
							  	<div class="col-md-12">
							  		<button type="button" class="btn btn-default btn-black extend" id="btn1">carregar mais</button>
							  	</div>
						</div>
						
					
					</div>
				
				</div>
				
			</div>
		</div>
	</div>

	<div class="container-fluid vencedor">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-4">
	        		<img src="../imgs/perfil-user.jpg" alt="">
	        		<span>lolcuras team</span>
	        	</div>
	      		<div class="col-md-8 col-sm-8">
	      			<h3>parabéns a equipe vencedora<br><small>XV torneio de league of legends</small></h3>
	      			<p><a role="button" href="#" class="btn btn-lg btn-warning">veja como foi</a></p>
	      		</div>
			</div>
	    </div>
	</div>

	<div class="container all-pages">
				<div class="row">
					<h2>torneios anteriores</h2>
					<div class="torneios int">
						<div class="container">
							<div class="row">
								<div class="col-md-12 col-sm-12">
									<div class="col-md-12">
										<ul>
							      			<li>
												<div class="row">
													<div class="col-md-10 col-sm-9">
														<div class="col-md-12 col-sm-12 padding-li">
															<h5>18 torneio de league of legends <small>16/02/2014</small></h5>
														</div>
													</div>
													<div class="col-md-2 col-sm-3">
														<a role="button" href="#" class="btn btn-sm btn-info btn-block">inscreva-se</a>
													</div>
												</div>
							      			</li>
							      			<li>
												<div class="row">
													<div class="col-md-10 col-sm-9">
														<div class="col-md-12 col-sm-12 padding-li">
															<h5>18 torneio de league of legends <small>16/02/2014</small></h5>
														</div>
													</div>
													<div class="col-md-2 col-sm-3">
														<a role="button" href="#" class="btn btn-sm btn-info btn-block">inscreva-se</a>
													</div>
												</div>
							      			</li>
							      			<li>
												<div class="row">
													<div class="col-md-10 col-sm-9">
														<div class="col-md-12 col-sm-12 padding-li">
															<h5>18 torneio de league of legends <small>16/02/2014</small></h5>
														</div>
													</div>
													<div class="col-md-2 col-sm-3">
														<a role="button" href="#" class="btn btn-sm btn-info btn-block">inscreva-se</a>
													</div>
												</div>
							      			</li>
							      		</ul>
									</div>
						      		
							    </div>
							</div>
							<div class="col-md-12"><button type="button" class="btn btn-default btn-black extend">carregar mais</button></div>
						</div>
					</div>
				</div>

			    
	</div>


</body>
</html>
