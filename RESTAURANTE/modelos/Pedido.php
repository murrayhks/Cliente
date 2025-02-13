<?php
require_once 'modelos/Prato.php';

class Pedido {
    public string $nomeCliente;
    public string $nomeGarcom;
    public Prato $prato;

    public function __construct($nomeCliente, $nomeGarcom, $prato) {
        $this->nomeCliente = $nomeCliente;
        $this->nomeGarcom = $nomeGarcom;
        $this->prato = $prato;
    }
}
?>