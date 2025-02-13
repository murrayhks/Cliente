<?php 
require_once("modelos/Comercial.php");
require_once("modelos/Industrial.php");
require_once("modelos/Residencial.php");

do {
    echo"\n----------MENU DE FATURAS----------
    \n1-RESIDENCIAL
    \n2-COMERCIAL
    \n3-INDUSTRIAL
    \n0-SAIR\n";
    $resposta = readline("INFORME O TIPO DA FATURA: ");
    //OPCOES
    switch ($resposta) {
        case 1:
            //RESIDENCIAL
            echo "\nRESIDENCIAL\n";
            $fatura = new Residencial();
            echo "\CALCULAR FATURA RESIDENCIAL.\n";
            break;
        case 2:
            //COMERCIAL
            echo "\n______COMERCIAL______\n";
            $fatura = new Comercial();
            echo "\nCALCULAR FATURA COMERCIAL.\n";
        break;
        case 3:
            //INDUSTRIAL
            echo "\n______INDUSTRIAL______\n";
            $fatura = new Industrial();
            echo "\nCALCULAR FATURA INDUSTRIAL.\n";
        break;
        case 0:
            echo "\nENCERRANDO PROGRAMA...\n";
            exit;
        break;
        default:
            echo "\nOPÇÃO INVALIDADA...\n";
        break;
    }
    $consumo = readline("CONSUMO EM KWh? :");
    while (!is_numeric($consumo) || $consumo <= 0) {
        $consumo = readline("O VALOR PRECISA SER MAIOR QUE 0 : ");
    }

    $fatura->setConsumo($consumo);
    echo "O VALOR DA FATURA DE CONSUMO ".$fatura->getConsumo()."KWh É : R$".number_format($fatura->getValorFatura(),2,',','.')."\n";
    //ARREDONDAR AS CASAS DECIMAIS
} while ($resposta != 0);
?>