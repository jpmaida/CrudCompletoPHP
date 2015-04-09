<?php 

require_once("../model/dao/PacienteDAO.php");
/**
* 
*/
class PacienteService {
	
	public function inserir($paciente){
		$pacienteDAO = new PacienteDAO();
		$pacienteDAO->inserir($paciente);
	}

	public function alterar($paciente){
		$pacienteDAO = new PacienteDAO();
		$pacienteDAO->alterar($paciente);
	}

	public function listar(){
		$pacienteDAO = new PacienteDAO();
		return $pacienteDAO->listar();
	}

	public function excluir($id){
		$pacienteDAO = new PacienteDAO();
		$pacienteDAO->excluir($id);
	}

	public function buscarPorId($id){
		$pacienteDAO = new PacienteDAO();
		return $pacienteDAO->buscarPorId($id);
	}
}
 ?>