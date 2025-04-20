<?php
namespace dao\mysql;

use dao\IPacienteDAO;
use generic\MysqlFactory;

class PacienteDAO extends MysqlFactory implements IPacienteDAO {
    
    public function listar() {
        $sql = "SELECT id, nome, email FROM pacientes";
        $retorno = $this->banco->executar($sql);
        return $retorno;
    }
    
    public function listarId($id) {
        $sql = "SELECT id, nome, email FROM pacientes WHERE id = :id";
        $param = [":id" => $id];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }

    public function inserir($nome, $email) {
        $sql = "INSERT INTO pacientes (nome, email) VALUES (:nome, :email)";
        $param = [
            ":nome" => $nome,
            ":email" => $email
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }
    
    public function alterar($id, $nome, $email) {
        $sql = "UPDATE pacientes SET nome = :nome, email = :email WHERE id = :id";
        $param = [
            ":nome" => $nome,
            ":email" => $email,
            ":id" => $id
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }
    
    public function excluir($id) {
        $sql = "DELETE FROM pacientes WHERE id = :id";
        $param = [":id" => $id];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }
}