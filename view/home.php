<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de pacientes</title>
</head>
<body>
<?php 
	require_once("../controller/PacienteController.php");
	$msgOperacao = null;
	if(isset($_REQUEST["action"]) && isset($_REQUEST["action"]) == 1){
		$pacienteController = new PacienteController();
		$msgOperacao = $pacienteController->inserir($pacienteController->construirPaciente($_REQUEST));
	}
 ?>
<h1>Bem-vindo</h1>
<?php 
	if($msgOperacao != null){
?>
	<div style="text-align: center;">
		<span><?php echo $msgOperacao ?></span>
	</div>
<?php 
	} 
?>
<a href="lis-paciente.php">Listar</a> | <a href="inc-paciente.php">Novo</a>
</body>
</html>