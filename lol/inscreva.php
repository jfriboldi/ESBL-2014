

<?php 
session_start();

if($_SESSION['logged'] == false) 
    {
        
        header('location:/esbl/inscreva.php'); 
    
    }

$id = $_GET["id"];
$userid = $_SESSION['id'];

$usuario = "root";
$senha = "";
$banco_de_dados = "esbl";

$con = mysqli_connect("localhost",$usuario,$senha, $banco_de_dados) or die("Erro ao conectar no banco de dados");

$sql = mysqli_query($con, "select id, nome, jogo, dia, valor, premiacao, min, maxi from torn where jogo = 'lol' and id = '$id'");

while($res = $sql->fetch_assoc()){
    
                                                                                    $data = substr($res[dia], 0, 10); 
                                                                                    $hora = substr($res[dia], 11, 8); 




                                                                                    $data = explode("-", $data);
                                                                                    $data = $data[2]."/".$data[1]."/".$data[0];
                                                                                    
                                                                                    $nome = $res[nome];
                                                                                    if ($res[jogo] == lol)
                                                                                    {
                                                                                        $jogo = 'League of Legends';
                                                                                    }
                                                                                    
                                                                                    $valor = $res[valor];
                                                                                    $premiacao = $res[premiacao];
                                                                                    
}

$sql_user = mysqli_query($con, "select * from instorn where userid = $userid");
$n_col = $sql_user->num_rows;

$caduser = 0;
        if ($n_col > 0)
        {
            while ($res_user = $sql_user->fetch_assoc())
            {
                $cap = $res_user['cap'];
                    
            }
            
            $caduser = 1;
            
        }

