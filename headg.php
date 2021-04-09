<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <?php $ativo = basename($_SERVER['SCRIPT_NAME']); 
        
     if ($ativo == 'torneios.php') { echo '<title>ESBL - Torneios</title>'; }
     if ($ativo == 'classificacao.php') { echo '<title>ESBL - Classificação</title>'; }
     if ($ativo == 'equipes.php') { echo '<title>ESBL - Equipes</title>'; }
     if ($ativo == 'regulamento.php') { echo '<title>ESBL - Regulamento</title>'; }
    
     
     ?>  
        
        
    </head>
    <body>
        <div class="container-fluid bg-nav-lol">
    	<div class="container">
	    	<div role="navigation" class="navbar navbar-inverse navbar-static-top">
			  	<div class="container">
			    	<div class="navbar-header">
			      		<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
				        	<span class="sr-only">Toggle navigation</span>
				        	<span class="icon-bar"></span>
				        	<span class="icon-bar"></span>
				        	<span class="icon-bar"></span>
			      		</button>
			      		<a href="index.php" class="navbar-brand logo-lol">LOL</a>
			    	</div>
			    	<div class="navbar-collapse collapse">
			      		<ul class="nav navbar-nav navbar-right">
			        		<li <?php if ($ativo == 'torneios.php') { echo 'class="active"'; } ?> ><a href="/esbl/lol/torneios.php">Torneios</a></li>
				            <li <?php if ($ativo == 'classificacao.php') { echo 'class="active"'; } ?>><a href="/esbl/lol/classificacao.php">Classificação</a></li>
				            <li <?php if ($ativo == 'equipes.php') { echo 'class="active"'; } ?>><a href="/esbl/lol/equipes.php">Equipes</a></li>
				            <li <?php if ($ativo == 'regulamento.php') { echo 'class="active"'; } ?>><a href="/esbl/lol/regulamento.php">Regulamento</a></li>
			      		</ul>
			    	</div>
			  	</div>
			</div>
	    </div>
    </div>
    </body>
</html>
 