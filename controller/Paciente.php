<?php
namespace controller;

use service\PacienteService;
use template\SistemaTemp;
use template\ITemplate;

class Paciente {
    private ITemplate $template;
    
    public function __construct() {
        $this->template = new SistemaTemp();
    }

    public function listar() {
        $service = new PacienteService();
        $resultado = $service->listarPacientes();
        $this->template->layout("/public/paciente/listar.php", $resultado);
    }

    public function inserir() {
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $service = new PacienteService();
        $resultado = $service->inserir($nome, $email);
        header("location: /mvc-consultas/paciente/lista?info=1");
    }

    public function formulario() {
        $this->template->layout("/public/paciente/form.php");
    }
    
    public function alterarForm() {
        $id = $_GET["id"];
        $service = new PacienteService();
        $resultado = $service->listarId($id);
        $this->template->layout("/public/paciente/form.php", $resultado);
    }
    
    public function alterar() {
        $id = $_POST["id"];
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $service = new PacienteService();
        $resultado = $service->alterar($id, $nome, $email);
        header("location: /mvc-consultas/paciente/lista?info=2");
    }
    
    public function excluir() {
        $id = $_GET["id"];
        $service = new PacienteService();
        $resultado = $service->excluir($id);
        header("location: /mvc-consultas/paciente/lista?info=3");
    }
}