?>
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
     <link href="../css/dropzone.css" type="text/css" rel="stylesheet" />
    <script src="../dropzone.min.js"></script>
   
    <script>
         var teamname = '';
         var loc = '';
         var contr = 0;
        
         $(function () {
             
     
    
   $('body').on( 'click', '#btSave_al', function() {
           
    var cap_nick = $("#lolnick").val();
    var teamname_al = $("#txttime").val();;
    var top_al = $("#top_al").val();
    var jg_al = $("#jg_al").val();
    var mid_al = $("#mid_al").val();
    var adc_al = $("#adc_al").val();
    var sup_al = $("#sup_al").val();
    var res1_al = $("#res1_al").val();
    var res2_al = $("#res2_al").val();
    var mail_top_al = $("#mail_top_al").val();
    var mail_jg_al = $("#mail_jg_al").val();
    var mail_mid_al = $("#mail_mid_al").val();
    var mail_adc_al = $("#mail_adc_al").val();
    var mail_sup_al = $("#mail_sup_al").val();
    var mail_res1_al = $("#mail_res1_al").val();
    var mail_res2_al = $("#mail_res2_al").val();
    var torneioid_al = '<?php echo $id; ?>';
    var userid_al = '<?php echo $userid; ?>';
    
    
   
    
    if (top_al == '' || jg_al == '' || mid_al == '' || adc_al == '' || sup_al == '')
    {
        
        $("#error").html('<div class="alert alert-danger fade in" role="alert"><button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>Por favor preencha todas as <strong>posições</strong> titulares! </div>');
        
        }
        else if (mail_top_al == '' || mail_jg_al == '' || mail_mid_al == '' || mail_adc_al == '' || mail_sup_al == '')
        {
        
        $("#error").html('<div class="alert alert-danger fade in" role="alert"><button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>Por favor preencha todos os <strong>e-mails</strong>! </div>');
        }
        else
        {
    var posting_al = $.post( "/esbl/lol/cad_time_al.php", { userid: userid_al, torneioid: torneioid_al, cap: cap_nick, teamname: teamname_al, top: top_al, mail_top: mail_top_al, jg: jg_al, mail_jg: mail_jg_al, mid: mid_al, mail_mid: mail_mid_al, adc: adc_al, mail_adc: mail_adc_al, sup: sup_al, mail_sup: mail_sup_al, res1: res1_al, mail_res1: mail_res1_al, res2: res2_al, mail_res2: mail_res2_al }, 
    
    function( data ) {
  alert( "Sucesso");
}); 
    
    
        }
    return false;
    
    });
                  
            
        
        function butSearch(){
            var nick = $('#lolnick').val();
            
            nick = nick.replace(/\s+/g, '');
            nick = nick.toLowerCase();
            
        $.ajax({
         type: "GET", 
         url: "apilol.php?nick=" + nick, //URL de destino
         dataType: "json", //Tipo de Retorno
         success: function(json){ //Se ocorrer tudo certo
             
             $.each(json.id, function(key, erro){
                 if (erro.erro == '5xx'){
                     
                   $("#error_al").html('<div class="alert alert-warning fade in" role="alert"><button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>Estamos com problemas para retirar <strong>informações</strong> do League of Legends, os dados deverão ser inseridos manualmente!</div>');
                   
                   $('#sel_team').html('<div class="col-xs-12 title-insc">' +
					'<span>1</span>' +
					'<h3>DIGITE<br><small>o nome do seu time abaixo para participar no torneio</small></h3>' +
				'</div>' +
				
				'<div class="col-xs-12 ins-cla-select">' +
					'<ul id="liteam" class="list-group">' +
					  	
					'</ul>' +
				'</div>');
                                $('#liteam').html('<li class="col-xs-3">' +
                                                        '<img src="../imgs/edit.png" class="editar" alt="Editar" width="24px" height="24px" style="position: absolute; right: 10px;">' +
                                                        
					  		'<a style="min-height: 132px" id ="" href="#" class="noteam">' +
					  			'<img logo="n" class="logo" src="../imgs/cloud.png" alt="">' +
                                                                '</a>' +
                                                                '<p><span name="" style="text-transform:none"><input class="form-control n-cartao" id="txttime" type="text" placeholder="Nome do Time"></input></span>' +
                                                                '<a style="min-height: 132px" id ="" href="#" class="noteam">' +
					  			'<div class="select-bt"><span class="bt-color"></span>selecionar</div>' +
					  		'</a>' +
                                                        '</li>' +
                                                        '<div class="col-xs-12 title-insc">' +
					'<span>2</span>' +
					'<h3>ESCALE SUA EQUIPE<br><small>Escreva o nome de invocador e o e-mail em cada posição!</small></h3>' +
				'</div>' + 
                                '<div class="col-xs-6">' +
				'<span>Topo: </span><input class="form-control n-cartao" placeholder="Nome de invocador" type="text" id="top_al" name="top_al"> <input class="form-control n-cartao" placeholder="e-mail" type="text" id="mail_top_al" name="mail_top_al"><br>' +
                                '<span>Selva: </span><input class="form-control n-cartao" placeholder="Nome de invocador" type="text" id="jg_al" name="jg_al"> <input class="form-control n-cartao" placeholder="e-mail" type="text" id="mail_jg_al" name="mail_jg_al"><br>' +
                                '<span>Meio: </span><input class="form-control n-cartao" placeholder="Nome de invocador" type="text" id="mid_al" name="mid_al"> <input class="form-control n-cartao" placeholder="e-mail" type="text" id="mail_mid_al" name="mail_mid_al"><br>' +
                                '<span>Atirador: </span><input class="form-control n-cartao" placeholder="Nome de invocador" type="text" id="adc_al" name="adc_al"> <input class="form-control n-cartao" placeholder="e-mail" type="text" id="mail_adc_al" name="mail_adc_al"><br>' +
                                '<span>Suporte: </span><input class="form-control n-cartao" placeholder="Nome de invocador" type="text" id="sup_al" name="sup_al"> <input class="form-control n-cartao" placeholder="e-mail" type="text" id="mail_sup_al" name="mail_sup_al"><br>' +
                                '<span>Reserva 1: </span><input class="form-control n-cartao" placeholder="Nome de invocador" type="text" id="res1_al" name="res1_al"> <input class="form-control n-cartao" placeholder="e-mail" type="text" id="mail_res1_al" name="mail_res1_al"><br>' +
                                '<span>Reserva 2: </span><input class="form-control n-cartao" placeholder="Nome de invocador" type="text" id="res2_al" name="res2_al"> <input class="form-control n-cartao" placeholder="e-mail" type="text" id="mail_res2_al" name="mail_res2_al"><br>' +
                                '</div>' +
                                '<div class="col-xs-12"><p class="text-center"><a role="button" href="#" class="btn btn-lg btn-warning" style="margin-bottom:40px;" id="btSave_al">SALVAR E INSCREVER!</a></p></div>');
                 }
                else {
                 if (erro.erro == 'nick') {
                     
                    $("#error").html('<div class="alert alert-warning fade in" role="alert"><button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button><strong>Ops!</strong> Não encontramos esse nick, verifique se digitou corretamente!</div>');
                     
        }
        else if (erro.erro == 'time') {
            
            $("#error").html('<div class="alert alert-warning fade in" role="alert"><button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>Parece que esse <strong>invocador</strong> não faz parte de nenhum time dentro do League of Legends </div>');
            
        }
        else {
            
            $('#error').empty();
             $('#sel_team').html('<div class="col-xs-12 title-insc">' +
					'<span>1</span>' +
					'<h3>SELECIONE SEU TIME<br><small>Escolha um dos seus times abaixo para participar no torneio</small></h3>' +
				'</div>' +
				
				'<div class="col-xs-12 ins-cla-select">' +
					'<ul id="liteam" class="list-group">' +
					  	
					'</ul>' +
				'</div>');
             
            $.each(json.id, function(key, value){
           
           if (value.logo === 's') {
               
               $('#liteam').append('<li class="col-xs-3">' +
                                                        '<img src="../imgs/edit.png" class="editar" alt="Editar" width="24px" height="24px" style="position: absolute; right: 10px;">' +
					  		'<a id ="' + value.teamID + '" href="#" class="team">' +
					  			'<img logo="s" class="logo" src="../upfinal/t' + value.tid + '.png" alt="">' +
                                                                '<span name="' + value.teamID + '" style="text-transform:none">' + value.team + '</span>' +
					  			'<div class="select-bt"><span class="bt-color"></span>selecionar</div>' +
					  		'</a>' +
                                                        '</li>');
               
        }
        
                    else {
            
           
                            $('#liteam').append('<li class="col-xs-3">' +
                                                        '<img src="../imgs/edit.png" class="editar" alt="Editar" width="24px" height="24px" style="position: absolute; right: 10px;">' +
					  		'<a id ="' + value.teamID + '" href="#" class="team">' +
					  			'<img logo="n" class="logo" src="../imgs/cloud.png" alt="">' +
                                                                '<span name="' + value.teamID + '" style="text-transform:none">' + value.team + '</span>' +
					  			'<div class="select-bt"><span class="bt-color"></span>selecionar</div>' +
					  		'</a>' +
                                                        '</li>');
                                                
                                                }
                                   
                                
        });
        }
        }
        });
        
         }
        
      });
       
    
    }
        
      $('div#sel_team').on( 'click', '.noteam', function(event) {
    
        event.preventDefault();  
       
    });
        
  
   $('div#sel_team').on( 'click', '.team', function(event) {
    
        event.preventDefault();
        
        
        
        var id = $(this).attr('id');
        
           
    $(this).parent().css('background' , '#121a23');
    $(this).parent().find('.select-bt').css('background' , '#232a33');
    $(this).parent().find('.select-bt .bt-color').css('background' , '#f1c510');
    
    
   
teamname = $('span[name="' + id + '"' ).html();

    
   
    
   $.ajax({
         type: "GET", 
         url: "apilol.php?team=" + id + "&tornid=<?php echo $id; ?>", 
         dataType: "json", 
         success: function(json){ 
             
             $('#sel_memb').html('<div class="col-xs-12 title-insc">' +
					'<span>2</span>' +
					'<h3>ESCALE SUA EQUIPE<br><small>Clique sobre o invocador escohido e arraste até o mapa para escalar!</small></h3>' +
				'</div>' + 
				'<div id="mbs" class="col-xs-6  time-escale"></div>');
	
        $.each(json.na, function(key, value){
            
            
            
            if (value.erro === "cad")
            {
            
            $("#error").html('<div class="alert alert-warning fade in" role="alert"><button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>Esse <strong>time</strong> já está cadastrado nesse torneio! </div>');
           $("#sel_memb").hide();
           $("#map").hide();
           
            }
            else{
            var id = value.nick.replace(/\s+/g, '');
            if (value.img == '1')
            {
            
            $('#mbs').append('<div class="col-xs-6">' +
						'<img name="' + value.nick + '" id="' + id + '" src="../uploads/' + value.idu + '.png" height="68" width="68" alt="" style="z-index: 2; -webkit-border-radius: 50%; -moz-border-radius: 50%; border-radius: 50%;">' +
						'<h5>' + value.nick + '</h5>' +
						'<input name="' + id + '" type="text" placeholder="email">' +
					'</div>');
            
            
            }
            else {
                
            $('#mbs').append('<div class="col-xs-6">' +
						'<img name="' + value.nick + '" id="' + id + '" src="../imgs/user-logo.png" height="68" width="68" alt="" style="z-index: 2;">' +
						'<h5>' + value.nick + '</h5>' +
						'<input name="' + id + '" type="text" placeholder="email">' +
					'</div>');
                            }
                            
                            if (value.mail != '')
                            {
                                $('input[name=' + id + ']').val(value.mail);
                                }
                                $( "#" + id ).draggable({ 
                                                    snap: "#top, #jg, #mid, #adc, #sup, #res1, #res2 ",
                                                    snapMode:'inner',
                                                    scope: 'tasks',
                                                    
                                                    
                                                    start: function () {
                Positioning.initialize($(this)); },
            
            
                    revert : function(event, ui) {
                        // on older version of jQuery use "draggable"
                        // $(this).data("draggable")
                        $(this).data("uiDraggable").originalPosition = {
                            top : 0,
                            left : 0
                        };
                        return !event;
                        // return (event !== false) ? false : true;
                    }
                
        
                                                                });
                                                                
                                                                }
                                
                                });
					
                 $('#map').html('<div class="col-xs-6 map" id="pos">' +
                                    '<div class="locais-map" id="top" value="">Topo</div>' +
					'<div class="locais-map" id="jg" value=""><span class="selva"></span>Selva</div>' +
					'<div class="locais-map" id="mid" value="">Meio</div>' +
					'<div class="locais-map" id="adc" value="">Atirador</div>' +
					'<div class="locais-map" id="sup" value="">Suporte</div>' +
				'</div>' +
				'<div class="col-xs-6">' +
					'<div class="col-xs-12 title-insc">' +
						'<h3>RESERVAS<br><small>Clique e arraste para  selecionar seus reservas</small></h3>' +
					'</div>' +
					'<div class="col-xs-12">' +
						'<div class="reservas" id="res1"></div>' +
						'<div class="reservas" id="res2"></div>' +
					'</div>' +
				'</div>' +
                                '<div class="col-xs-12"><p class="text-center"><a role="button" href="#" class="btn btn-lg btn-warning" style="margin-bottom:40px;" id="btSave">SALVAR E INSCREVER!</a></p></div>');
    $("#btSave").click(function() {
    
    var cap_nick = $("#lolnick").val();
    var sel_team = id;
    var top = $("#top").attr("value");
    var jg= $("#jg").attr("value");
    var mid = $("#mid").attr("value");
    var adc = $("#adc").attr("value");
    var sup = $("#sup").attr("value");
    var res1 = $("#res1").attr("value");
    var res2 = $("#res2").attr("value");
    var mail_top = $("#mail_top").val();
    var mail_jg = $("#mail_jg").val();
    var mail_mid = $("#mail_mid").val();
    var mail_adc = $("#mail_adc").val();
    var mail_sup = $("#mail_sup").val();
    var mail_res1 = $("#mail_res1").val();
    var mail_res2 = $("#mail_res2").val();
    var torneioid = '<?php echo $id; ?>';
    var userid = '<?php echo $userid; ?>';
    var logo =  $('#' + id).find('.logo').attr('logo');
    
   
    
    if (top == '' || jg == '' || mid == '' || adc == '' || sup == '')
    {
        
        $("#error").html('<div class="alert alert-danger fade in" role="alert"><button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>Por favor preencha todas as <strong>posições</strong> titulares! </div>');
        
        }
        else if (mail_top == '' || mail_jg == '' || mail_mid == '' || mail_adc == '' || mail_sup == '')
        {
        
        $("#error").html('<div class="alert alert-danger fade in" role="alert"><button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>Por favor preencha todos os <strong>e-mails</strong>! </div>');
        }
        else
        {
    var posting = $.post( "/esbl/lol/cad_time.php", { userid: userid, torneioid: torneioid, cap: cap_nick, teamname: teamname, idtime: sel_team, top: top, mail_top: mail_top, jg: jg, mail_jg: mail_jg, mid: mid, mail_mid: mail_mid, adc: adc, mail_adc: mail_adc, sup: sup, mail_sup: mail_sup, res1: res1, mail_res1: mail_res1, res2: res2, mail_res2: mail_res2, logo: logo }, 
    
    function( data ) {
  alert( "Sucesso");
}); 
     //alert("capitão: " + cap_nick + "\n id time: " + sel_team + "\n top: " + top + "\n e-mail top: " + mail_top + "\n jg:" + jg + "\n e-mail jg: " + mail_jg +  "\n mid: " + mid + "\n e-mail mid: " + mail_mid +  "\n adc: " + adc + "\n e-mail adc:" + mail_adc +  "\n sup:" + sup + "\n e-mail sup:" + mail_sup +  "\n reserva 1:" + res1 + "\n e-mail res 1:" + mail_res1 +  "\n reserva2:" + res2 + "\n e-mail res2:" + mail_res2);
    
        }
    return false;
    
    });
    
    
                        var pastDraggable1 = "";
                        var pastDraggable2 = "";
                        var pastDraggable3 = "";
                        var pastDraggable4 = "";
                        var pastDraggable5 = "";
                        var pastDraggable6 = "";
                        var pastDraggable7 = "";
                        
                        
                        
                                                                
                                                                
                        $( "#top" ).droppable({
                            scope: 'tasks',
                           //Event to accept a draggable when dropped on the droppable
            drop: function (event, ui) {
                var plid = $(ui.draggable).attr('id');
                var named = $(ui.draggable).attr('name');
                $('#top').attr('value', named);
                $('#top h5').remove();
                $('#top').append("<h5 style='float: left;left: 80px;position: absolute;white-space: nowrap;top: 10px;text-transform: none'>" + $(ui.draggable).attr('name') + "</h5>");
                $('input[name="' + plid + '"]').attr('id', 'mail_top');
                //Get the current draggable object
                var currentDraggable1 = $(ui.draggable).attr('id');

                //If there is an object prior to the current one
                if (pastDraggable1 != "" && pastDraggable1 != currentDraggable1) {
                    //Place past object into its original coordinate
                    $("#" + pastDraggable1).animate($("#" + pastDraggable1).data().originalLocation, "slow");
                    $('input[name="' + pastDraggable1 + '"]').attr('id', '');
                }

                //Store the current draggable object
                pastDraggable1 = currentDraggable1;
            },
            out: function( event, ui ) {
                
                if ($(ui.draggable).attr('id') == pastDraggable1)
                {
                $('#top').attr('value', '');
                $('#top h5').remove();
                $('input[name="' + pastDraggable1 + '"]').attr('id', '');
                 pastDraggable1 = "";
             }
            }
            
           
                              
                        });
                        $( "#jg" ).droppable({
                             scope: 'tasks',
                                                    //Event to accept a draggable when dropped on the droppable
            drop: function (event, ui) {
                var plid = $(ui.draggable).attr('id');
                var named = $(ui.draggable).attr('name');
                $('#jg').attr('value', named);
                $('#jg h5').remove();
                $('#jg').append("<h5 style='float: left;left: 80px;position: absolute;white-space: nowrap;top: 10px;text-transform: none'>" + $(ui.draggable).attr('name') + "</h5>");
                $('input[name="' + plid + '"]').attr('id', 'mail_jg');
                //Get the current draggable object
                var currentDraggable2 = $(ui.draggable).attr('id');

                //If there is an object prior to the current one
                if (pastDraggable2 != "" && pastDraggable2 != currentDraggable2) {
                    //Place past object into its original coordinate
                    $("#" + pastDraggable2).animate($("#" + pastDraggable2).data().originalLocation, "slow");
                    $('input[name="' + pastDraggable2 + '"]').attr('id', '');
                }

                //Store the current draggable object
                pastDraggable2 = currentDraggable2;
            },
             out: function( event, ui ) {
                 if ($(ui.draggable).attr('id') == pastDraggable2)
                {
                
                $('#jg').attr('value', '');
                $('#jg h5').remove();
                $('input[name="' + pastDraggable2 + '"]').attr('id', '');
                pastDraggable2 = "";
            }
            }
                              
                        });
                        $( "#mid" ).droppable({
                             scope: 'tasks',
                                                    //Event to accept a draggable when dropped on the droppable
            drop: function (event, ui) {
                var plid = $(ui.draggable).attr('id');
                var named = $(ui.draggable).attr('name');
                $('#mid').attr('value', named);
                $('#mid h5').remove();
                $('#mid').append("<h5 style='float: left;left: 80px;position: absolute;white-space: nowrap;top: 10px;text-transform: none'>" + $(ui.draggable).attr('name') + "</h5>");
                $('input[name="' + plid + '"]').attr('id', 'mail_mid');
                //Get the current draggable object
                var currentDraggable3 = $(ui.draggable).attr('id');

                //If there is an object prior to the current one
                if (pastDraggable3 != "" && pastDraggable3 != currentDraggable3) {
                    //Place past object into its original coordinate
                    $("#" + pastDraggable3).animate($("#" + pastDraggable3).data().originalLocation, "slow");
                    $('input[name="' + pastDraggable3 + '"]').attr('id', '');
                }

                //Store the current draggable object
                pastDraggable3 = currentDraggable3;
            },
             out: function( event, ui ) {
                 if ($(ui.draggable).attr('id') == pastDraggable3)
                {
                
                $('#mid').attr('value', '');
                $('#mid h5').remove();
                $('input[name="' + pastDraggable3 + '"]').attr('id', '');
                pastDraggable3 = "";
            }
            }
                              
                        });
                        $( "#adc" ).droppable({
                             scope: 'tasks',
                                                    //Event to accept a draggable when dropped on the droppable
            drop: function (event, ui) {
               var plid = $(ui.draggable).attr('id');
               var named = $(ui.draggable).attr('name');
                $('#adc').attr('value', named);
                $('#adc h5').remove();
                $('#adc').append("<h5 style='float: left;left: 80px;position: absolute;white-space: nowrap;top: 10px;text-transform: none'>" + $(ui.draggable).attr('name') + "</h5>");
                $('input[name="' + plid + '"]').attr('id', 'mail_adc');
                //Get the current draggable object
                var currentDraggable4 = $(ui.draggable).attr('id');

                //If there is an object prior to the current one
                if (pastDraggable4 != "" && pastDraggable4 != currentDraggable4) {
                    //Place past object into its original coordinate
                    $("#" + pastDraggable4).animate($("#" + pastDraggable4).data().originalLocation, "slow");
                    $('input[name="' + pastDraggable4 + '"]').attr('id', '');
                }

                //Store the current draggable object
                pastDraggable4 = currentDraggable4;
            },
             out: function( event, ui ) {
                 if ($(ui.draggable).attr('id') == pastDraggable4)
                {
                
                $('#adc').attr('value', '');
                $('#adc h5').remove();
                $('input[name="' + pastDraggable4 + '"]').attr('id', '');
                pastDraggable4 = "";
            }
            }
            
                        });
                        $( "#sup" ).droppable({
                             scope: 'tasks',
                                                    //Event to accept a draggable when dropped on the droppable
            drop: function (event, ui) {
                var plid = $(ui.draggable).attr('id');
                var named = $(ui.draggable).attr('name');
                $('#sup').attr('value', named);
                $('#sup h5').remove();
                $('#sup').append("<h5 style='float: left;left: 80px;position: absolute;white-space: nowrap;top: 10px;text-transform: none'>" + $(ui.draggable).attr('name') + "</h5>");
                $('input[name="' + plid + '"]').attr('id', 'mail_sup');
                //Get the current draggable object
                var currentDraggable5 = $(ui.draggable).attr('id');

                //If there is an object prior to the current one
                if (pastDraggable5 != "" && pastDraggable5 != currentDraggable5) {
                    //Place past object into its original coordinate
                    $("#" + pastDraggable5).animate($("#" + pastDraggable5).data().originalLocation, "slow");
                    $('input[name="' + pastDraggable5 + '"]').attr('id', '');
                }

                //Store the current draggable object
                pastDraggable5 = currentDraggable5;
            },
             out: function( event, ui ) {
                 if ($(ui.draggable).attr('id') == pastDraggable5)
                {
                
                $('#sup').attr('value', '');
                $('#sup h5').remove();
                $('input[name="' + pastDraggable5 + '"]').attr('id', '');
                pastDraggable5 = "";
            }
            }
                        });
                        
           $( "#res1" ).droppable({
                scope: 'tasks',
                                                    //Event to accept a draggable when dropped on the droppable
            drop: function (event, ui) {
                var plid = $(ui.draggable).attr('id');
                $('#res1').attr('value', plid);
                $('#res1 h5').remove();
                $('#res1').append("<h5 style='position: relative;white-space: nowrap;top: 70px;text-transform: none;color: white;text-align: center;'>" + $(ui.draggable).attr('name') + "</h5>");
                $('input[name="' + plid + '"]').attr('id', 'mail_res1');

                //Get the current draggable object
                var currentDraggable6 = $(ui.draggable).attr('id');

                //If there is an object prior to the current one
                if (pastDraggable6 != "" && pastDraggable6 != currentDraggable6) {
                    //Place past object into its original coordinate
                    $("#" + pastDraggable6).animate($("#" + pastDraggable6).data().originalLocation, "slow");
                    $('input[name="' + pastDraggable6 + '"]').attr('id', '');
                }

                //Store the current draggable object
                pastDraggable6 = currentDraggable6;
            },
            out: function( event, ui ) {
                 if ($(ui.draggable).attr('id') == pastDraggable6)
                {
                
                
                $('#res1').attr('value', '');
                $('#res1 h5').remove();
                $('input[name="' + pastDraggable6 + '"]').attr('id', '');
                pastDraggable6 = "";
            }
                
            }
            
           
                              
                        });
           $( "#res2" ).droppable({
                scope: 'tasks',
                                                    //Event to accept a draggable when dropped on the droppable
            drop: function (event, ui) {
                var plid = $(ui.draggable).attr('id');
                $('#res2').attr('value', plid);
                $('#res2 h5').remove();
                $('#res2').append("<h5 style='position: relative;white-space: nowrap;top: 70px;text-transform: none;color: white;text-align: center;'>" + $(ui.draggable).attr('name') + "</h5>");
                $('input[name="' + plid + '"]').attr('id', 'mail_res2');

                //Get the current draggable object
                var currentDraggable7 = $(ui.draggable).attr('id');

                //If there is an object prior to the current one
                if (pastDraggable7 != "" && pastDraggable7 != currentDraggable7) {
                    //Place past object into its original coordinate
                    $("#" + pastDraggable7).animate($("#" + pastDraggable7).data().originalLocation, "slow");
                    $('input[name="' + pastDraggable7 + '"]').attr('id', '');
                }

                //Store the current draggable object
                pastDraggable7 = currentDraggable7;
            },
            out: function( event, ui ) {
                 if ($(ui.draggable).attr('id') == pastDraggable7)
                {
                
                
                $('#res2').attr('value', '');
                $('#res2 h5').remove();
                $('input[name="' + pastDraggable7 + '"]').attr('id', '');
                pastDraggable7 = "";
                
        }
                
            }
            
           
                              
                        });
                    }
                    
        });
        
         
        
        var Positioning = (function () {
        return {
            //Initializes the starting coordinates of the object
            initialize: function (object) {
                object.data("originalLocation", $(this).originalPosition = { top: 0, left: 0 });
            },
            //Resets the object to its starting coordinates
            reset: function (object) {
                object.data("originalLocation").originalPosition = { top: 0, left: 0 };
            }
        };
    })();
        
     
 
    });
        
        var caduser = '<?php echo $caduser; ?>';
        
          
       
        var getdata = '<?php echo $data; ?>';
        var gethora = '<?php echo $hora; ?>';
        
        
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
       
       $('#dataext').html(dia + ' de ' + mext + ' de ' + ano + ' as ' + gethora );
    
    $('#clockcd').countdown({until: $.countdown.UTCDate(-03, ano, mes-1, dia, hora[0], 0, 0, 0), layout:'<p class="text-center">' +
								'<img src="../imgs/clock.png" height="34" width="34" alt="">' +
								'<span class="insc-title">Faltam</span>' +
								'<span class="insc-date">{dnn}<br><small>dias</small> </span>' +
								'<span class="insc-hr">{hnn}:<br><small>horas</small></span>' +
								'<span class="insc-hr">{mnn}<br><small>minutos</small></span>' +
							'</p>' });
    
    
    var myTips = new Array();
myTips[0] = "Dica! Você pode trocar a logo do seu time, clicando no lápis do lado da logo na hora do cadastro!";
myTips[1] = "Dica! Cadastrar o e-mail de todos os jogadores é importante para todos acompanharem o progresso do time de forma mais fácil.";
myTips[2] = "Chame seus amigos para participar, quanto mais pessoas participam, melhor é o prêmio!";


    
    
    $( document ).ajaxSend(function() {
      var myRandom = Math.floor(Math.random()*myTips.length);  
$.blockUI({ message: myTips[myRandom], css: { top: ($(window).height() + 100) /2 + 'px', 
            border: 'none', 
            padding: '15px', 
            backgroundColor: '#000', 
            '-webkit-border-radius': '10px', 
            '-moz-border-radius': '10px', 
            opacity: .5, 
            color: '#fff'  }  }, preloader.active( !preloader.active() ));
   

      });

      $( document ).ajaxComplete(function() {
          
             
            $.unblockUI(preloader.active( !preloader.active() ));
        });
    
    
 
  $('#btSearch').click(function(){
   butSearch();
    });
    
  $('#lolnick').bind("enterKey",function(e){
butSearch();
});
$('#lolnick').keyup(function(e){
if(e.keyCode == 13)
{
  $(this).trigger("enterKey");
}
});
   if (caduser == '1') 
            {
            
                $('#lolnick').val('<?php echo $cap; ?>');
                
                butSearch();
                
                   
                
            
            }
            
            
  /*-------------- DROPzone.js ---------------*/ 
        $('div#sel_team').on('click', '.editar', function(e) { 
        e.preventDefault();
        
             teamname = $(this).parent().find('span').html();
            loc = $(this).parent().find('.logo');
            
            
                        
            $.blockUI({ message: $('#MyDropZone') , css: {width: '600px', height: '365px' }, onOverlayClick: $.unblockUI  }); 
 
      
        
        }); 

    var maxImageWidth = 300,
     maxImageHeight = 300;
   
  Dropzone.options.MyDropZone = {
        paramName: "file",
        maxFiles: 1,
        thumbnailWidth: 300,
        thumbnailHeight: 300,
        uploadMultiple: false,
        parallelUploads: 1,
        maxFilesize: 4096,
        acceptedFiles: "image/*",
        
        
        
        
        init: function () {
        this.on("thumbnail", function(file) {
                      
           if (file.width > maxImageWidth || file.height > maxImageHeight) {
                file.rejectDimensions();
            }
            if (file.width != file.height)
            {
                file.rejectprop();
            }
            else {
                file.acceptDimensions();
            }
            
           
        });
         
         this.on("sending", function (file, xhr, formData){
            
            var name = teamname + '.png';
            formData.append("filename", name);
             
         }); 
        
        this.on("success", function (file) {
            
            
            loc.attr('src', '/esbl/uploads/' + teamname + '.png?' + contr );
            loc.attr('logo', 's');
            contr = contr + 1;
            $.unblockUI();
            
            this.removeAllFiles();
            
        });
       
    },
    accept: function(file, done) {
            file.acceptDimensions = done;
            
            file.rejectDimensions = function() { done("Dimensão Não Permitida"); };
            
            file.rejectprop = function() { done("A imagem deve conter mesma altura e largura"); };
}

    };
        
/*-------------- DROPzone.js ---------------*/             
    });
        
        
          
    
    
   
    
    
    
    
   
     
    
    
    </script>
   
