<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php 
	require_once("../controller/PacienteController.php");
	$msgOperacao = null;
	$pacienteController = new PacienteController();
	if(isset($_REQUEST["action"])){
		switch ($_REQUEST["action"]) {
			case 2:				
				$msgOperacao = $pacienteController->alterar($pacienteController->construirPaciente($_REQUEST));
				break;
			case 3:
				$msgOperacao = $pacienteController->excluir($_GET["id"]);
				break;
			default:
				break;
		}		
	}
	$pacientes = $pacienteController->listar();	
?>
<?php 
	if($msgOperacao != null){
?>
	<div style="text-align: center;">
		<span><?php echo $msgOperacao ?></span>
	</div>
<?php 
	} 
?>
<table>	
	<tr>		
		<th>Nome</th>
		<th>Email</th>
		<th>Ações</th>
	</tr>
	<?php 		
		foreach ($pacientes as $key => $value) {
			echo "<tr><td>" . $value->getNome() . "</td><td>" . $value->getEmail() . "</td>";
			echo "<td><a href='lis-paciente.php?action=3&id=" . $key . "'>Excluir</a>";
			echo "&nbsp";
			echo "<a href='det-alt-paciente.php?id=" . $key ."'>Detalhar</a></td>";
			echo "</tr>";
		}		
	 ?>
</table>
<a href="home.php">Voltar</a>	 
</html>