<?php

include_once("controllers/plantasController.class.php");

$controller = new PlantasController();

$model = $controller->plantas();



?>
	

<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Content-Language" content="en" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
	<title>Sistema de Plantas</title>
</head>
<body>
<?php include("menu.php") ?>
<div class="container">
	<h1>Plantas</h1>
	
	<a href="planta-criar.php" class="btn btn-primary">Criar Nova</a>
	<table class="table">
		<tt>
			<th>Nro Planta</th>
			<th>Cliente</th>
			<th>Arquiteto</th>
			<th>Data</th>
			<th></th>
			<th></th>
		</tr>
		<?php foreach ($model->plantas as $item) { ?>
	    <tr>
			<td><?php echo $item->getNroPlanta(); ?></td>
			<td><?php echo $item->getCliente()->getNome(); ?></td>
			<td><?php echo $item->getArquiteto()->getNome(); ?></td>
			<td><?php echo $item->getDataCriacao(); ?></td>
			<td><a href="comodo-criar.php?idPlanta=<?php echo $item->getNroPlanta(); ?>">Adicionar comodos</a></td>
			<td><a href="detalhes.php?idPlanta=<?php echo $item->getNroPlanta(); ?>">Detalhes</a></td>
		</tr>   
		<?php } ?>
	</table>

			
</div>
</body>
</html>