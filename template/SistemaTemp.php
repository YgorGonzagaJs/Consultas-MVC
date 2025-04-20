<?php
namespace template;

class SistemaTemp implements ITemplate {
    public function cabecalho() {
        echo '<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamento de Consultas</title>
</head>
<body>
    <nav class="menu-principal">
        <div class="menu-container">
            <a class="titulo-site" href="/mvc-consultas/">Sistema de Consultas Médicas</a>
            <div class="menu-itens" id="menu-itens">
                <ul class="lista-menu">
                    <li class="item-menu">
                        <a class="link-menu" href="/mvc-consultas/paciente/lista">Pacientes</a>
                    </li>
                    <li class="item-menu">
                        <a class="link-menu" href="/mvc-consultas/medico/lista">Médicos</a>
                    </li>
                    <li class="item-menu">
                        <a class="link-menu" href="/mvc-consultas/consulta/lista">Consultas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>
</html>';
    }
    
    public function rodape() {
    }
    
    public function layout($caminho, $parametro = null) {
        $this->cabecalho();
        include $_SERVER["DOCUMENT_ROOT"]."/mvc-consultas".$caminho;
        $this->rodape();
    }
}