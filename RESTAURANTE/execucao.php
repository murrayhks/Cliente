<?php
require_once ('modelos/Prato.php');
require_once ('modelos/Pedido.php');

$pratos = [
    new Prato(1, "CAMARÃO Á MILANESA", 110.00),
    new Prato(2, "PIZZA MARGHERITA", 80.00),
    new Prato(3, "MACARRÃO À CARBONARA", 60.00),
    new Prato(4, "BIFE A PARMEGIANA", 75.00),
    new Prato(5, "RISOTO AO FUNGHI", 70.00)
];

$pedidos = [];

while (true) {
    echo "\nBONA COMIDA:\n";
    echo "1 - CADASTRO\n";
    echo "2 - CANCELAR\n";
    echo "3 - LISTAR\n";
    echo "4 - TOTAL DE VENDAR\n";
    echo "0 - SAIR\n";
    $opcao = readline("ESCOLHA A OPÇÃO: ");

    if ($opcao == 1) {
        // CADASTRO
        $nomeCliente = readline("NOME DO CLIENTE: ");
        $nomeGarcom = readline("NME DO GARÇOM: ");
        echo "PRATOS DISPONIVEIS: \n";
        foreach ($pratos as $prato) {
            echo "{$prato->numero} - {$prato->nome} - R$ {$prato->valor}\n";
        }
        $numeroPrato = readline("NÚMERO DO PRATO : ");
        $pratoEscolhido = null;
        foreach ($pratos as $prato) {
            if ($prato->numero == $numeroPrato) {
                $pratoEscolhido = $prato;
                break;
            }
        }
        if ($pratoEscolhido) {
            $pedido = new Pedido($nomeCliente, $nomeGarcom, $pratoEscolhido);
            $pedidos[] = $pedido;
            echo "PEDIDO CADASTRADO COM SUCESSO !\n";
        } else {
            echo "O PRATO NÃO FOI ENCONTRADO.\n";
        }
    } elseif ($opcao == 2) {
        // CANCELAR
        $index = readline("ÍNDICE DO PEDIDO A SER CANCELADO: ");
        if (isset($pedidos[$index])) {
            array_splice($pedidos, $index, 1);
            echo "PEDIDO CANCELADO COM SUCESSO !\n";
        } else {
            echo "ÍNDICE INVALIDADO.\n";
        }
    } elseif ($opcao == 3) {
        // Listar pedidos
        if (empty($pedidos)) {
            echo "NENHUM PEDIDO CADASTRADO.\n";
        } else {
            foreach ($pedidos as $index => $pedido) {
                echo "PEDIDO {$index}:\n";
                echo "CLEINTE: {$pedido->nomeCliente}\n";
                echo "GARÇOM: {$pedido->nomeGarcom}\n";
                echo "PRATO: {$pedido->prato->nome} - R$ {$pedido->prato->valor}\n";
            }
        }
    } elseif ($opcao == 4) {
        // TOTAL DAS DVENDAS
        $total = 0;
        foreach ($pedidos as $pedido) {
            $total += $pedido->prato->valor;
        }
        echo "TOTAL DAS VENDAS : R$ {$total}\n";
    } elseif ($opcao == 0) {
        echo "SAINDO...\n";
        break;
    } else {
        echo "OPÇÃO INVALIDADA.\n";
    }
}
?>