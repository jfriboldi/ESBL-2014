<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
    <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
    <script>
   $(document).ready(function(){
       var q = 0;
       var m = 0;
       var logo = 0;
       var lp = 0;
       var p = 0;
       var dif = 0;
       $("#btn").click(function(){
           q = q + 15;
           $.ajax({
                type: "POST", 
                url: "gclass.php" , //URL de destino
                dataType: "json", //Tipo de Retorno
                data: { n: q },
                success: function(json){
                    $.each(json.class, function(key, value){
                        p = value.p;
                        lp = value.lp;
                        dif = lp - p;
                        
                        if (dif > 0) {
                            m = '<img src="../imgs/up.png">' + dif;
                        }
                        else if (dif < 0) {
                            m = '<img src="../imgs/down.png">' + Math.abs(dif);
                        }
                        else {
                            m = '-';
                        }
                        
                        if (value.logo == 's'){
                            logo = '<img width="30px" height="30px" src="../upfinal/t' + value.id + '.png">';
                        }
                        else {
                            logo = '<img src="../imgs/time-img.jpg">';
                        }
                        
                        $('#tablec' ).append('<tr>' +
                                                   '<td class="text-center">' + p + '</td>' +
                                                    '<td class="text-center">' + m + '</td>' +
                                                    '<td class="text-left nome-time">' + logo + value.equip + '</td>' +
                                                    '<td class="text-center">' + value.totalpoints + '</td>' +
                                                '</tr>');
                    });
                }
            });
       
        });
        function buscaTime(){
            var searchw = $('#searchin').val();
            $.ajax({
                type: "POST", 
                url: "pclass.php" , //URL de destino
                dataType: "json", //Tipo de Retorno
                data: { searchw: searchw },
                success: function(json){ //Se ocorrer tudo certo
                    
                    $('#tablec tbody').remove();
                    $.each(json.pcl, function(key, value){
                        p = value.p;
                        lp = value.lp;
                        dif = lp - p;
                        
                        if (dif > 0) {
                            m = '<img src="../imgs/up.png">' + dif;
                        }
                        else if (dif < 0) {
                            m = '<img src="../imgs/down.png">' + Math.abs(dif);
                        }
                        else {
                            m = '-';
                        }
                        
                        if (value.logo == 's'){
                            logo = '<img width="30px" height="30px" src="../upfinal/t' + value.id + '.png">';
                        }
                        else {
                            logo = '<img src="../imgs/time-img.jpg">';
                        }
                        
                        $('#tablec' ).append('<tr>' +
                                                   '<td class="text-center">' + p + '</td>' +
                                                    '<td class="text-center">' + m + '</td>' +
                                                    '<td class="text-left nome-time">' + logo + value.equip + '</td>' +
                                                    '<td class="text-center">' + value.totalpoints + '</td>' +
                                                '</tr>');
                 
                    });
                }
            });
        }
        
          $('#bts').click(function(){
   buscaTime();
    });
    
  $('form').on('submit', function(e) {
  e.preventDefault();
  buscaTime();
});
    });
   
   </script>
     
    <body>
        <?php
        include "../head.php";
        include "../headg.php";
        
        $usuario = "root";
$senha = "";
$banco_de_dados = "esbl";

$con = mysqli_connect("localhost",$usuario,$senha, $banco_de_dados) or die("Erro ao conectar no banco de dados");
        
        $sql = mysqli_query($con, "select equips.id, equips.logo, equips.lp, equips.p, equips.nome as equipes , sum(class.pts) as totalpoints from class inner join equips on class.id_equip = equips.id group by id_equip ORDER BY equips.p ASC limit 15");
        
        ?>
        <div class="container-flid bg-top"></div>
    
    <div class="container-fluid bread-bg">
    	<div class="container">
    		<ol class="breadcrumb">
			  <li><a href="index.php">Home</a></li>
			  <li class="active">Classificação</li>
			</ol>
    	</div>
    </div>

	<div class="container all-pages">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<h2>Classificação</h2>
				<form action="">
					<div class="input-group class-input-group">
				      	<input type="text" class="form-control" id="searchin" placeholder="Busque aqui o time">
				      	<span class="input-group-btn">
				        	<button class="btn btn-warning" id="bts" type="button">buscar</button>
				      	</span>
				    </div>
				</form>
				<table class="table table-bordered classificacao" id="tablec">
			    	<thead>
			        	<tr>
			          		<th class="max">Ranking</th>
			          		<th class="max">Mudança</th>
			          		<th>Nome do time</th>
			          		<th class="max">Pontos</th>
			        	</tr>
			      	</thead>
			      	<tbody>
                                    <?php
                                    while($res = $sql->fetch_assoc()){
    if ($res[lp] == 0) {
        $m = 0;
    }
    else {
    $m = $res[lp] - $res[p];
    }
    echo
                                                '<tr>
                                                    <td class="text-center">'.$res[p].'</td>
                                                    <td class="text-center">'; if ($m > 0) { echo'<img src="../imgs/up.png">'.$m; } elseif ($m < 0)  { echo'<img src="../imgs/down.png">'.abs($m); } else { echo '-';} echo'</td>
                                                    <td class="text-left nome-time">'; if ($res[logo] == 's') { echo'<img width="30px" height="30px" src="../upfinal/t'.$res[id].'.png">'; } else { echo'<img src="../imgs/time-img.jpg">'; } echo $res[equipes].'</td>
                                                    <td class="text-center">'.$res[totalpoints].'</td>
                                                </tr>';
    
}
			        	

?>
			        	
			      	</tbody>
			    </table>
			    <button id="btn" class="btn btn-default btn-black extend" type="button">carregar mais</button>
			</div>
		</div>
	</div>

	<div class="container-fluid bot-classificacao">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<h3>Vantagens de estar em primeiro lugar</h3>
						<p>Desafie jogadores de todos os níveis neste campeoanto de League of Legendas da esbl.com.br ou aprimorare suas habilidades na prática partidas contra alguns dos maiores estrategistas deste game. Monte seu time, chame seus amigos, inscreva-se e prepare para se divertir e ganhar dinheiro!</p>
					</div>
					<div class="col-md-2"></div>
				</div>
				<div class="col-md-4">
					<h5>Ganhe Bonus <br><small>nos campeonatos</small></h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eu cursus orci. Vivamus dolor libero, auctor ac orci id, venenatis aliquet enim.</p>
				</div>
				<div class="col-md-4">
					<h5>Ofertas <br><small>exclusivas</small></h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eu cursus orci. Vivamus dolor libero, auctor ac orci id, venenatis aliquet enim.</p>
				</div>
				<div class="col-md-4">
					<h5>Prêmios em <br><small>dinheiro</small></h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eu cursus orci. Vivamus dolor libero, auctor ac orci id, venenatis aliquet enim.</p>
				</div>
			</div>
		</div>
	</div>
        
        <?php 

include "../foot.php";

?>
    </body>
</html>