<?php

include_once("models/bancoDados.class.php");
include_once("models/planta.class.php");
include_once("models/comodo.class.php");
include_once("models/plantaValidator.class.php");
include_once("models/comodoValidator.class.php");

class PlantasController{
	
	
	private $banco;
	
	public function __construct(){		
		$this->banco = new BancoDados();
	}
	
	public function criarPlantaGet(){		
		return (object) array("planta" => new Planta(),
							  "clientes" => $this->banco->retornarTodosOsClientes(),
							  "arquitetos" => $this->banco->retornarTodosOsArquitetos(),								
							  "errors" => array());
	}
	
	
	public function criarPlantaPost(){
		
		$planta = new Planta();
		
		$planta->setNroPlanta($_POST["nroPlanta"]);
        $planta->setCliente($this->banco->retornarClientePorId($_POST["idCliente"]));
        $planta->setArquiteto($this->banco->retornarArquitetoPorId($_POST["idArquiteto"]));
        $planta->setDataCriacao(date("m-d-Y"));	
        
        $plantaValidator = new PlantaValidator($this->banco);
        
        $errors = $plantaValidator->validate($planta);
        
        if (count($errors) != 0)
        	return (object) array("planta" => $planta, 
								  "clientes" => $this->banco->retornarTodosOsClientes(),
							  	  "arquitetos" => $this->banco->retornarTodosOsArquitetos(),
								  "errors" => $errors);
        
                
        $this->banco->salvarPlanta($planta);
        
        header("Location: /sisPlanta/plantas.php");
		die();     	
        
	}
	
	public function plantas(){
		
	    $plantas = 	$this->banco->retornarTodasAsPlantas();	
	    
	    return (object) array("plantas" => $plantas,
							  "errors" => array());	
	}
	
	public function criarComodoGet(){		
		return (object) array("planta" => $this->banco->retornarPlantaPorNro($_GET["idPlanta"]),
							  "comodo" => new Comodo(),
							  "tipos" => $this->banco->retornarTodosOsTiposComodo(),						  								
							  "errors" => array());
	}
	
	public function criarComodoPost(){	
		
		$comodo  = new Comodo();
		$comodo->setTipo($this->banco->retornarTipoComodoPorId($_POST["idTipoComodo"]));
		$comodo->setPlanta($this->banco->retornarPlantaPorNro($_POST["nroPlanta"]));
		$comodo->setMetragem($_POST["metragem"]);
		
		$comodoValidator = new ComodoValidator($this->banco);
		
		$errors = $comodoValidator->validate($comodo);
        
        if (count($errors) != 0)
        	return (object) array("planta" => $this->banco->retornarPlantaPorNro($_POST["nroPlanta"]), 
								  "comodo" => $comodo,
							  	  "tipos" => $this->banco->retornarTodosOsTiposComodo(),		
								  "errors" => $errors);
								  
		
		$this->banco->salvarComodo($comodo);
					
		header("Location: /sisPlanta/plantas.php");
		die(); 
	}
	
	public function detalhes(){
		
		return (object) array("planta" => $this->banco->retornarPlantaPorNro($_GET["idPlanta"]),
							  "comodos" => $this->banco->retornarTodosOsComodosPorNroProjeto($_GET["idPlanta"]));
		
	}
	
	
}

?>