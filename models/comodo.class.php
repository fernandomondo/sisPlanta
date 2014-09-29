<?php

class Comodo{
	
	private $tipo;
	private $metragem;
	private $planta;
		
	public function getTipo(){		
		return $this->tipo;		
	}	
	
	public function setTipo($tipo){		
		$this->tipo = $tipo;		
	}
	
	public function getMetragem(){		
		return $this->metragem;		
	}
	
	public function setMetragem($metragem){		
		$this->metragem = $metragem;		
	}	
	
	public function getPlanta(){		
		return $this->planta;		
	}	
	
	public function setPlanta($planta){		
		$this->planta = $planta;		
	}
}
?>
