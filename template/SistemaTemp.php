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
    <link rel="stylesheet" href="/mvc-consultas/public/styles/style.css">
</head>
<body>
    <nav class="menu-principal">
        <div class="menu-container">
            <a class="titulo-site" href="/mvc-consultas/">Consultas Médicas</a>
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
</html>
<script src="/mvc-consultas/public/scripts/notificacao.js"></script>';
    }
    
    public function rodape() {
        echo '</main>
        <footer class="rodape">
            <div class="rodape-container">
                <div class="rodape-info">
                    <p>&copy; ' . date('Y') . ' - Sistema de Consultas Médicas</p>
                    <p>Ygor Gonzaga Josué</p>
                    <p>Uniube - Aplicações paraa Internet</p>
                </div>
            </div>
        </footer>
    </body>
    </html>';
    }
    
    public function layout($caminho, $parametro = null) {
        $this->cabecalho();
        include $_SERVER["DOCUMENT_ROOT"]."/mvc-consultas".$caminho;
        $this->rodape();
    }
}