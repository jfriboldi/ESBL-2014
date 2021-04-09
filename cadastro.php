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
    <script src="/esbl/scripts/jquery.maskedinput.js"></script>
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
        var x = 0;
        var logint = 0;
        var mailt = 0;
        var nickt = 0;
        function confCampos(){
            
            
            var formu = document.forms["cadas"];
            
            if (formu["nome"].value==''){
                formu["nome"].style.border="thin solid red";
            
                x=1;
                       
            }
            else {
                formu["nome"].style.border="";
               
            }
               
            if (formu["sobrenome"].value==''){
                formu["sobrenome"].style.border="thin solid red";
                x=1;
            }
            else {
                formu["sobrenome"].style.border="";
                
            }
            
            if (formu["cpf"].value==''){
                formu["cpf"].style.border="thin solid red";
                x=1;
            }
            else {
                formu["cpf"].style.border="";
                
            }
            
            if (formu["mail"].value==''){
                formu["mail"].style.border="thin solid red";
                x=1;
            }
            else {
                formu["mail"].style.border="";
                
            }
            
            if (formu["nasc"].value==''){
                formu["nasc"].style.border="thin solid red";
                x=1;
            }
            else {
                formu["nasc"].style.border="";
                
            }
            if (formu["tel"].value==''){
                formu["tel"].style.border="thin solid red";
                x=1;
            }
            else {
                formu["tel"].style.border="";
                
            }
            if (formu["end"].value==''){
                formu["end"].style.border="thin solid red";
                x=1;
            }
            else {
                formu["end"].style.border="";
                
            }
            if (formu["cep"].value==''){
                formu["cep"].style.border="thin solid red";
                x=1;
            }
            else {
                formu["cep"].style.border="";
               
            }
            
            if (formu["cidade"].value==''){
                formu["cidade"].style.border="thin solid red";
                x=1;
            }
            else {
                formu["cidade"].style.border="";
                
            }
            if (formu["num"].value==''){
                formu["num"].style.border="thin solid red";
                x=1;
            }
            else {
                formu["num"].style.border="";
                
            }
            if (formu["bairro"].value==''){
                formu["bairro"].style.border="thin solid red";
                x=1;
            }
            else {
                formu["bairro"].style.border="";
                
            }
            if (formu["uf"].value==''){
                formu["uf"].style.border="thin solid red";
                x=1;
            }
            else {
                formu["uf"].style.border="";
                
            }
            if (formu["login"].value==''){
                formu["login"].style.border="thin solid red";
                x=1;
            }
            else {
                formu["login"].style.border="";
                
            }
            if (formu["pass"].value==''){
                formu["pass"].style.border="thin solid red";
                x=1;
            }
            else {
                formu["pass"].style.border="";
                
            }
            if (formu["nick"].value==''){
                formu["nick"].style.border="thin solid red";
                x=1;
            }
            else {
                formu["nick"].style.border="";
                
            }
            if (formu["con_pass"].value==''){
                formu["con_pass"].style.border="thin solid red";
                x=1;
            }
            else {
                formu["con_pass"].style.border="";
                
            }
            
            if (x==1){
                $('<div class="alert alert-danger fade in" role="alert"><button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>Os campos em <strong>vermelho</strong> precisam ser preenchidos!</div>').appendTo("#ccpf").show();
                return false;
            }
            else if (nickt == 1){
                $('<div class="alert alert-danger fade in" role="alert"><button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>Por favor, troque o <strong>nick</strong>! O nick informado já está em uso!</div>').appendTo("#ccpf").show();
                return false;
            }
            else if (logint == 1){
                $('<div class="alert alert-danger fade in" role="alert"><button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>Por favor, troque o <strong>login</strong>! O login informado já está em uso!</div>').appendTo("#ccpf").show();
                return false;
            }
            else if (mailt == 1){
                $('<div class="alert alert-danger fade in" role="alert"><button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>Por favor, troque o <strong>e-mail</strong>! O e-mail informado já está em uso!</div>').appendTo("#ccpf").show();
                return false;
            }
            else {
                if (formu["priv"].checked==false) {
                    $('<div class="alert alert-warning fade in" role="alert"><button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button><strong>Antes de Continuar,</strong> Os termos de privacidade precisam ser aceitos!</div>').appendTo("#ccpf").show();
                    formu["priv"].focus;
                    return false;
                }
            }
            
            
                   
        }
        
        function verPass(y){
            
            if (y != document.forms["cadas"]["pass"].value){
                
                document.forms["cadas"]["pass"].style.border="thin solid red";
                document.forms["cadas"]["con_pass"].style.border="thin solid red";
                
                $('<div class="alert alert-warning fade in" role="alert"><button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button><strong>Ops!</strong> As Senhas não estão iguais!</div>').appendTo("#ccpf").show();
                
                
            }
            else {
                document.forms["cadas"]["pass"].style.border="";
                document.forms["cadas"]["con_pass"].style.border="";
                $(".alert").remove();
            }
            
        }
        
        jQuery(function($){
   $("#nasc").mask("99/99/9999");
   $("#cpf").mask("999.999.999-99");
   $("#cep").mask("99.999-999");
   $("#tel").mask("(99) 9999-9999");
   
   $("#cep").blur(function(){

var cep = this.value;

cep = cep.replace('.','');
cep = cep.replace('-','');

    $.ajax({
         type: "GET", 
         url: "http://cep.correiocontrol.com.br/"+cep+".json",
         dataType: "json", 
         success: function(json){
             
    
                 $("#end").val(json.logradouro);
                 $("#bairro").val(json.bairro);
                 $("#uf").val(json.uf);
                 $("#cidade").val(json.localidade);
                 
                 
    
             
    }
    });
             
});
   
   });
   
