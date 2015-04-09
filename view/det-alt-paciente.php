<!DOCTYPE html>
<html>
<head>
	<title></title>

	<script type="text/javascript">
		function alterar(){
			document.getElementById('idDivDetalhar').style.display = 'none';
			document.getElementById('idDivAlterar').style.display = 'block';
			document.getElementById('idADetalhar').style.display = 'inline';
			document.getElementById('idAAlterar').style.display = 'none';
		}

		function detalhar(){
			document.getElementById('idDivDetalhar').style.display = 'block';
			document.getElementById('idDivAlterar').style.display = 'none';
			document.getElementById('idADetalhar').style.display = 'none';
			document.getElementById('idAAlterar').style.display = 'inline';
		}
	</script>
</head>
<body>

<?php
	require_once("../controller/PacienteController.php");
	$pacienteController = new PacienteController();	
	$paciente = $pacienteController->buscarPorId($_GET["id"]);	
 ?>

<div id="idDivDetalhar">
	<div>		
		<span>Nome:</span>
		<span><?php echo $paciente->getNome(); ?></span>
	</div>
	<div>		
		<span>Email:</span>
		<span><?php echo $paciente->getEmail(); ?></span>
	</div>
</div>
<div id="idDivAlterar" hidden>	
	<form action="lis-paciente.php" method="POST">
		<input type="hidden" name="action" value="2" />
		<input type="hidden" name="id" value="<?php echo $paciente->getId(); ?>" />

		Nome: <input type="text" name="nome" value="<?php echo $paciente->getNome(); ?>" />
		<br/>
		E-mail: <input type="text" name="email" value="<?php echo $paciente->getEmail(); ?>" />
		<br/>
		<input type="submit" value="Gravar" />
	</form>
</div>
<a href="lis-paciente.php">Voltar</a> <a href="#" id="idAAlterar" onclick="alterar()">Alterar</a> <a href="#" hidden id="idADetalhar" onclick="detalhar()">Detalhar</a>
</body>
</html>
