<div class="card">
    <div class="card-header">
        <h2>Detalhes da Consulta</h2>
    </div>
    <div class="card-body">
        <?php if ($parametro && count($parametro) > 0): ?>
            <h5 class="card-title">Consulta #<?= $parametro[0]['id'] ?></h5>
            
            <div class="row">
                <div class="col">
                    <p><strong>Paciente:</strong> <?= $parametro[0]['paciente_nome'] ?></p>
                    <p><strong>Médico:</strong> <?= $parametro[0]['medico_nome'] ?></p>
                    <p><strong>Data:</strong> <?= date('d/m/Y H:i', strtotime($parametro[0]['data_consulta'])) ?></p>
                </div>
                <div class="col">
                    <p><strong>Observações:</strong></p>
                    <div class="border p-2 rounded bg-light">
                        <?= nl2br($parametro[0]['observacoes']) ?>
                    </div>
                </div>
            </div>
            
            <div class="edit-vt">
            <a href="/mvc-consultas/consulta/formularioalterar?id=<?= $parametro[0]['id'] ?>" class="btn-edit">Editar</a>
            <a href="/mvc-consultas/consulta/lista" class="btn-rtrn">Voltar para Lista</a>
            </div>
        <?php else: ?>
            <p class="card-text">Consulta não encontrada.</p>
            <a href="/mvc-consultas/consulta/lista" class="btn-voltar">Voltar para Lista</a>
        <?php endif; ?>
    </div>
</div>