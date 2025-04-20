<?php
namespace controller;

use service\MedicoService;
use template\SistemaTemp;
use template\ITemplate;

class Medico {
    private ITemplate $template;
    
    public function __construct() {
        $this->template = new SistemaTemp();
    }

    public function listar() {
        $service = new MedicoService();
        $resultado = $service->listarMedicos();
        $this->template->layout("/public/medico/listar.php", $resultado);
    }

    public function inserir() {
        $nome = $_POST["nome"];
        $especialidade = $_POST["especialidade"];
        $service = new MedicoService();
        $resultado = $service->inserir($nome, $especialidade);
        header("location: /mvc-consultas/medico/lista?info=1");
    }

    public function formulario() {
        $this->template->layout("/public/medico/form.php");
    }
    
    public function alterarForm() {
        $id = $_GET["id"];
        $service = new MedicoService();
        $resultado = $service->listarId($id);
        $this->template->layout("/public/medico/form.php", $resultado);
    }
    
    public function alterar() {
        $id = $_POST["id"];
        $nome = $_POST["nome"];
        $especialidade = $_POST["especialidade"];
        $service = new MedicoService();
        $resultado = $service->alterar($id, $nome, $especialidade);
        header("location: /mvc-consultas/medico/lista?info=2");
    }
    
    public function excluir() {
        $id = $_GET["id"];
        $service = new MedicoService();
        $resultado = $service->excluir($id);
        header("location: /mvc-consultas/medico/lista?info=3");
    }
}