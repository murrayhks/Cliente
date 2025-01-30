<?php 
require_once ("modelos/Cliente.php");
require_once ("modelos/ClientePJ.php");
require_once ("modelos/ClientePF.php");
require_once("util/conexao.php");
class ClienteDAO {

    public  function inserirCliente(Cliente $cliente){
        $sql = "INSERT INTO clientes (tipo,nome_social,email,nome,cpf,razao_social,cnpj) 
        VALUES 
        (?,?,?,?,?,?,?)";
        $con = Conexao::getConn();
        $stm = $con->prepare($sql);
        if ($cliente instanceof ClientePF) {
            $stm->execute(array($cliente->getTipo(),
                                $cliente->getNomeSocial(),
                                $cliente->getEmail(),
                                $cliente->getNome(),
                                $cliente->getCpf(),
                                null,
                                null));
        }elseif ($cliente instanceof ClientePJ) {
            $stm->execute(array($cliente->getTipo(),
                                $cliente->getNomeSocial(),
                                $cliente->getEmail(),
                                null,
                                null,
                                $cliente->getRazaoSocial(),
                                $cliente->getCnpj()));
        }
        
    }
    public function listarClientes(){
        $sql = "SELECT * FROM clientes";
        $con = Conexao::getConn();
        $stm = $con->prepare($sql);
        $stm->execute();
        $registros = $stm->fetchAll();
        return $this->mapClientes($registros);

    }
    public function buscarPorId($id){

        $sql = "SELECT * FROM clientes WHERE id = $id";
        $con = Conexao::getConn();
        $stm = $con->prepare($sql);
        $stm->execute();
        $registros = $stm->fetchAll();
        return $this->mapClientes($registros);

    }
    public function excluirCliente($id){
        
        $sql = "DELETE FROM clientes WHERE id = $id";
        $con = Conexao::getConn();
        $stm = $con->prepare($sql);
        return $stm->execute();
    }
    private function mapClientes(array $registros){
        $clientes = array();
        foreach($registros as $reg){
            $cliente = null;
            if($reg['tipo'] == 'F'){
                $cliente = new ClientePF();
                $cliente->setNome($reg['nome']);
                $cliente->setCpf($reg['cpf']);
            }else{
                $cliente = new ClientePJ();
                $cliente->setRazaoSocial($reg['razao_social']);
                $cliente->setCnpj($reg['cnpj']);
            }
            $cliente->setId($reg['id']);
            $cliente->setNomeSocial($reg['nome_social']);
            $cliente->setEmail($reg['email']);
            array_push($clientes,$cliente);
        }
        return $clientes;
    }
}

?>
