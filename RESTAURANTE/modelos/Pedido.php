<?php

require_once("Prato.php");
class Pedido {
    private string $nomeCliente;
    private string $nomeGarcom;
    private Prato $prato;
    public function __toString()
    {
        return sprintf("CLIENTE: %s | GARÇOM: %s | PRATO:  %d | %s | %.2f |", $this->getNomeCliente(), $this->getNomeGarcom(), $this->getPrato()->getNumero(), $this->getPrato()->getNome(), $this->getPrato()->getValor());
    }

    public function getNomeCliente(): string
    {
        return $this->nomeCliente;
    }

    public function setNomeCliente(string $nomeCliente): self
    {
        $this->nomeCliente = $nomeCliente;

        return $this;
    }

    public function getNomeGarcom(): string
    {
        return $this->nomeGarcom;
    }

    public function setNomeGarcom(string $nomeGarcom): self
    {
        $this->nomeGarcom = $nomeGarcom;

        return $this;
    }

    public function getPrato(): Prato
    {
        return $this->prato;
    }

    public function setPrato(Prato $prato): self
    {
        $this->prato = $prato;

        return $this;
    }
}
