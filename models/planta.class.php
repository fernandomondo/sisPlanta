<?php

class Planta{	
	
	private $nroPlanta;
	private $dataCriacao;
	private $cliente;
	private $arquitetoResponsavel;
	private $comodos;
				
	public function getNroPlanta(){
		return $this->nroPlanta;		
	}	
	
	public function setNroPlanta($nroPlanta){
		$this->nroPlanta = $nroPlanta;		
	}
	
	public function getDataCriacao(){
		return $this->dataCriacao;		
	}	
	
	public function setDataCriacao($dataCriacao){
		$this->dataCriacao = $dataCriacao;		
	}	

	public function getCliente(){
		return $this->cliente;		
	}	
	
	public function setCliente($cliente){
		$this->cliente = $cliente;		
	}
	
	public function getArquiteto(){
		return $this->arquitetoResponsavel;		
	}	
	
	public function setArquiteto($arquiteto){
		$this->arquitetoResponsavel = $arquiteto;		
	}
	
	public function getComodos(){
		return $this->comodos;		
	}
	
	public function setComodos($comodos){
		$this->comodos = $comodos;
	}	
}

?>