</head>

<?php 


include "../head.php";
include "../headg.php";

?>
<form action="/esbl/upload.php" class="dropzone" id="MyDropZone" hidden></form>
<div class="container-fluid bg-increver">
    	<div class="container">
			<ol class="breadcrumb">
			  <li><a href="index.php">Home</a></li>
			  <li class="active">inscrição</li>
			</ol>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="col-xs-12 h-torneio-ins">
						<div class="col-xs-6">
							<h2><small><?php echo $nome; ?></small><br><?php echo $jogo; ?></h2>
						</div>
						<div class="col-xs-3" id="clockcd">
							
						</div>
						<div class="col-xs-3">
							<p class="text-center">
								<img src="../imgs/calle.png" height="34" width="34" alt="">
								<span class="insc-title">começa em</span>
								<span class="insc-date"><?php echo $data; ?><br><small id="dataext"></small></span>
							</p>
						</div>
					</div>
				</div>
				
				<div class="col-xs-12">
					<div class="input-group">
				      	<input type="text" class="form-control" placeholder="Digite seu nome de invocador do League of Legends" id="lolnick">
				      	<span class="input-group-btn">
				        	<button class="btn btn-warning" type="button" id="btSearch">Buscar</button>
				      	</span>
				    </div>
				</div>
                                <div id="error_al"></div>
                            <div id="sel_team"></div>
                            
                            
				
                            <div id="sel_memb"></div>
                            
                            <div id="map"></div>
                            
				
			</div>
                    <div id="error"></div>
		</div>
    
	</div>
 <script>
   var preloader = new GSPreloader({
  radius:42, 
  dotSize:15, 
  dotCount:10, 
  colors:["#5a5a5a","#f1c510","#192431"], //have as many or as few colors as you want.
  boxOpacity:0.2,
  boxBorder:"1px solid #000",
  animationOffset: 1.8 //jump 1.8 seconds into the animation for a more active part of the spinning initially (just looks a bit better in my opinion)
});

