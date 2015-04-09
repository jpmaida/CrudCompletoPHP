<?php 

require_once("BaseDAO.php");
require_once("../model/entity/Paciente.php");

/**
* 
*/
class PacienteDAO extends BaseDAO {
	
	public function __construct(){}

	public function inserir($paciente){
		try { 
			$sql = "INSERT INTO PACIENTE (NOME, EMAIL) VALUES (:nome, :email)"; 
			$p_sql = BaseDAO::getInstance()->prepare($sql); 
			$p_sql->bindValue(":nome", $paciente->getNome()); 
			$p_sql->bindValue(":email", $paciente->getEmail()); 			
			return $p_sql->execute(); 
		} catch (Exception $e) { 
			echo "Ocorreu um erro ao tentar executar esta ação, tente novamente mais tarde." . $e->getMessage(); 			
		}
	}

	public function alterar($paciente){
		try{
			$sql = "update paciente set nome = :nome, email = :email where id = :id";
			$preparedStatement = BaseDAO::getInstance()->prepare($sql);
			$preparedStatement->bindValue(":nome", $paciente->getNome());
			$preparedStatement->bindValue(":email", $paciente->getEmail());
			$preparedStatement->bindValue(":id", $paciente->getId());
			return $preparedStatement->execute();
		} catch(Exception $e){
			echo "Ocorreu um erro ao tentar executar esta ação, tente novamente mais tarde." . $e->getMessage(); 			
		}
	}

	public function listar(){
		$resultado = array();
		$sql = "select id, nome, email from paciente order by nome asc";		

		$preparedStatement = BaseDAO::getInstance()->prepare($sql);
		$preparedStatement->execute();
		
		while($row = $preparedStatement->fetchObject()){
			$paciente = $this->processarResultados($row);
			$resultado[$paciente->getId()] = $paciente;
		}
		return $resultado;
	}

	public function processarResultados($row){
		$paciente = new Paciente();		
		$paciente->setId($row->id);
		$paciente->setNome($row->nome);
		$paciente->setEmail($row->email);
		return $paciente;
	}

	public function excluir($id){
		try{
			$sql = "delete from paciente where id = :id";
			$preparedStatement = BaseDAO::getInstance()->prepare($sql);
			$preparedStatement->bindValue(":id", $id);
			$preparedStatement->execute();
		} catch(Exception $e){
			echo "Ocorreu um erro ao tentar executar esta ação, tente novamente mais tarde." . $e->getMessage(); 			
		}
	}

	public function buscarPorId($id){
		$paciente = null;		
		$sql = "select id, nome, email from paciente where id = :id";
		$preparedStatement = BaseDAO::getInstance()->prepare($sql);
		$preparedStatement->bindValue(":id", $id);
		$preparedStatement->execute();
		
		while($row = $preparedStatement->fetchObject()){
			$paciente = $this->processarResultados($row);
		}		
		return $paciente;
	}
}
 ?>