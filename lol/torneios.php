<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="../scripts/jquery.plugin.js"></script>
<script src="../scripts/jquery.countdown.js"></script>

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

    $(function(){
	var getdata = document.getElementById("li1_data").innerHTML;
        var gethora = document.getElementById("li1_hora").innerHTML;
        var getnome = document.getElementById("li1_nome").innerHTML;
        var getlink = document.getElementById("li1_link").href;
        
       var hora = gethora.split(":"); 
        
       var explo = getdata.split("/");
       var dia = explo[0];
       var mes = explo[1];
       var ano = explo[2];
       
       if (mes == 01)
       {
           var mext = "Janeiro";
       
       }
       if (mes == 02)
       {
           var mext = "Fevereiro";
       
       }
       if (mes == 03)
       {
           var mext = "Março";
       
       }
       if (mes == 04)
       {
           var mext = "Abril";
       
       }
       if (mes == 05)
       {
           var mext = "Maio";
       
       }
       if (mes == 06)
       {
           var mext = "Junho";
       
       }
       if (mes == 07)
       {
           var mext = "Julho";
       
       }
       if (mes == 08)
       {
           var mext = "Agosto";
       
       }
       if (mes == 09)
       {
           var mext = "Setembro";
       
       }
       if (mes == 10)
       {
           var mext = "Outubro";
       
       }
       if (mes == 11)
       {
           var mext = "Novembro";
       
       }
       if (mes == 12)
       {
           var mext = "Dezembro";
       
       }
        $('#tornnome').html(getnome);
        $('#extdate').html(getdata + '<br><small>' + dia + ' DE ' + mext + ' DE ' + ano + '</small>');
        $('#lkpart').attr("href", getlink);
        
        
        
	
	$('#clockcd').countdown({until: $.countdown.UTCDate(-03, ano, mes-1, dia, hora[0], 0, 0, 0), layout:'<span class="insc-date">{dnn}<br><small>dias</small> </span>' +
							'<span class="insc-hr">{hnn} : <br><small>horas</small></span>' +
							'<span class="insc-hr">{mnn} : <br><small>min</small></span>' +
                                                        '<span class="insc-hr">{snn}<br><small>seg</small></span>' });
                                            
                                            
	
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
														'<a role="button" href="/esbl/lol/inscreva.php?id='+ value.id + '" class="btn btn-sm btn-info btn-block">inscreva-se</a>' +
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
<?php 
    
    include "../head.php";
    include "../headg.php";
    
$usuario = "root";
$senha = "";
$banco_de_dados = "esbl";

$con = mysqli_connect("localhost",$usuario,$senha, $banco_de_dados) or die("Erro ao conectar no banco de dados");

$sql = mysqli_query($con, "select id, nome, jogo, dia, valor, premiacao, min, maxi from torn where jogo = 'lol' and final = '0' order by id limit 3");





    
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
			      			<h3><small id="tornnome"></small><br>league of legends</h3>
			      		</div>
			      	</div>
			      	<div class="col-md-12 display-torn">
			      		<div class="col-md-5">
			      			<span class="insc-title"><img src="../imgs/clock.png" height="34" width="34" alt="">Faltam</span>
			      			<div id="clockcd"></div>
			      		</div>
			      		<div class="col-md-5">
			      			<span class="insc-title"><img src="../imgs/calle.png" height="34" width="34" alt="">começa em</span>
			      			<span class="insc-date" id="extdate"></span>
			      		</div>
			      		<div class="col-md-2 no-padding">
			      			<a role="button" id="lkpart" href="#" class="btn btn-lg btn-warning btn-block">participar</a>
			      		</div>
			      	</div>
			    </div>
				<div class="torneios int">
					<div class="container">
						<div class="row">
								<div id="home" class="col-md-12 col-sm-12">
							    
							      	
							      		<ul>
                                                                            
                                                                            <?php
                                                                            
                                                                            $contador = 1;
                                                                                while($res = $sql->fetch_assoc()){
                                                                                
                                                                                    $data = substr($res[dia], 0, 10); 
                                                                                    $hora = substr($res[dia], 11, 8); 




                                                                                    $data = explode("-", $data);
                                                                                    $data = $data[2]."/".$data[1]."/".$data[0];





                                                                                    
                                                                                    
                                                                                   
                                                                                echo'<li>
												<div class="row">
													<div class="col-md-10 col-sm-9">
														<div class="col-md-12 col-sm-12 padding-li"><p id="li'.$contador.'_nome" hidden>'.$res[nome].'</p>
															<div class="col-md-3 data-screen">data <span id="li'.$contador.'_data">'.$data.'</span></div>
															<div class="col-md-3 horario-screen">horário <span id="li'.$contador.'_hora">'.$hora.'</span></div>
															<div class="col-md-3 inscricao-screen">inscrição <span>R$ '.$res[valor].'</span></div>
															<div class="col-md-3 premio-screen">prêmio <span>R$ '.$res[premiacao].'</span></div>
														</div>
													</div>
													<div class="col-md-2 col-sm-3">
														<a role="button" id="li'.$contador.'_link" href="/esbl/lol/inscreva.php?id='.$res[id].'" class="btn btn-sm btn-info btn-block">inscreva-se</a>
													</div>
												</div>
							      			</li>';
                                                                                
                                                                                $contador++;
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
<?php 
                    $sql2 = mysqli_query($con, "SELECT equips.id as id_e, equips.nome, equips.logo, class.id_torn, torn.nome as torneio FROM equips inner join class on class.id_equip = equips.id inner join torn on torn.id = class.id_torn where class.colocacao = 1 ORDER BY torn.dia DESC");
                    $f = mysqli_fetch_array($sql2);
                    ?>
	<div class="container-fluid vencedor">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-4">
	        		<?php if ($f[logo] == 's') { echo'<img width="160px" height="160px" src="../upfinal/t'.$f[id_e].'.png">'; } else { echo'<img src="../imgs/perfil-user.jpg">'; } 
	        		echo'<span>'.$f[nome].'</span>
	        	</div>
	      		<div class="col-md-8 col-sm-8">
	      			<h3>parabéns a equipe vencedora<br><small>'.$f[torneio].' league of legends</small></h3>
	      			<p><a role="button" href="bracket?id='.$f[id_torn].'"" class="btn btn-lg btn-warning">veja como foi</a></p>'; ?>
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
                                                                                    <?php 
                                                                                    $sql1 = mysqli_query($con, "select torn.id, torn.nome, torn.dia, equips.nome as equipes from torn inner join class on torn.id = class.id_torn inner join equips on class.id_equip = equips.id where torn.jogo = 'lol' and torn.final = '1' and class.colocacao = 1 order by torn.dia DESC limit 3");
                                                                                    while($res1 = $sql1->fetch_assoc()){
                                                                                        
                                                                                        $data1 = substr($res1[dia], 0, 10); 
                                                                                        
                                                                                        $data1 = explode("-", $data1);
                                                                                        $data1 = $data1[2]."/".$data1[1]."/".$data1[0];
							      			echo'<li>
												<div class="row">
													<div class="col-md-10 col-sm-9">
														<div class="col-md-12 col-sm-12 padding-li">
                                                                                                                        <div class="col-md-3 data-screen">Campeão <span>'.$res1[equipes].'</span></div>
                                                                                                                        <div class="col-md-3 data-screen">Torneio <span>'.$res1[nome].'</span></div>
                                                                                                                            <div class="col-md-3 data-screen"></div>
                                                                                                                        <div class="col-md-3 data-screen">Data <span>'.$data1.'</span></div> 
															
														</div>
													</div>
													<div class="col-md-2 col-sm-3">
														<a role="button" href="bracket?id='.$res1[id].'" class="btn btn-sm btn-info btn-block">veja como foi</a>
													</div>
												</div>
							      			</li>';
                                                                                    } ?>
							      		</ul>
									</div>
						      		
							    </div>
							</div>
							<div class="col-md-12"><button type="button" class="btn btn-default btn-black extend">carregar mais</button></div>
						</div>
					</div>
				</div>

			    
	</div>


<?php 
    
    include "../foot.php";
    ?>

</body>
</html>