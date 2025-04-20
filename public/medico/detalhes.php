<div class="card">
    <div class="card-header">
        <h2>Detalhes do Médico</h2>
    </div>
    <div class="card-body">
        <?php if ($parametro && count($parametro) > 0): ?>
            <h5 class="card-title"><?= $parametro[0]["nome"] ?></h5>
            <p class="card-text"><strong>ID:</strong> <?= $parametro[0]["id"] ?></p>
            <p class="card-text"><strong>Especialidade:</strong> <?= $parametro[0]["especialidade"] ?></p>
            
            <div class="edit-vt">
                <a href="/mvc-consultas/medico/formularioalterar?id=<?= $parametro[0]["id"] ?>" class="btn-edit">Editar</a>
                <a href="/mvc-consultas/medico/lista" class="btn-rtrn">Voltar para Lista</a>
            </div>
        <?php else: ?>
            <p class="card-text">Médico não encontrado.</p>
            <a href="/mvc-consultas/medico/lista" class="btn-voltar">Voltar para Lista</a>
        <?php endif; ?>
    </div>
</div>