<?php
class Prato {
    public int $numero;
    public string $nome;
    public float $valor;

    public function __construct($numero, $nome, $valor) {
        $this->numero = $numero;
        $this->nome = $nome;
        $this->valor = $valor;
    }
}
?>