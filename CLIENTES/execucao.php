<?php
require_once("util/conexao.php");
require_once("modelos/ClientePF.php");
require_once("modelos/ClientePJ.php");
require_once("dao/ClienteDAO.php");

//$con = Conexao::getCon();

//print_r($con);

echo "\n----CADASTRO----\n";
echo "1 - CADASTRAR CLIENTES PF\n";
echo "2 - CADASTRAR CLIENTES PJ\n";
echo "3 - LISTAR CLIENTES\n";
echo "4 - BUSCAR CLIENTES\n";
echo "5 - EXCLUIR CLIENTES\n";
echo "0 - SAIR\n";

$opcao = readline("INFORME A OPÇÃO: ");
switch ($opcao) {
    case 1:
        $cliente = new ClientePF();
        $cliente->setNome(readline("INFORME O NOME: "));
        $cliente->setNomeSocial(readline("INFORME O NOME SOCIAL : "));
        $cliente->setCpf(readline("INFORME O CPF: "));
        $cliente->setEmail(readline("INFORME O E-MAIL: "));
        print_r($cliente);


        //dao
        $clienteDAO = new ClienteDAO();
        $clienteDAO->inserirCliente($cliente);
        break;
    case 2:
        $cliente = new ClientePJ();
        $cliente->setRazaoSocial(readline("INFORME A RS: "));
        $cliente->setNomeSocial(readline("INFORME O NOME SOCIAL : "));
        $cliente->setCnpj(readline("INFORME O CNPJ: "));
        $cliente->setEmail(readline("INFORME O E-MAIL: "));
        print_r($cliente);
        break;
    case 3:
        echo "\n--- LISTA DE CLIENTES ---\n";

        $clienteDAO = new ClienteDAO();
        $clientes = $clienteDAO->listarClientes();

        foreach ($clientes as $cliente) {
            print_r($cliente);
        }
        break;

    case 4:
        $tipoCliente = readline("INFORME O TIPO DE CLIENTE PARA BUSCA (PF ou PJ): ");

        if (strtoupper($tipoCliente) == 'PF') {
            $cpf = readline("INFORME O CPF: ");
            echo "BUSCANDO CLIENTE PF COM PDF: $cpf\n";
        } elseif (strtoupper($tipoCliente) == 'PJ') {
            $cnpj = readline("INFORME O CNPJ: ");
            echo "BUSCANDO CLIENTE PJ COM CNPJ: $cnpj\n";
        } else {
            echo "TIPO DE CLIENTE INVALIDADO!\n";
        }
        break;

    case 5:
        // Excluir cliente
        $tipoExcluir = readline("INFORME O TIPO DE CLIENTE PARA EXLCUSÃO (PF ou PJ): ");

        if (strtoupper($tipoExcluir) == 'PF') {
            $cpfExcluir = readline("ISNSIRA O CPF PARA EXCLUSÃO: ");
            echo "EXCLUIDO COM SUCESSO CLIENTE PF COM CPF: $cpfExcluir\n";
        } elseif (strtoupper($tipoExcluir) == 'PJ') {
            $cnpjExcluir = readline("INSIRA O CNPJ PARA EXCLUSÃO: ");
            // Excluir cliente PJ com o CNPJ informado
            echo "EXCLUIDO COM SUCESSO CLIENTE PJ COM CNPJ: $cnpjExcluir\n";
        } else {
            echo "CLIENTE INVALIDO!\n";
        }
        break;

    case 0:
        echo "PROGRAMA CONCLUÍDO.\n";
        break;

    default:
        echo "OPÇÃO INVALIDADA! TENTE NOVAMENTE MAIS TARDE...\n";
}
