<?php
$titulo = "Editar Médico";
$acao = "/mvc-consultas/medico/alterar";
?>

<h2><?= $titulo ?></h2>

<?php if ($parametro && count($parametro) > 0): ?>
    <form method="POST" action="<?= $acao ?>" class="ptrn">
        <div class="ptrn">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?= $parametro[0]["nome"] ?>" required>
        </div>
        
        <div class="ptrn">
            <label for="especialidade" class="form-label">Especialidade:</label>
            <input type="text" class="form-control" id="especialidade" name="especialidade" value="<?= $parametro[0]["especialidade"] ?>" required>
        </div>
        
        <input type="hidden" name="id" value="<?= $parametro[0]["id"] ?>"/>
        
        <button type="submit" class="btn-voltar">Salvar Alterações</button>
        <a href="/mvc-consultas/medico/lista" class="btn-rtrn">Cancelar</a>
    </form>
<?php else: ?>
    <div class="alert">
        Médico não encontrado.
    </div>
    <a href="/mvc-consultas/medico/lista" class="btn-voltar">Voltar para Lista</a>
<?php endif; ?>