<?php

include_once("models/planta.class.php");
include_once("models/arquiteto.class.php");
include_once("models/cliente.class.php");
include_once("models/tipoComodo.class.php");

class BancoDados{
	
			
	public function retornarClientePorId($id){	
		$arquivo =  fopen("clientes.txt", "a+");		
		$cliente = null;
		while (($line = fgets($arquivo)) !== false) {
        	$dados = explode("||", $line);  
        	if($dados[0] == $id){        	   	
        	$cliente = $this->criarCliente($dados);        	
        	break;
        	}        	
    	}				
		fclose($arquivo); 
		
		return $cliente;	  		
	}
	
	private function criarCliente($dados){		     	   	
        	$cliente = new Cliente();
        	$cliente->setId($dados[0]);
        	$cliente->setNome($dados[1]);
        	return  $cliente;		
	}
	
	private function criarTipoComodo($dados){		     	   	
        	$tipoComodo = new TipoComodo();
        	$tipoComodo->setId($dados[0]);
        	$tipoComodo->setNome($dados[1]);
        	return  $tipoComodo;		
	}
			
	public function retornarTipoComodoPorId($id){	
		$arquivo =  fopen("tiposComodo.txt", "a+");		
		$tiposComodo = null;
		while (($line = fgets($arquivo)) !== false) {
        	$dados = explode("||", $line);  
        	if($dados[0] == $id){        	   	
        	$tiposComodo = $this->criarTipoComodo($dados);        	
        	break;
        	}        	
    	}				
		fclose($arquivo);
		
		return $tiposComodo;	  		
	}
	
	public function retornarTodosOsTiposComodo(){		
		$arquivo =  fopen("tiposComodo.txt", "a+");
		$tiposComodo = array();
		
		while (($line = fgets($arquivo)) !== false) {
        	$dados = explode("||", $line);          	   	
        	$tipoComodo = $this->criarTipoComodo($dados);
        	array_push($tiposComodo, $tipoComodo);
    	}				
		fclose($arquivo); 
		
		return $tiposComodo;
	}
	
	public function retornarTodosOsClientes(){		
		$arquivo =  fopen("clientes.txt", "a+");
		$clientes = array();
		
		while (($line = fgets($arquivo)) !== false) {
        	$dados = explode("||", $line);          	   	
        	$cliente = $this->criarCliente($dados);
        	array_push($clientes, $cliente);
    	}				
		fclose($arquivo); 
		
		return $clientes;
	}
	
	private function criarArquiteto($dados){		     	   	
        	$arquiteto = new Arquiteto();
        	$arquiteto->setId($dados[0]);
        	$arquiteto->setNome($dados[1]);
        	return  $arquiteto;		
	}
	
	public function retornarTodosOsArquitetos(){		
		$arquivo =  fopen("arquitetos.txt", "a+");
		$arquitetos = array();
		
		while (($line = fgets($arquivo)) !== false) {
        	$dados = explode("||", $line);          	   	
        	$arquiteto = $this->criarArquiteto($dados);        	
        	array_push($arquitetos, $arquiteto);
    	}				
		fclose($arquivo); 
		
		return $arquitetos;
	}
	
	public function retornarArquitetoPorId($id){	
		$arquivo =  fopen("arquitetos.txt", "a+");		
		$arquiteto = null;
		while (($line = fgets($arquivo)) !== false) {
        	$dados = explode("||", $line);  
        	if($dados[0] == $id){        	   	
        	$arquiteto = $this->criarArquiteto($dados);        	
        	break;
        	}        	
    	}				
		fclose($arquivo); 
		
		return $arquiteto;	  		
	}
	
	
	public function retornarTodosOsComodosPorNroProjeto($nroProjeto){		
		$arquivo =  fopen("comodos.txt", "a+");
		$comodos = array();
		
		while (($line = fgets($arquivo)) !== false) {
        	$dados = explode("||", $line);
        	
        	if($dados[0] == $nroProjeto){        	          	   	
	        	$comodo = new Comodo();
	        	$comodo->setPlanta($this->retornarPlantaPorNro($dados[0]));
	        	$comodo->setTipo($this->retornarTipoComodoPorId($dados[1]));
	        	$comodo->setMetragem($dados[2]);
	        	array_push($comodos, $comodo);
        	}
    	}				
		fclose($arquivo); 
		
		return $comodos;
	}
	
	public function retornarPlantaPorNro($nroPlanta){
		$arquivo =  fopen("plantas.txt", "a+");		
		$planta = null;
		while (($line = fgets($arquivo)) !== false) {
        	$dados = explode("||", $line);  
        	if($dados[0] == $nroPlanta){        	   	
        	$planta = $this->criarPlanta($dados);
        	break;
        	}        	
    	}				
		fclose($arquivo); 
		
		return $planta;		
	}
	
	private function criarPlanta($dados){
		$planta = new Planta();
    	$planta->setNroPlanta($dados[0]);
    	$planta->setCliente($this->retornarClientePorId($dados[1]));
    	$planta->setArquiteto($this->retornarArquitetoPorId($dados[2]));
    	$planta->setDataCriacao(date($dados[3]));        	
        return $planta;
	}
	
	public function retornarTodasAsPlantas(){		
		$arquivo =  fopen("plantas.txt", "a+");
		$plantas = array();
		
		while (($line = fgets($arquivo)) !== false) {
        	$dados = explode("||", $line);          	   	
        	$planta = $this->criarPlanta($dados);
        	array_push($plantas, $planta);
    	}				
		fclose($arquivo); 
		
		return $plantas;
	}
	
		
	public function salvarPlanta($planta){				
		$arquivo =  fopen("plantas.txt", "a+");
		fwrite($arquivo, $planta->getNroPlanta() . "||" . $planta->getCliente()->getId() . "||" . $planta->getArquiteto()->getId() . "||" . $planta->getDataCriacao() . "\r\n");
		fclose($arquivo);  
	}
	
		
	public function salvarComodo($comodo){				
		$arquivo =  fopen("comodos.txt", "a+");
		fwrite($arquivo, $comodo->getPlanta()->getNroPlanta() . "||" . $comodo->getTipo()->getId() . "||" . $comodo->getMetragem() . "\r\n");
		fclose($arquivo); 
	}
	
}



?>