function TestaCPF(cpf) 
{ 
    if (cpf != "___.___.___-__")
    {
        cpf = cpf.replace(".", "");
        cpf = cpf.replace(".", "");
        strCPF = cpf.replace("-","");
        
        
        
    
        var Soma; 
        var Resto; Soma = 0; 
        if (strCPF == "00000000000" || strCPF == "11111111111" || strCPF == "22222222222" || strCPF == "33333333333" || strCPF == "44444444444" || strCPF == "55555555555" || strCPF == "66666666666" || strCPF == "77777777777" || strCPF == "88888888888" || strCPF == "99999999999")
        {
            $('<div class="alert alert-danger fade in" role="alert"><button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button><strong>Oh não!</strong> Esse não é um CPF válido!</div>').appendTo("#ccpf").show();
        }
        else 
        {
            for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i); Resto = (Soma * 10) % 11; 
        
            if ((Resto == 10) || (Resto == 11)) Resto = 0; 
            if (Resto != parseInt(strCPF.substring(9, 10)) )
            {
                $('<div class="alert alert-danger fade in" role="alert"><button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button><strong>Oh não!</strong> Esse não é um CPF válido!</div>').appendTo("#ccpf").show();
            } 
            Soma = 0; 
            for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i); Resto = (Soma * 10) % 11; 
            if ((Resto == 10) || (Resto == 11)) Resto = 0; 
            if (Resto != parseInt(strCPF.substring(10, 11) ) ) 
            {
                $('<div class="alert alert-danger fade in" role="alert"><button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button><strong>Oh não!</strong> Esse não é um CPF válido!</div>').appendTo("#ccpf").show();
            }
            else {
                $('<div class="alert alert-success fade in" role="alert"><button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button><strong>Sucesso!</strong> Esse é um CPF válido!</div>').appendTo("#ccpf").show();
            }
        }
    }
}



function verLogin(login) 
{
    $.get( "/esbl/vn.php?login=" + login, function( data ) {
       if (data == 1)
       {
            $('<div class="alert alert-danger fade in" role="alert"><button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>O login <strong>' + login + '</strong> já está em uso!</div>').appendTo("#ccpf").show();
            logint = 1;
       }
       else {
           logint = 0;
       }
       
           
       
    });
}

function verNick(nick)
{
    $.get( "/esbl/vn.php?nick=" + nick, function( data ) {
       if (data == 1)
       {
           $('<div class="alert alert-danger fade in" role="alert"><button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>O nick <strong>' + nick + '</strong> já está em uso!</div>').appendTo("#ccpf").show();
           nickt = 1;
       }
       else {
           nickt = 0;
       }
       
    });
}
function verMail(mail)
{
    $.get( "/esbl/vn.php?mail=" + mail, function( data ) {
       if (data == 1)
       {
           $('<div class="alert alert-danger fade in" role="alert"><button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>O e-mail <strong>' + mail + '</strong> já está em uso!</div>').appendTo("#ccpf").show();
           mailt = 1;
       }
       else {
           mailt = 0;
       }
       
    });
}

   
   


    </script>
