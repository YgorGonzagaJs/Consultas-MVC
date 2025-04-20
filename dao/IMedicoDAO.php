<?php
namespace dao;

interface IMedicoDAO {
    public function listar();
    public function listarId($id);
    public function inserir($nome, $especialidade);
    public function alterar($id, $nome, $especialidade);
    public function excluir($id);
}