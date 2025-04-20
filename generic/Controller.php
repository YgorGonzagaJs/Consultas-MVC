<?php
namespace generic;

class Controller {
    private $arrChamadas = [];
    
    public function __construct() {
        $this->arrChamadas = [
            "paciente/lista" => new Acao("Paciente", "listar"),
            "paciente/formulario" => new Acao("Paciente", "formulario"),
            "paciente/formularioalterar" => new Acao("Paciente", "alterarForm"),
            "paciente/inserir" => new Acao("Paciente", "inserir"),
            "paciente/alterar" => new Acao("Paciente", "alterar"),
            "paciente/excluir" => new Acao("Paciente", "excluir"),
            
            "medico/lista" => new Acao("Medico", "listar"),
            "medico/formulario" => new Acao("Medico", "formulario"),
            "medico/formularioalterar" => new Acao("Medico", "alterarForm"),
            "medico/inserir" => new Acao("Medico", "inserir"),
            "medico/alterar" => new Acao("Medico", "alterar"),
            "medico/excluir" => new Acao("Medico", "excluir"),
            
            "consulta/lista" => new Acao("Consulta", "listar"),
            "consulta/formulario" => new Acao("Consulta", "formulario"),
            "consulta/formularioalterar" => new Acao("Consulta", "alterarForm"),
            "consulta/inserir" => new Acao("Consulta", "inserir"),
            "consulta/alterar" => new Acao("Consulta", "alterar"),
            "consulta/excluir" => new Acao("Consulta", "excluir"),
        ];
    }

    public function verificarChamadas($rota) {
        if(isset($this->arrChamadas[$rota])) {
            $acao = $this->arrChamadas[$rota];
            $acao->executar();
            return;
        }
        echo "Rota não existe!";
    }
}