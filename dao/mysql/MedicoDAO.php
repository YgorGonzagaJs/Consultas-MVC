<?php
namespace dao\mysql;

use dao\IMedicoDAO;
use generic\MysqlFactory;

class MedicoDAO extends MysqlFactory implements IMedicoDAO {
    
    public function listar() {
        $sql = "SELECT id, nome, especialidade FROM medicos";
        $retorno = $this->banco->executar($sql);
        return $retorno;
    }
    
    public function listarId($id) {
        $sql = "SELECT id, nome, especialidade FROM medicos WHERE id = :id";
        $param = [":id" => $id];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }

    public function inserir($nome, $especialidade) {
        $sql = "INSERT INTO medicos (nome, especialidade) VALUES (:nome, :especialidade)";
        $param = [
            ":nome" => $nome,
            ":especialidade" => $especialidade
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }
    
    public function alterar($id, $nome, $especialidade) {
        $sql = "UPDATE medicos SET nome = :nome, especialidade = :especialidade WHERE id = :id";
        $param = [
            ":nome" => $nome,
            ":especialidade" => $especialidade,
            ":id" => $id
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }
    
    public function excluir($id) {
        $sql = "DELETE FROM medicos WHERE id = :id";
        $param = [":id" => $id];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }
}