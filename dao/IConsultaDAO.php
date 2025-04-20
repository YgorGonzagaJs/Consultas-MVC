<?php
namespace dao;

interface IConsultaDAO {
    public function listar();
    public function listarId($id);
    public function inserir($paciente_id, $medico_id, $data_consulta, $observacoes);
    public function alterar($id, $paciente_id, $medico_id, $data_consulta, $observacoes);
    public function excluir($id);
}