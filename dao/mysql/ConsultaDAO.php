<?php
namespace dao\mysql;

use dao\IConsultaDAO;
use generic\MysqlFactory;

class ConsultaDAO extends MysqlFactory implements IConsultaDAO {
    
    public function listar() {
        $sql = "SELECT c.id, p.nome as paciente_nome, m.nome as medico_nome, 
                c.data_consulta, c.observacoes 
                FROM consultas c
                JOIN pacientes p ON c.paciente_id = p.id
                JOIN medicos m ON c.medico_id = m.id";
        $retorno = $this->banco->executar($sql);
        return $retorno;
    }
    
    public function listarId($id) {
        $sql = "SELECT * FROM consultas WHERE id = :id";
        $param = [":id" => $id];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }

    public function inserir($paciente_id, $medico_id, $data_consulta, $observacoes) {
        $sql = "INSERT INTO consultas (paciente_id, medico_id, data_consulta, observacoes) 
                VALUES (:paciente_id, :medico_id, :data_consulta, :observacoes)";
        $param = [
            ":paciente_id" => $paciente_id,
            ":medico_id" => $medico_id,
            ":data_consulta" => $data_consulta,
            ":observacoes" => $observacoes
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }
    
    public function alterar($id, $paciente_id, $medico_id, $data_consulta, $observacoes) {
        $sql = "UPDATE consultas SET 
                paciente_id = :paciente_id, 
                medico_id = :medico_id, 
                data_consulta = :data_consulta, 
                observacoes = :observacoes 
                WHERE id = :id";
        $param = [
            ":paciente_id" => $paciente_id,
            ":medico_id" => $medico_id,
            ":data_consulta" => $data_consulta,
            ":observacoes" => $observacoes,
            ":id" => $id
        ];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }
    
    public function excluir($id) {
        $sql = "DELETE FROM consultas WHERE id = :id";
        $param = [":id" => $id];
        $retorno = $this->banco->executar($sql, $param);
        return $retorno;
    }
    
    public function listarPacientes() {
        $sql = "SELECT id, nome FROM pacientes";
        $retorno = $this->banco->executar($sql);
        return $retorno;
    }
    
    public function listarMedicos() {
        $sql = "SELECT id, nome, especialidade FROM medicos";
        $retorno = $this->banco->executar($sql);
        return $retorno;
    }
}