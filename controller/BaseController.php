<?php

/**
* 
*/
abstract class BaseController{	
	public function redirecionarHttp(){
		$opcao;
		if(isset($_REQUEST["action"])){
			$opcao = $_REQUEST['action'];	
		} else {
			$opcao = -1;
		}

		switch ($opcao) {
			case 1:				
				$this->inserir();
				break;
			default:				
				break;
		}		
	}

	abstract public function inserir();
}
?>