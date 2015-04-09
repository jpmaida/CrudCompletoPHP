<?php

//require_once("BaseController.php");
require_once("../model/entity/Paciente.php");
require_once("../model/service/PacienteService.php");

/**
* 
*/
class PacienteController {

	public function inserir($paciente){		
		try{
			$pacienteService = new PacienteService();
			$pacienteService->inserir($paciente);		
			return "Operação realizada com sucesso.";
		} catch(Exception $e) {
			return "Ocorreu um erro.";
		}
	}

	public function alterar($paciente){
		try{
			$pacienteService = new PacienteService();
			$pacienteService->alterar($paciente);		
			return "Operação realizada com sucesso.";
		} catch(Exception $e) {
			return "Ocorreu um erro.";
		}
	}

	public function listar(){
		$pacienteService = new PacienteService();
		return $pacienteService->listar();
	}

	public function excluir($id){
		try{
			$pacienteService = new PacienteService();
			$pacienteService->excluir($id);
			return "Operação realizada com sucesso.";
		} catch(Exception $e) {
			return "Ocorreu um erro.";
		}
	}

	public function buscarPorId($id){
		$pacienteService = new PacienteService();
		return $pacienteService->buscarPorId($id);
	}

	public function construirPaciente($request){
		$paciente = new Paciente();
		$paciente->setNome($request['nome']);
		$paciente->setEmail($request['email']);
		$paciente->setId(isset($request['id']) ? $request['id'] : null);
		return $paciente;
	}
}
 ?>