</head>
<body>
<?php 
    
    include "head.php";
    
    
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

	<div class="container all-pages cadastro">
		<div class="row">
			<h2>Criar cadastro</h2>
			<form role="form" name="cadas" method="post" action="sub_cad.php" onsubmit="return confCampos()">
                            <div id="ccpf"></div>
				<div class="col-md-12">
					<h5>Dados pessoais</h5>
				</div>
				<div class="col-md-6 col-sm-6">
					<input type="text" class="form-control n-cartao" placeholder="Nome" name="nome" tabIndex="1">
                                        <input type="text" class="form-control n-cartao" placeholder="CPF" name="cpf" tabIndex="3" id="cpf" onblur="TestaCPF(this.value)">
                                        
					<input type="email" class="form-control n-cartao" placeholder="Email" name="mail" tabIndex="5" id="mail" onblur="verMail(this.value)">
				</div>
				<div class="col-md-6 col-sm-6">
					<input type="text" class="form-control n-cartao" placeholder="Sobrenome" name="sobrenome" tabIndex="2">
					<input type="text" class="form-control n-cartao" placeholder="Data de nascimento" name="nasc" tabIndex="4" id="nasc">
					<input type="text" class="form-control n-cartao" placeholder="Telefone" name="tel" tabIndex="6" id="tel">
				</div>
				<div class="col-md-12">
					<h5>Dados residenciais</h5>
				</div>
				<div class="col-md-6 col-sm-6">
                                    <input type="text" class="form-control n-cartao" placeholder="CEP" name="cep" tabIndex="7" id="cep">	
                                    <input type="text" class="form-control n-cartao" placeholder="Endereço" name="end" tabIndex="9" id="end">
					
					<input type="text" class="form-control n-cartao" placeholder="Complemento" name="complemento" tabIndex="12">
					
				</div>
				<div class="col-md-6 col-sm-6">
					<input type="text" class="form-control n-cartao" placeholder="Cidade" name="cidade" tabIndex="8" id="cidade">
					<div class="col-md-6  col-sm-6 no-padding">
                                            <input type="text" class="form-control n-cartao" placeholder="Número" name="num" tabIndex="10">
					</div>
					<div class="col-md-6  col-sm-6 no-padding">
						<input type="text" class="form-control n-cartao" placeholder="Bairro" name="bairro" tabIndex="11" id="bairro">
					</div>
					<select name="uf" tabIndex="13" id="uf">
                                            <option value="" selected>Estado</option>
					    <option value="AC">Acre</option>
					    <option value="AL">Alagoas</option>
					    <option value="AM">Amazonas</option>
					    <option value="AP">Amapá</option>
					    <option value="BA">Bahia</option>
					    <option value="CE">Ceará</option>
					    <option value="DF">Distrito Federal</option>
					    <option value="ES">Espirito Santo</option>
					    <option value="GO">Goiás</option>
					    <option value="MA">Maranhão</option>
					    <option value="MG">Minas Gerais</option>
					    <option value="MS">Mato Grosso do Sul</option>
					    <option value="MT">Mato Grosso</option>
					    <option value="PA">Pará</option>
					    <option value="PB">Paraíba</option>
					    <option value="PE">Pernambuco</option>
					    <option value="PI">Piauí</option>
					    <option value="PR">Paraná</option>
					    <option value="RJ">Rio de Janeiro</option>
					    <option value="RN">Rio Grande do Norte</option>
					    <option value="RO">Rondônia</option>
					    <option value="RR">Roraima</option>
					    <option value="RS">Rio Grande do Sul</option>
					    <option value="SC">Santa Catarina</option>
					    <option value="SE">Sergipe</option>
					    <option value="SP">São Paulo</option>
					    <option value="TO">Tocantins</option>
					</select>
				</div>
				<div class="col-md-12">
					<h5>cadastro</h5>
				</div>
				<div class="col-md-6 col-sm-6">
					<input type="text" class="form-control n-cartao" placeholder="Login" name="login" tabIndex="14" id="login" onblur="verLogin(this.value)">
                                        <input type="password" class="form-control n-cartao" placeholder="Senha" name="pass" tabIndex="16">
				</div>
				<div class="col-md-6 col-sm-6">
					<input type="text" class="form-control n-cartao" placeholder="Nick" name="nick" tabIndex="15" id="nick" onblur="verNick(this.value)">
                                        <input type="password" class="form-control n-cartao" placeholder="Confirmar senha" name="con_pass" tabIndex="17" onblur="verPass(this.value)">
				</div>
                            
				<div class="col-md-12">
					<h5>quais jogos você joga?</h5>
				</div>
				<div class="col-md-12">
					<div class="checkbox">
					  	<label class="col-md-2">
					    	<input type="checkbox" value="" tabIndex="18">
					    	League of Legends
					  	</label>
					  	<label class="col-md-2">
					    	<input type="checkbox" value="" tabIndex="19">
					    	DOTA 2
					  	</label>
					  	<label class="col-md-2">
					    	<input type="checkbox" value="" tabIndex="20">
					    	StarCraft 2
					  	</label>
					  	<label class="col-md-2">
					    	<input type="checkbox" value="" tabIndex="21">
					    	Heroes of Storm
					  	</label>
					  	<label class="col-md-2">
					    	<input type="checkbox" value="" tabIndex="22">
					    	Heartstone
					  	</label>
					  	<label class="col-md-2">
					    	<input type="checkbox" value="" tabIndex="23">
					    	Fifa 2014
					  	</label>
					</div>
				</div>
				<div class="col-md-12">
					<h5></h5>
				</div>
				<div class="col-md-12">
					<div class="checkbox">
					  	<label class="col-md-4">
					    	<input type="checkbox" value="1" name="priv" tabIndex="24">
					    	Li e aceito os termos de Politica de Privacidade
					  	</label>
					  	<label class="col-md-4">
					    	<input type="checkbox" value="" tabIndex="25">
					    	Inscrever-me para receber novidades
					  	</label>
					</div>
					<div class="col-md-4 no-padding">
						<p class="align-right"><input type="submit" value="Finalizar inscrição" class="btn btn-default btn-black" tabIndex="26"></p>
					</div>
				</div>
			</form>
		</div>
	</div>
<?php
       include "foot.php";
       
       ?>
</body>

</html>