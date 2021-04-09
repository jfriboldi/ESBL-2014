<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>ESBL</title>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
     <script src="/esbl/scripts/jquery.blockUI.js"></script>
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
  <script src="/esbl/scripts/jquery.plugin.js"></script>
<script src="/esbl/scripts/jquery.countdown.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/esbl/css/carousel.css" rel="stylesheet">
    <link href="/esbl/css/screen.css" rel="stylesheet">
    <link href="/esbl/css/league-of-legends.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
</head>
<body>
    
    <?php 
    
    include "../head.php";
    include "../headg.php";
    
    
$usuario = "root";
$senha = "";
$banco_de_dados = "esbl";

$con = mysqli_connect("localhost",$usuario,$senha, $banco_de_dados) or die("Erro ao conectar no banco de dados");

$sql = mysqli_query($con, "select * from torn where jogo = 'lol' and final = '0' order by dia ASC");

$i = mysqli_fetch_array($sql);

$data = substr($i[dia], 0, 10); 
$hora = substr($i[dia], 11, 8); 
$data = explode("-", $data);
$data = $data[2]."/".$data[1]."/".$data[0];
    ?>
    
	<div class="container-fluid bg-lol">
		<div class="container lol-center marketing">
		    <div class="row bg-grey-lol">
		    	<div class="col-md-12 col-sm-12 center-home">
		    		<h4><?php echo $i[nome]; ?></h4>
		    		<h1>League of Legends</h1>
		    		<!--<img src="imgs/lol-char.png" alt="lol 2">-->
		    		<p>Monte seu time, chame seus amigos, inscreva-se e prepare para se divertir e ganhar dinheiro!</p>
		    	</div>
		    	<div class="col-md-12 col-sm-12">
		    		<div class="col-md-3 col-sm-3 center-col">
			          	<h3><?php echo $i[premiacao]; ?> reais<br><span>em prêmios</span></h3>
			          	<p>A premição aumenta conforme o número de times inscritos</p>
			        </div><!-- /.col-lg-4 -->
			        <div class="col-md-3 col-sm-3 center-col">
			          	<h3><span>começa em</span><br><?php echo $data; ?></h3>
			          	<p>As inscrições encerram 2 dias antes!</p>
			        </div><!-- /.col-lg-4 -->
			        <div class="col-md-3 col-sm-3 center-col">
			          	<h3><span>Valor de inscrição de apenas</span><br><?php echo $i[valor]; ?> reais</h3>
			          	<p>O que fica apenas <?php $w = $i[valor] / 5; echo $w; ?> reais por player</p>
			        </div><!-- /.col-lg-4 -->
			        <div class="col-md-3 col-sm-3 center-col">
			          	<h3>Bônus<br><span>segundo e terceiro</span></h3>
			          	<p>Também recebem premição!</p>
			        </div><!-- /.col-lg-4 -->
		    	</div>
		        <div class="col-md-12 center-home">
		    		<p><a role="button" href="inscreva.php?id=<?php echo $i[id]; ?>" class="btn btn-lg btn-warning">Inscreva-se e jogue</a></p>
		    	</div>
	    	</div>
	    </div>
	</div>

	<div class="container-fluid win-lol">
		<div class="container">
                    <?php 
                    $sql4 = mysqli_query($con, "SELECT equips.nome, class.id_torn FROM equips inner join class on class.id_equip = equips.id where class.colocacao = 1 ORDER BY class.id_torn DESC");
                    $f = mysqli_fetch_array($sql4);
                    ?>
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<img src="../imgs/trofeu.png" height="88" width="85" alt="">
					<span>Parabéns</span>
					<h5><?php echo $f[nome]; ?></h5>
					<p>Por ganhar o último campeonato online da ESBL!</p>
					<p><a role="button" href="bracket.php?id=<?php echo $f[id_torn]; ?>" class="btn btn-default">saiba como foi</a></p>
				</div>
			</div>
		</div>
	</div>
	
	<div class="torneios">
		<div class="container">
			<div>
				<div class="col-md-3 col-sm-3">
					<h4 class="tab-text">Top times</h4>
					<div class="col-md-12 col-sm-12 top-time">
						<ul>
                                                    <?php 
                                                    
                                                    
                                                    $sql3 = mysqli_query($con, "select equips.id, equips.logo, equips.lp, equips.p, equips.nome as equipes , sum(class.pts) as totalpoints from class inner join equips on class.id_equip = equips.id group by id_equip ORDER BY equips.p ASC limit 3");
                                                    
                                                    while($res3 = $sql3->fetch_assoc()){
							echo'<li>';
								if ($res3[logo] == 's') { echo'<img width="60px" height="60px" src="../upfinal/t'.$res3[id].'.png">'; } else { echo'<img src="../imgs/time-img.jpg">'; }
								echo'<h3>'.$res3[equipes].'</h3>
								<p>League of Legends<br>'.$res3[totalpoints].' pontos</p>
							</li>';                                                   }
                                                    ?>
						</ul>
					</div>
				</div>
				<div class="col-md-9 col-sm-9">
				    <ul role="tablist" class="nav nav-tabs nav-justified" id="myTab">
				      	<li class="active"><a data-toggle="tab" role="tab" href="#home">Próximos torneios</a></li>
				      	<li class=""><a data-toggle="tab" role="tab" href="#profile">Torneios anteriores</a></li>
				    </ul>
				    <div class="tab-content" id="myTabContent">
				      	<div id="home" class="tab-pane fade active in">
				      		<ul>
                                                    <?php
                                                    
                                                    $sql2 = mysqli_query($con, "select * from torn where jogo = 'lol' and final = '0' order by dia ASC limit 3");
                                                    
                                                    while($res = $sql2->fetch_assoc()){
                                                        
                                                        $data = substr($res[dia], 0, 10); 
                                                        $hora = substr($res[dia], 11, 8); 
                                                        $data = explode("-", $data);
                                                        $data = $data[2]."/".$data[1]."/".$data[0];
				      			echo'<li>
				      				<div class="container-fluid tab-games">
										<div class="row">
											<div class="col-md-10 col-sm-9">
												<div class="col-md-12 col-sm-12">
													<h5>'.$res[nome].' League of Legends</h5>
												</div>
												<div class="col-md-12 col-sm-12">
													<div class="col-md-3 data-screen">data <span>'.$data.'</span></div>
													<div class="col-md-3 horario-screen">horário <span>'.$hora.'</span></div>
													<div class="col-md-3 inscricao-screen">inscrição <span>R$ '.$res[valor].',00</span></div>
													<div class="col-md-3 premio-screen">prêmio <span>R$ '.$res[premiacao].',00</span></div>
												</div>
											</div>
											<div class="col-md-2 col-sm-3">
												<a role="button" href="inscreva?id='.$res[id].'" class="btn btn-sm btn-info">inscreva-se</a>
											</div>
										</div>
									</div>
				      			</li>';
                                                    }
                                                    ?>
				      		</ul>
				     	</div>
				      	<div id="profile" class="tab-pane fade">
                                                <ul>
                                                    <?php
                                                    
                                                    $sql1 = mysqli_query($con, "select torn.id, torn.nome, torn.dia, equips.nome as equipes from torn inner join class on torn.id = class.id_torn inner join equips on class.id_equip = equips.id where torn.jogo = 'lol' and torn.final = '1' and class.colocacao = 1 order by torn.dia DESC limit 3");
                                                    
                                                    while($res1 = $sql1->fetch_assoc()){
                                                        
                                                        $data1 = substr($res1[dia], 0, 10); 
                                                        $hora1 = substr($res1[dia], 11, 8); 
                                                        $data1 = explode("-", $data1);
                                                        $data1 = $data1[2]."/".$data1[1]."/".$data1[0];
				      			echo'<li>
				      				<div class="container-fluid tab-games">
										<div class="row">
											<div class="col-md-10 col-sm-9">
												<div class="col-md-12 col-sm-12">
													<h5>'.$res1[nome].' League of Legends</h5>
												</div>
												<div class="col-md-12 col-sm-12">
													<div class="col-md-3 data-screen">data <span>'.$data1.'</span></div>
													<div class="col-md-3 horario-screen">horário <span>'.$hora1.'</span></div>
													
													<div class="col-md-3 premio-screen">Vencedor <span>'.$res1[equipes].'</span></div>
												</div>
											</div>
											<div class="col-md-2 col-sm-3">
												<a role="button" href="bracket.php?id='.$res1[id].'" class="btn btn-sm btn-info">veja como foi</a>
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
			</div>
		</div>
	</div>

	<div class="container-fluid best-equips">
		<div class="container">
			<div class="col-md-6 col-sm-6 equipes">
				<img src="../imgs/equipes.png" height="27" width="45" alt="">
				<h5>equipes</h5>
				<p>Confira as nossas equipes</p>
				<span><a role="button" href="equipes.php" class="btn btn-default">Conheça</a></span>
			</div>
			<div class="col-md-6 col-sm-6 classificacao">
				<img src="../imgs/classificacao.png" height="31" width="69" alt="">
				<h5>classificação</h5>
				<p>Confira aqui a classificação geral</p>
                                <span><a role="button" href="classificacao.php" class="btn btn-default">Confira</a></span>
			</div>
		</div>
	</div>

    <?php 
    
    include "../foot.php";
    ?>
</body>
</html>