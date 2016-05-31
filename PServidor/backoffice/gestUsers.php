<?php

//Incluir ficheiro de ligação ao servidor//
include('utils/config.php');

include('utils/funcs.php');

session_start();

//Verificar se o utilizador está logado//
if(!isset($_SESSION['LogadoEm'])){

	//Redirecionar para a pagina anterior//
	Header('Location: ../principal/');

}

?>
<!DOCTYPE html>
<html lang="en">
<head>

	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>BackOffice</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
	<link rel="shortcut icon" href="../utils/icone.ico">
		
	
		
</head>

<body>
		<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="index.php"><span>PAINEL DE <br> <br>CONTROLO</span></a>
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
						<li class="dropdown hidden-phone">
							
								
						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i> <?php echo $_SESSION['LogadoEm']; ?>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
															
								<li><a href="logout.php"><i class="halflings-icon off"></i> Logout</a></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>
	<!-- start: Header -->
	
		<div class="container-fluid-full">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">		
						<li><a href="index.php"><i class="icon-font"></i><span class="hidden-tablet"> Gerir Palavras</span></a></li>
						<li><a href="gestUsers.php"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Gerir Utilizadores</span></a></li>
						<li><a href="stats.php"><i class="icon-list-alt"></i><span class="hidden-tablet"> Estatisticas</span></a></li>						
						
					</ul>
				</div>
			</div>
			<!-- end: Main Menu -->
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Utilizadores</a></li>
			</ul>

			<div class="row-fluid">
				
				<div class="span3 statbox purple" onTablet="span6" onDesktop="span3">
					<div class="number"><?php get_totalUtilizadores();?><i class="icon-arrow-up"></i></div>
					<div class="title">Utilizadores Registados</div>
				</div>

				
			</div>		

			<div class="row-fluid">

			<h2>Adicionar Utilizador</h2>
			<form action = "adicionarutilizador.php" method = "POST">

				<input type = "text" name = "nome" id = "nome" placeholder = "Nome">
				<input type = "date" name = "data_nasc" id = "data_nasc" placeholder = "Data de Nascimento">
				<input type = "email" name = "email" id = "email" placeholder="Email">
				<input type = "text" name = "username" id = "username" placeholder = "Utilizador">
				<input type = "password" name = "password" id = "password" placeholder="Password">
				<select name = "privilegios">

					<option value = "Administrador">Administrador</option>
					<option value = "Padrao">Padrao</option>

				</select>

				<input type = "submit" value = "Registar">

			</form>



			</div>



				<div class="row-fluid">

					<?php


					echo "
				<hr>
				<h2>Eliminar Utilizador</h2>
				<form action = 'eliminarutilizador.php' method = 'POST'>
				<select name = 'select_utilizador'>
				";

					get_AllNomeUtilizador();

					echo "
				</select >
				<input type = 'submit' value = 'Eliminar' class='btn btn-default'>
				</form>
				";

					?>



				</div>

				<div class="row-fluid">

				<?php
				
					echo "
					<hr>
					<h2>Modificar Utilizador</h2>
					<form action = 'modificarutilizador.php' method = 'POST'>
						<select name = 'select_utilizador'>
							";

							get_AllNomeUtilizador();

							echo "
						</select>
						<input type = 'submit' value = 'Modificar' class='btn btn-default'>
					</form>
					";

					if(isset($_GET['id'])){

					echo '<form action = "modificarutilizador.php" method = "POST">';
						echo '<input type = "text" id = "nome" name = "nome" value =';
					echo $_GET['nome'] . ">";
						echo '<input type = "text" id = "username" name = "username" value =';
					echo $_GET['username'] . ">";
						echo '<input type = "date" id = "data_nasc" name = "data_nasc" value =';
						echo $_GET['data_nasc'] . ">";
						echo '<input type = "email" id = "email" name = "email" value =';
						echo $_GET['email'] . ">";
						echo '<input type = "text" id = "tipo" name = "tipo" value =';
						echo $_GET['tipo'] . ">";
						echo '<input type = "hidden" id = "id" name = "id" value =';
						echo $_GET['id'] . ">";

						echo '<input type = "submit" class = "btn btn-default" value = "Modificar">';
						echo '</form>';

					}

					?>


				</div>



			
			</div>

	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		
	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Settings</h3>
		</div>
		<div class="modal-body">
			<p>Here settings can be configured...</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
	</div>
	
	<div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-content">
			<ul class="list-inline item-details">
				<li><a href="http://themifycloud.com">Admin templates</a></li>
				<li><a href="http://themescloud.org">Bootstrap themes</a></li>
			</ul>
		</div>
	</div>
	
	<div class="clearfix"></div>
	
	<footer>

		<p>
			<span style="text-align:left;float:left">&copy; 2013 <a href="http://themifycloud.com/downloads/janux-free-responsive-admin-dashboard-template/" alt="Bootstrap_Metro_Dashboard">JANUX Responsive Dashboard</a></span>
			
		</p>

	</footer>
	
	<!-- start: JavaScript-->

		<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/jquery-migrate-1.0.0.min.js"></script>
	
		<script src="js/jquery-ui-1.10.0.custom.min.js"></script>
	
		<script src="js/jquery.ui.touch-punch.js"></script>
	
		<script src="js/modernizr.js"></script>
	
		<script src="js/bootstrap.min.js"></script>
	
		<script src="js/jquery.cookie.js"></script>
	
		<script src='js/fullcalendar.min.js'></script>
	
		<script src='js/jquery.dataTables.min.js'></script>

		<script src="js/excanvas.js"></script>
	<script src="js/jquery.flot.js"></script>
	<script src="js/jquery.flot.pie.js"></script>
	<script src="js/jquery.flot.stack.js"></script>
	<script src="js/jquery.flot.resize.min.js"></script>
	
		<script src="js/jquery.chosen.min.js"></script>
	
		<script src="js/jquery.uniform.min.js"></script>
		
		<script src="js/jquery.cleditor.min.js"></script>
	
		<script src="js/jquery.noty.js"></script>
	
		<script src="js/jquery.elfinder.min.js"></script>
	
		<script src="js/jquery.raty.min.js"></script>
	
		<script src="js/jquery.iphone.toggle.js"></script>
	
		<script src="js/jquery.uploadify-3.1.min.js"></script>
	
		<script src="js/jquery.gritter.min.js"></script>
	
		<script src="js/jquery.imagesloaded.js"></script>
	
		<script src="js/jquery.masonry.min.js"></script>
	
		<script src="js/jquery.knob.modified.js"></script>
	
		<script src="js/jquery.sparkline.min.js"></script>
	
		<script src="js/counter.js"></script>
	
		<script src="js/retina.js"></script>

		<script src="js/custom.js"></script>
	<!-- end: JavaScript-->
	
</body>
</html>
