<?php
namespace service;

use dao\mysql\ConsultaDAO;

class ConsultaService extends ConsultaDAO {
    public function listarConsultas() {
        return parent::listar();
    }

    public function inserir($paciente_id, $medico_id, $data_consulta, $observacoes) {
        return parent::inserir($paciente_id, $medico_id, $data_consulta, $observacoes);
    }
    
    public function alterar($id, $paciente_id, $medico_id, $data_consulta, $observacoes) {
        return parent::alterar($id, $paciente_id, $medico_id, $data_consulta, $observacoes);
    }
    
    public function listarId($id) {
        return parent::listarId($id);
    }
    
    public function excluir($id) {
        return parent::excluir($id);
    }
    
    public function listarPacientes() {
        return parent::listarPacientes();
    }
    
    public function listarMedicos() {
        return parent::listarMedicos();
    }
}