//open the preloader
preloader.active(false);



//this is the whole preloader class/function
function GSPreloader(options) {
  options = options || {};
  var parent = options.parent || document.body,
      element = this.element = document.createElement("div"),
      radius = options.radius || 42,
      dotSize = options.dotSize || 15,
      animationOffset = options.animationOffset || 1.8, //jumps to a more active part of the animation initially (just looks cooler especially when the preloader isn't displayed for very long)
      createDot = function(rotation) {
          var dot = document.createElement("div");
        element.appendChild(dot);
        TweenLite.set(dot, {width:dotSize, height:dotSize, transformOrigin:(-radius + "px 0px"), x: radius, backgroundColor:colors[colors.length-1], borderRadius:"50%", force3D:true, position:"absolute", rotation:rotation});
        dot.className = options.dotClass || "preloader-dot";
        return dot; 
      }, 
      i = options.dotCount || 10,
      rotationIncrement = 360 / i,
      colors = options.colors || ["#61AC27","black"],
      animation = new TimelineLite({paused:true}),
      dots = [],
      isActive = false,
      box = document.createElement("div"),
      tl, dot, closingAnimation, j;
  colors.push(colors.shift());
  
  //setup background box
  TweenLite.set(box, {width: radius * 2 + 70, height: radius * 2 + 70, borderRadius:"14px", backgroundColor:options.boxColor || "black", border: options.boxBorder || "1px solid #AAA", position:"absolute", xPercent:-50, yPercent:-50, opacity:((options.boxOpacity != null) ? options.boxOpacity : 0.3)});
  box.className = options.boxClass || "preloader-box";
  element.appendChild(box);
  
  parent.appendChild(element);
  TweenLite.set(element, {position:"fixed", top:"45%", left:"50%", perspective:600, overflow:"visible", zIndex:2000});
  animation.from(box, 0.1, {opacity:0, scale:0.1, ease:Power1.easeOut}, animationOffset);
  while (--i > -1) {
    dot = createDot(i * rotationIncrement);
    dots.unshift(dot);
    animation.from(dot, 0.1, {scale:0.01, opacity:0, ease:Power1.easeOut}, animationOffset);
    //tuck the repeating parts of the animation into a nested TimelineMax (the intro shouldn't be repeated)
    tl = new TimelineMax({repeat:-1, repeatDelay:0.25});
    for (j = 0; j < colors.length; j++) {
      tl.to(dot, 2.5, {rotation:"-=360", ease:Power2.easeInOut}, j * 2.9)
        .to(dot, 1.2, {skewX:"+=360", backgroundColor:colors[j], ease:Power2.easeInOut}, 1.6 + 2.9 * j);
    }
    //stagger its placement into the master timeline
    animation.add(tl, i * 0.07);
  }
  if (TweenLite.render) {
    TweenLite.render(); //trigger the from() tweens' lazy-rendering (otherwise it'd take one tick to render everything in the beginning state, thus things may flash on the screen for a moment initially). There are other ways around this, but TweenLite.render() is probably the simplest in this case.
  }
  
  //call preloader.active(true) to open the preloader, preloader.active(false) to close it, or preloader.active() to get the current state.
  this.active = function(show) {
    if (!arguments.length) {
      return isActive;
    }
    if (isActive != show) {
      isActive = show;
      if (closingAnimation) {
        closingAnimation.kill(); //in case the preloader is made active/inactive/active/inactive really fast and there's still a closing animation running, kill it.
      }
      if (isActive) {
        element.style.visibility = "visible";
        TweenLite.set([element, box], {rotation:0});
        animation.play(animationOffset);
      } else {
        closingAnimation = new TimelineLite();
        if (animation.time() < animationOffset + 0.3) {
          animation.pause();
          closingAnimation.to(element, 1, {rotation:-360, ease:Power1.easeInOut}).to(box, 1, {rotation:360, ease:Power1.easeInOut}, 0);
        }
        closingAnimation.staggerTo(dots, 0.3, {scale:0.01, opacity:0, ease:Power1.easeIn, overwrite:false}, 0.05, 0).to(box, 0.4, {opacity:0, scale:0.2, ease:Power2.easeIn, overwrite:false}, 0).call(function() { animation.pause(); closingAnimation = null; }).set(element, {visibility:"hidden"});
      }
    }
    return this;
  };
}

</script>

<?php 

include "../foot.php";

?>

</body>
</html>
