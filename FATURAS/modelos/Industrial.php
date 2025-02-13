<?php 
require_once  ("IConsumidorEnergia.php");
class Industrial implements  IConsumidorEnergia {

    private $consumo;
    public function getValorFatura(){
        if ($this->consumo <= 500) {
            $preco = 1.80;
        }else{
            $preco = 2.30;
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