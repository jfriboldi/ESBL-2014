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
   var q = 4;
   var x = 0;
   var i = 0;
   var cst = 0;
   var w = 0;
   var imgt = 0;
   var imgj = 0;
   var imgm = 0;
   var imga = 0;
   var imgs = 0;
   
   $("#btn").click(function(){
    q = q + 4;
    x = x + 1;
      $.ajax({
         type: "POST", 
         url: "gequip.php" , //URL de destino
         dataType: "json", //Tipo de Retorno
         data: { n: q },
         success: function(json){ //Se ocorrer tudo certo
             $('#alle').append('<div id="d' + x + '" class="line-equipe"></div>');
            $.each(json.equip, function(key, value){
                if (value.logo === 's')
                {
                    i = 'src="../upfinal/t'+ value.id +'.png"';
                    
                }
                else
                {
                    i = 'src="../imgs/perfil-user.jpg"';
                }
                
                if (value.imt == '1')
                {
                    imgt = '<img id="img" width="59px" height="59px" src="../uploads/' + value.idt + '.png" alt="">';
                }
                
                else 
                {
                    imgt = '<img width="60" height="60" alt="" src="../imgs/player.jpg">';
                }
                
                if (value.imj == '1')
                {
                    imgj = '<img id="img" width="59px" height="59px" src="../uploads/' + value.idj + '.png" alt="">';
                }
                
                else 
                {
                    imgj = '<img width="60" height="60" alt="" src="../imgs/player.jpg">';
                }
                if (value.imm == '1')
                {
                    imgm = '<img id="img" width="59px" height="59px" src="../uploads/' + value.idm + '.png" alt="">';
                }
                
                else 
                {
                    imgm = '<img width="60" height="60" alt="" src="../imgs/player.jpg">';
                }
                if (value.ima == '1')
                {
                    imga = '<img id="img" width="59px" height="59px" src="../uploads/' + value.ida + '.png" alt="">';
                }
                
                else 
                {
                    imga = '<img width="60" height="60" alt="" src="../imgs/player.jpg">';
                }
                if (value.ims == '1')
                {
                    imgs = '<img id="img" width="59px" height="59px" src="../uploads/' + value.ids + '.png" alt="">';
                }
                
                else 
                {
                    imgs = '<img width="60" height="60" alt="" src="../imgs/player.jpg">';
                }
            $('#d' + x ).append('<div class="col-md-3 position-inset">' +
                                            '<div class="equipe">' +
                                                '<p class="text-center"><img alt="" ' + i + ' height="166"></p>' +
                                                '<h4>' + value.nome +'</h4>' +
                                                '<p class="text-center"><small>League of Legends <br>' + value.tp + ' pontos</small></p>' +
                                                '<div class="view-equipe">' +
                                                                                '<span>+</span>' +
                                                                                '<p>formação</p>' +
                                                                                '<div class="disp-equipe">' +
                                                                                    '<div class="bg-disc-equipe">' +
                                                                                        '<div class="torneios">' +
                                                                                            '<div class="col-md-12 col-sm-12 top-time">' +
                                                                                                '<ul>' +
                                                                                                    '<li>' +
                                                                                                        imgt +
                                                                                                        '<h3>'+ value.top +'</h3>' +
                                                                                                        '<p>Topo</p>' +
                                                                                                    '</li>' +
                                                                                                    '<li>' +
                                                                                                        imgj +
                                                                                                        '<h3>'+ value.jg +'</h3>' +
                                                                                                        '<p>Selva</p>' +
                                                                                                    '</li>' +
                                                                                                    '<li>' +
                                                                                                        imgm +
                                                                                                        '<h3>'+ value.mid +'</h3>' +
                                                                                                        '<p>Meio</p>' +
                                                                                                    '</li>' +
                                                                                                    '<li>' +
                                                                                                        imga +
                                                                                                        '<h3>'+ value.adc +'</h3>' +
                                                                                                        '<p>Atirador</p>' +
                                                                                                    '</li>' +
                                                                                                    '<li>' +
                                                                                                        imgs +
                                                                                                        '<h3>'+ value.sup +'</h3>' +
                                                                                                        '<p>Suporte</p>' +
                                                                                                    '</li>' +
                                                                                                '</ul>' +
                                                                                            '</div>' +
                                                                                        '</div>' +
                                                                                    '</div>' +
                                                                                '</div>' +
                                                '</div>' +
                                            '</div>' +
                                        '</div>' + 
                                       '</div>');
                               
        });
                
         }
      });
   });
   function buscaTime(){
   var searchw = $('#searchin').val();
   $.ajax({
         type: "POST", 
         url: "pequip.php" , //URL de destino
         dataType: "json", //Tipo de Retorno
         data: { searchw: searchw },
         success: function(json){ //Se ocorrer tudo certo
             cst = 0;
             w = 0;
             $('#alle').html('<div id="d' + w + '" class="line-equipe"></div>');
            $.each(json.tes, function(key, value){
                if (value.logo === 's')
                {
                    i = 'src="../upfinal/t'+ value.id +'.png"';
                    
                }
                else
                {
                    i = 'src="../imgs/perfil-user.jpg"';
                }
                if (value.imt == '1')
                {
                    imgt = '<img id="img" width="59px" height="59px" src="../uploads/' + value.idt + '.png" alt="">';
                }
                
                else 
                {
                    imgt = '<img width="60" height="60" alt="" src="../imgs/player.jpg">';
                }
                
                if (value.imj == '1')
                {
                    imgj = '<img id="img" width="59px" height="59px" src="../uploads/' + value.idj + '.png" alt="">';
                }
                
                else 
                {
                    imgj = '<img width="60" height="60" alt="" src="../imgs/player.jpg">';
                }
                if (value.imm == '1')
                {
                    imgm = '<img id="img" width="59px" height="59px" src="../uploads/' + value.idm + '.png" alt="">';
                }
                
                else 
                {
                    imgm = '<img width="60" height="60" alt="" src="../imgs/player.jpg">';
                }
                if (value.ima == '1')
                {
                    imga = '<img id="img" width="59px" height="59px" src="../uploads/' + value.ida + '.png" alt="">';
                }
                
                else 
                {
                    imga = '<img width="60" height="60" alt="" src="../imgs/player.jpg">';
                }
                if (value.ims == '1')
                {
                    imgs = '<img id="img" width="59px" height="59px" src="../uploads/' + value.ids + '.png" alt="">';
                }
                
                else 
                {
                    imgs = '<img width="60" height="60" alt="" src="../imgs/player.jpg">';
                }
                if (((cst % 4) === 0) && (cst !== 1))
                {
                w = w + 1;
                
                $('#alle').append('<div id="d' + w + '" class="line-equipe"></div>');
            
                }
                cst = cst + 1;
                $('#d' + w ).append('<div class="col-md-3 position-inset">' +
                                            '<div class="equipe">' +
                                                '<p class="text-center"><img alt="" ' + i + ' height="166"></p>' +
                                                '<h4>' + value.nome +'</h4>' +
                                                '<p class="text-center"><small>League of Legends <br>' + value.tp + ' pontos</small></p>' +
                                                '<div class="view-equipe">' +
                                                                                '<span>+</span>' +
                                                                                '<p>formação</p>' +
                                                                                '<div class="disp-equipe">' +
                                                                                    '<div class="bg-disc-equipe">' +
                                                                                        '<div class="torneios">' +
                                                                                            '<div class="col-md-12 col-sm-12 top-time">' +
                                                                                                '<ul>' +
                                                                                                    '<li>' +
                                                                                                        imgt +
                                                                                                        '<h3>'+ value.top +'</h3>' +
                                                                                                        '<p>Topo</p>' +
                                                                                                    '</li>' +
                                                                                                    '<li>' +
                                                                                                        imgj +
                                                                                                        '<h3>'+ value.jg +'</h3>' +
                                                                                                        '<p>Selva</p>' +
                                                                                                    '</li>' +
                                                                                                    '<li>' +
                                                                                                        imgm +
                                                                                                        '<h3>'+ value.mid +'</h3>' +
                                                                                                        '<p>Meio</p>' +
                                                                                                    '</li>' +
                                                                                                    '<li>' +
                                                                                                        imga +
                                                                                                        '<h3>'+ value.adc +'</h3>' +
                                                                                                        '<p>Atirador</p>' +
                                                                                                    '</li>' +
                                                                                                    '<li>' +
                                                                                                        imgs +
                                                                                                        '<h3>'+ value.sup +'</h3>' +
                                                                                                        '<p>Suporte</p>' +
                                                                                                    '</li>' +
                                                                                                '</ul>' +
                                                                                            '</div>' +
                                                                                        '</div>' +
                                                                                    '</div>' +
                                                                                '</div>' +
                                                '</div>' +
                                            '</div>' +
                                        '</div>' + 
                                       '</div>');
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
        
        $sql = mysqli_query($con, "select equips.id, equips.nome, equips.top, equips.jg, equips.mid, equips.adc, equips.sup, equips.logo, sum(class.pts) as tp from class inner join equips on equips.id = class.id_equip group by equips.id order by equips.nome limit 8");
        
        
        
        ?>
        <div class="container-flid bg-top"></div>
    
    <div class="container-fluid bread-bg">
    	<div class="container">
    		<ol class="breadcrumb">
			  <li><a href="index.php">Home</a></li>
			  <li class="active">Equipes</li>
			</ol>
    	</div>
    </div>

	<div class="container all-pages">
		<div class="row">
			<div class="col-sm-12">
				<h2>Equipes</h2>
					<form action="">
						<div class="input-group class-input-group">
					      	<input id="searchin" type="text" class="form-control" placeholder="Busque aqui o time">
					      	<span class="input-group-btn">
					        	<button id="bts" class="btn btn-warning" type="button">buscar</button>
					      	</span>
					    </div>
					</form>
			</div>
                    
                           <div id="alle"> 
                            <?php
                                $y = 1;
                                $imgtop = 0;
                                $imgjg = 0;
                                $imgmid = 0;
                                $imgadc = 0;
                                $imgsup = 0;
                                
                                while($res = $sql->fetch_assoc()){
                                    
                                    
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
               
                                    
                                    
                                    
                                    if(((($y - 1) % 4) == 0) || ($y == 1)) 
                                    {
                                        echo' <div class="line-equipe">';
                                    }
                                    echo'
                                        
                                        <div class="col-md-3 position-inset">
                                            <div class="equipe">
                                                <p class="text-center"><img alt=""'; if ($res[logo] == 's') { echo'src="../upfinal/t'.$res[id].'.png" height="166"'; } else { echo'src="../imgs/perfil-user.jpg" height="166"'; } echo'></p>
                                                <h4>'.$res[nome].'</h4>
                                                <p class="text-center"><small>League of Legends <br>'.$res[tp].' pontos</small></p>
                                                <div class="view-equipe">
                                                                                <span>+</span>
                                                                                <p>formação</p>
                                                                                <div class="disp-equipe">
                                                                                    <div class="bg-disc-equipe">
                                                                                        <div class="torneios">
                                                                                            <div class="col-md-12 col-sm-12 top-time">
                                                                                                <ul>
                                                                                                    <li>';
                                                                                                        if ($imgtop == '1'){
                                
                                                                                                            echo '<img id="img" width="59px" height="59px" src="../uploads/'.$topid.'.png" alt="">';
                                                                                                         }
                                                                                                         else
                                                                                                        {
                                                                                                            echo '<img id="img" width="59px" height="59px" src="../imgs/player.jpg" alt="">'; 
                                                                                                         }
                                                                                                        echo'<h3>'.$res[top].'</h3>
                                                                                                        <p>Topo</p>
                                                                                                    </li>
                                                                                                    <li>';
                                                                                                        if ($imgjg == '1'){
                                
                                                                                                            echo '<img id="img" width="59px" height="59px" src="../uploads/'.$jgid.'.png" alt="">';
                                                                                                         }
                                                                                                         else
                                                                                                        {
                                                                                                            echo '<img id="img" width="59px" height="59px" src="../imgs/player.jpg" alt="">'; 
                                                                                                         }
                                                                                                        echo'<h3>'.$res[jg].'</h3>
                                                                                                        <p>Selva</p>
                                                                                                    </li>
                                                                                                    <li>';
                                                                                                        if ($imgmid == '1'){
                                
                                                                                                            echo '<img id="img" width="59px" height="59px" src="../uploads/'.$midid.'.png" alt="">';
                                                                                                         }
                                                                                                         else
                                                                                                        {
                                                                                                            echo '<img id="img" width="59px" height="59px" src="../imgs/player.jpg" alt="">'; 
                                                                                                         }
                                                                                                        echo'<h3>'.$res[mid].'</h3>
                                                                                                        <p>Meio</p>
                                                                                                    </li>
                                                                                                    <li>';
                                                                                                        if ($imgadc == '1'){
                                
                                                                                                            echo '<img id="img" width="59px" height="59px" src="../uploads/'.$adcid.'.png" alt="">';
                                                                                                         }
                                                                                                         else
                                                                                                        {
                                                                                                            echo '<img id="img" width="59px" height="59px" src="../imgs/player.jpg" alt="">'; 
                                                                                                         }
                                                                                                        echo'<h3>'.$res[adc].'</h3>
                                                                                                        <p>Atirador</p>
                                                                                                    </li>
                                                                                                    <li>';
                                                                                                        if ($imgsup == '1'){
                                
                                                                                                            echo '<img id="img" width="59px" height="59px" src="../uploads/'.$supid.'.png" alt="">';
                                                                                                         }
                                                                                                         else
                                                                                                        {
                                                                                                            echo '<img id="img" width="59px" height="59px" src="../imgs/player.jpg" alt="">'; 
                                                                                                         }
                                                                                                        echo'<h3>'.$res[sup].'</h3>
                                                                                                        <p>Suporte</p>
                                                                                                    </li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </div>	
                                                                                    </div>
                                                                                </div>
                                                </div>
                                            </div>
                                        </div>';
                                    
                                    if(($y % 4) == 0)
                                    {
                                        echo' </div>';
                                    }
                                    
                                    $y++;
                                    
                                    $imgtop = 0;
                                $imgjg = 0;
                                $imgmid = 0;
                                $imgadc = 0;
                                $imgsup = 0;
                                }
                                if (($y - 1 % 4) != 0)
                                {
                                    echo'</div>';
                                }
                               
                             ?>
        
                           </div>
				
                    <div  class="col-sm-12">
				<button id="btn" class="btn btn-default btn-black extend" type="button">carregar mais</button>
			</div>
		</div>
            </div>
        
        <?php 

include "../foot.php";

?>
    </body>
</html>
