<?php 
require_once  ("IConsumidorEnergia.php");
class Comercial implements  IConsumidorEnergia {
    private $consumo;
    public function getValorFatura(){
        if ($this->consumo <= 100) {
            $preco = 1.45;
        }else{
            $preco = 1.60;
        }
        $valor = $this->consumo * $preco;
        return $valor;
    }

    /**
     * Get the value of consumo
     */
    public function getConsumo()
    {
        return $this->consumo;
    }

    /**
     * Set the value of consumo
     */
    public function setConsumo($consumo): self
    {
        $this->consumo = $consumo;

        return $this;
    }
}