<!DOCTYPE HTML>
<html lang = "es">
	<head>
		<meta charset="utf-8" http-equiv="Cache-Control" content="no-cache, mustrevalidate"/> 
		
		<title>Finanzas Personales</title>
        <script type="text/javascript" src="<?=base_url?>Assets/js/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src="<?=base_url?>Assets/js/alertify.min.js"></script>
        <script type="text/javascript" src="<?=base_url?>Assets/js/modal.js"></script>
        <script type="text/javascript" src="<?=base_url?>Assets/js/main.js"></script>
        <script type="text/javascript" src="<?=base_url?>Assets/js/bootstrap/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?=base_url?>Assets/Datatables/datatables.min.js"></script>
		<link rel="stylesheet" href="<?=base_url?>Assets/css/styles.css"/>
        <link rel="stylesheet" href="<?=base_url?>Assets/css/alertify.min.css" />
        <link rel="stylesheet" href="<?=base_url?>Assets/css/themes/bootstrap.min.css" />
        <link rel="stylesheet" href="<?=base_url?>Assets/css/bootstrap/bootstrap.min.css" />
        <link rel="stylesheet" href="<?=base_url?>Assets/Datatables/datatables.min.css" />
        <link rel="stylesheet" href="<?=base_url?>Assets/Datatables/DataTables-1.10.20/css/dataTables.bootstrap4.min.css" />
       
	</head>
	<body>
		<div id="container">
			<header id="header">
				<div id="logo">
					<img src="<?=base_url?>Assets/Images/header_icon.png" alt="App Logo"/>
					<a href="<?=base_url?>">Finanzas Personales</a>
				</div>
			</header>

			<nav id="menu">
				<ul>
					<li>
						<a href="#">Inicio</a>
					</li>
                    <?php if(isset($_SESSION['identity'])):?>
					<li>
						<a href="<?=base_url?>category/index" id="categoriesButton">Categorías</a>
					</li>
					<li>
						<a href="#">Configuración</a>
					</li>
                    <?php endif ?>
					<li>
						<a href="#">Ayuda</a>
					</li>
				</ul>
			</nav>

			<div id="content">