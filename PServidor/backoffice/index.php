<?php

include('utils/config.php');

session_start();

//Verificar se o utilizador não está logado//
if(!isset($_SESSION['LogadoEm'])){

	header('Location: ../principal/');

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
			
			
			<!-- start: Content -->
			<div id="content" class="span10">
				
				<?php

				include('utils/funcs.php');

				echo "
				<h2>Eliminar Palavra</h2>
				<form action = 'eliminarpalavra.php' method = 'POST'>
				<select name = 'select_palavra'>
				";

				get_palavras();

				echo "
				</select >
				<input type = 'submit' value = 'Eliminar' class='btn btn-default'>
				</form>
				";

				echo "
				<hr>
				<h2>Modificar Palavra</h2>
				<form action = 'modificarpalavra.php' method = 'POST'>
				<select name = 'select_palavra'>
				";

				get_palavras();

				echo "
				</select>
				<input type = 'submit' value = 'Modificar' class='btn btn-default'>
				</form>
				";

				if(isset($_GET['palavra']) AND isset($_GET['dica'])){

					echo '<form action = "modificarpalavra.php" method = "POST">';
					echo '<input type = "text" id = "palavra" name = "palavra" value =';
					echo $_GET['palavra'] . ">";
					echo '<input type = "text" id = "dica" name = "dica" value =';
					echo $_GET['dica'] . ">";
					echo '<input type = "hidden" id = "id" name = "id" value =';
					echo $_GET['id'] . ">";
					echo '<input type = "submit" class = "btn btn-default" value = "Modificar">';
					echo '</form>';

				}

				 ?>
				 


<hr>

				<h2>Adicionar Nova Palavra</h2>

					<form class="form-inline" role="form" method = "POST" action = "adicionarpalavra.php">
						<div class="form-group">
							
							<input type="text" class="form-control" id="palavra" name="palavra" placeholder="Adicionar Nova Palavra">
							<input type="text" class="form-control" id="sugestao" name="sugestao" placeholder="Sugestão de Palavra">

						</div>
							<button type="submit" class="btn btn-default">Adicionar</button>
					</form>
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
