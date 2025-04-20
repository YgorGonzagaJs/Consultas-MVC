<?php
namespace dao;

interface IPacienteDAO {
    public function listar();
    public function listarId($id);
    public function inserir($nome, $email);
    public function alterar($id, $nome, $email);
    public function excluir($id);
}