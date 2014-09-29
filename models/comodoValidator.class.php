<?php

include_once("models/comodo.class.php");

class ComodoValidator{
	
	private $banco;
	
	public function __construct($banco){
		$this->banco = $banco;
	}	
	
	public function validate($comodo){		
		
		$errors = array();
		
		//verificar se os campos foram informados
		
		if($comodo->getPlanta() == null)
			$errors["idPlanta"] = "planta não informada";		
		
		if($comodo->getTipo() == null)
			$errors["idTipo"] = "tipo não informada";
			
		/*$plantas = $this->banco->retornarTodasAsPlantas();
		
		foreach ( $plantas as $item ) {       		
       		if($item->getNroPlanta() == $planta->getNroPlanta())
       			{
       				$errors["NroPlanta"] = "Nro planta já cadastrado";
       				break;       				
       			}
		}*/
       			
		return $errors;
		
	}
}

?>