<?php
namespace controller;

use service\ConsultaService;
use template\SistemaTemp;
use template\ITemplate;

class Consulta {
    private ITemplate $template;
    
    public function __construct() {
        $this->template = new SistemaTemp();
    }

    public function listar() {
        $service = new ConsultaService();
        $resultado = $service->listarConsultas();
        $this->template->layout("/public/consulta/listar.php", $resultado);
    }

    public function inserir() {
        $paciente_id = $_POST["paciente_id"];
        $medico_id = $_POST["medico_id"];
        $data_consulta = $_POST["data_consulta"];
        $observacoes = $_POST["observacoes"];
        
        $service = new ConsultaService();
        $resultado = $service->inserir($paciente_id, $medico_id, $data_consulta, $observacoes);
        header("location: /mvc-consultas/consulta/lista?info=1");
    }

    public function formulario() {
        $service = new ConsultaService();
        $pacientes = $service->listarPacientes();
        $medicos = $service->listarMedicos();
        
        $dados = [
            "pacientes" => $pacientes,
            "medicos" => $medicos,
            "consulta" => null
        ];
        
        $this->template->layout("/public/consulta/form.php", $dados);
    }
    
    public function alterarForm() {
        $id = $_GET["id"];
        $service = new ConsultaService();
        $consulta = $service->listarId($id);
        $pacientes = $service->listarPacientes();
        $medicos = $service->listarMedicos();
        
        $dados = [
            "pacientes" => $pacientes,
            "medicos" => $medicos,
            "consulta" => $consulta
        ];
        
        $this->template->layout("/public/consulta/form.php", $dados);
    }
    
    public function alterar() {
        $id = $_POST["id"];
        $paciente_id = $_POST["paciente_id"];
        $medico_id = $_POST["medico_id"];
        $data_consulta = $_POST["data_consulta"];
        $observacoes = $_POST["observacoes"];
        
        $service = new ConsultaService();
        $resultado = $service->alterar($id, $paciente_id, $medico_id, $data_consulta, $observacoes);
        header("location: /mvc-consultas/consulta/lista?info=2");
    }
    
    public function excluir() {
        $id = $_GET["id"];
        $service = new ConsultaService();
        $resultado = $service->excluir($id);
        header("location: /mvc-consultas/consulta/lista?info=3");
    }
}