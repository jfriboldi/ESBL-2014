<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php

session_start();

if($_SESSION['logged'] == false) 
    {
        
        header('location:/esbl/inscreva.php'); 
    
    }

$userid = $_SESSION['id'];

$usuario = "root";
$senha = "";
$banco_de_dados = "esbl";

$con = mysqli_connect("localhost",$usuario,$senha, $banco_de_dados) or die("Erro ao conectar no banco de dados");

$sql1 = mysqli_query($con, "select id, nicklol, img from users where id = '$userid' ");

while($res1 = $sql1->fetch_assoc()){
    
    $img = $res1['img'];
    $nick = $res1['nicklol'];
}
?>
<html>
    <head>
        <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="scripts/jquery.plugin.js"></script>
<script src="scripts/jquery.countdown.js"></script>
<script src="scripts/jquery.blockUI.js"></script>
<link href="css/dropzone.css" type="text/css" rel="stylesheet" />
   <script src="dropzone.min.js"></script>

    <title>ESBL</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet">
    <link href="css/screen.css" rel="stylesheet">
    <link href="css/league-of-legends.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        
    <script>
        var nick = '<?php echo $nick; ?>';
        var userid = '<?php echo $userid; ?>'; 
        var contr = 0;
        nick = nick.replace(/\s+/g, '');
        
  var torn = function () {   
    $.ajax({
         type: "POST", 
         url: "usertorn.php" , //URL de destino
         dataType: "html", //Tipo de Retorno
         data: { nick: nick }
})
  .done(function( msg ) { 
      
        $('#content').html(msg);
             
             
         });   
    
         }
     var team = function () {   
    $.ajax({
         type: "POST", 
         url: "usertimes.php" , //URL de destino
         dataType: "html", //Tipo de Retorno
         data: { nick: nick }
})
  .done(function( msg ) { 
      
        $('#content').html(msg);
             
             
         });   
    
         }
    
    var dados = function () {   
    $.ajax({
         type: "POST", 
         url: "userdados.php" , //URL de destino
         dataType: "html", //Tipo de Retorno
         data: { userid: userid }
})
  .done(function( msg ) { 
      
        $('#content').html(msg);
             
             
         });   
    
         }
        
  $(function () {
 torn();
 
  $('#torne').click(function (e){ 
  
    e.preventDefault();
    $('#team, #dados').removeClass('active');
    $('#torne').addClass('active');
    torn();
    
    });
    
    $('#team').click(function (e){ 
  
    e.preventDefault();
    $('#torne, #dados').removeClass('active');
    $('#team').addClass('active');
    team();
    
    });
    
    $('#dados').click(function (e){ 
  
    e.preventDefault();
    $('#torne, #dados, #team').removeClass('active');
    $('#dados').addClass('active');
    dados();
    
    });
  
  /*-------------- DROPzone.js ---------------*/ 
        $('div#content').on('click', '#foto', function(e) { 
        e.preventDefault();
        
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
                file.rejectDimensions()
            }
            else {
                file.acceptDimensions();
            }
           
        });
         
         this.on("sending", function (file, xhr, formData){
            
            var name = userid + '.png';
            formData.append("filename", name);
            formData.append("userimg", "s");
            formData.append("userid", userid);
         }); 
        
        this.on("success", function (file) {
            
            
            $('#img').attr('src', '/esbl/uploads/' + userid + '.png?' + contr );
            $('#smallimg').attr('src', '/esbl/uploads/' + userid + '.png?' + contr );
            contr = contr + 1;
            $.unblockUI();
            <?php $_SESSION['img'] = '1'; ?>
            
            this.removeAllFiles();
            
        });
       
    },
    accept: function(file, done) {
            file.acceptDimensions = done;
            
            file.rejectDimensions = function() { done("Dimensão Não Permitida"); };
}

    };
        
/*-------------- DROPzone.js ---------------*/   
 
         
    });
    </script>    
    
    </head>
    <body>
        <?php
        include "head.php";
        ?>
        <form action="/esbl/upload.php" class="dropzone" id="MyDropZone" hidden></form>
         <div class="container-flid bg-top user">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-12">
                            <?php
                            
                            if ($img == '1'){
                                
                                echo '<img id="img" src="uploads/'.$userid.'.png" alt="">';
                            }
                            else
                            {
                             echo '<img id="img" src="/esbl/imgs/perfil-user.jpg" alt="">'; 
                            }
                            ?>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="container-fluid bread-bg">
    	<div class="container">
    		<ol class="breadcrumb">
			  <li><a href="#">Home</a></li>
			  <li class="active">meu perfil</li>
			  <li>meus torneios</li>
			</ol>
    	</div>
    </div>
	<div class="container all-pages user-all">
		<div class="row">
			<div class="col-md-2">
				<ul class="user-menu">
					<li><a class="u-trofeu active" href="#" id="torne">Meus Torneios</a></li>
					<li><a class="u-times" href="#" id="team">Meus Times</a></li>
					<li><a class="u-jogos" href="#">Meus Jogos</a></li>
					<li><a class="u-pagamentos" href="#">Pagamentos</a></li>
					<li><a class="u-dados" href="#" id="dados">Meus Dados</a></li>
					<li><a class="u-logout" href="#">Logout</a></li>
				</ul>
			</div>
                    <div id="content"></div>
		</div>
	</div>
        <?php
        include "foot.php";
        ?>
    </body>
    
</html>
