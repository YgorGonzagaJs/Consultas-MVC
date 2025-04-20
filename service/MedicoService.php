<?php
namespace service;

use dao\mysql\MedicoDAO;

class MedicoService extends MedicoDAO {
    public function listarMedicos() {
        return parent::listar();
    }

    public function inserir($nome, $especialidade) {
        return parent::inserir($nome, $especialidade);
    }
    
    public function alterar($id, $nome, $especialidade) {
        return parent::alterar($id, $nome, $especialidade);
    }
    
    public function listarId($id) {
        return parent::listarId($id);
    }
    
    public function excluir($id) {
        return parent::excluir($id);
    }
}