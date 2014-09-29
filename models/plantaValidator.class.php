<?php

include_once("models/planta.class.php");

class PlantaValidator{
	
	private $banco;
	
	public function __construct($banco){
		$this->banco = $banco;
	}	
	
	public function validate($planta){		
		
		$errors = array();
		
		//verificar se os campos foram informados
		
		if($planta->getNroPlanta() == null)
			$errors["NroPlanta"] = "Nro planta não informado";
		
		$plantas = $this->banco->retornarTodasAsPlantas();
		
		foreach ( $plantas as $item ) {       		
       		if($item->getNroPlanta() == $planta->getNroPlanta())
       			{
       				$errors["NroPlanta"] = "Nro planta já cadastrado";
       				break;       				
       			}
		}
       			
		return $errors;
		
	}
}

?>