<?php
require_once("modelos/Pedido.php");
require_once("modelos/Prato.php");

function listarPedido($pedidos){
    if (count($pedidos) > 0) {
        foreach ($pedidos as $i => $p) {
            echo $i+1 . "º " . $p->__toString() . "\n";
        }
    } else {
        echo "NENUHM PEDIDO FOI CADASTRADO.";
    }
    
}

function numeroPrato(array $pratos, int $numero){
    foreach ($pratos as $p) {
        if ($p->getNumero() == $numero) {
            return $p;
        }

    }
    return null;
}

$pratos = array (
    New Prato(1, "CAMARÃO A MILANESA", 110.00),
    New Prato(2, "PIZZA DE MARGHERITA", 80.00),
    New Prato(3, "MACARRÃO A CARBONARA", 60.00),
    New Prato(4, "BIFE A PARMEGIANA", 75.00),
    New Prato(5, "RISOTO AO FUNGHI", 70.00)
);

$pedidos = [];


do {
    echo "\n\n----------MENU----------\n";
    echo "1- CADASTRO:\n";
    echo "2- CANCELAR:\n";
    echo "3- LISTAR: \n";
    echo "4- TOTAL DAS VENDAS: \n";
    echo "0- SAIR\n";
    echo "------------------------\n";
    $opcao = readline("INSIRA A OPÇÃO: ");

    echo "\n";

    switch($opcao) {
        case 1:

            $pedido = New Pedido; 

            $pedido->setNomeCliente(readline("NOME DO CLIENTE: "))->setNomeGarcom(readline("NOME DO GARÇOM: "));

            echo "PRATOS DISPONIVEIS:\n";

            foreach ($pratos as $p) {
                echo $p->getNumero() . "|" . $p->getNome() . "| R$" . $p->getValor() . "|\n";
            }

            $prato = null;
            while($prato == null){
                $numPrato = readline("INFORME O NUMERO DO PRATO: ");

                $prato = numeroPrato($pratos, $numPrato);
                // print_r($prato);
            }

            $pedido->setPrato($prato);

            array_push($pedidos, $pedido);
            break;
        case 2:
            listarPedido($pedidos);

            if (count($pedidos) > 0) {
                $id = readline("INSIRA O ID DO PEDIDO QUE DESEJA EXLCUIR OU CANCELAR : ");

                if ($id > 0 && $id <= count($pedidos)) {
                    array_splice($pedidos, $id-1, 1);
                } else {
                    echo "ESTE PEDIDO NÃO ESTÁ DISPONIVEL!\n";
                }
            } 
            //array_slice
            // print_r($pedidos);
            break;
        case 3:
            listarPedido($pedidos);
            break;
        case 4: 
            echo "TOTAL DE PEDIDOS: " . count($pedidos);
            break;
        case 0:
            echo "SAINDO...!\n";
            break;
        default:
            echo "OPÇÃO INVALIDADA!\n";
    }
} while($opcao != 0);   
