<?php
$titulo = "Editar Paciente";
$acao = "/mvc-consultas/paciente/alterar";
?>

<h2><?= $titulo ?></h2>

<?php if ($parametro && count($parametro) > 0): ?>
    <form method="POST" action="<?= $acao ?>" class="ptrn">
        <div class="ptrn">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?= $parametro[0]["nome"] ?>" required>
        </div>
        
        <div class="ptrn">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $parametro[0]["email"] ?>" required>
        </div>
        
        <input type="hidden" name="id" value="<?= $parametro[0]["id"] ?>"/>
        
        <button type="submit" class="btn-voltar">Salvar Alterações</button>
        <a href="/mvc-consultas/paciente/lista" class="btn-rtrn">Cancelar</a>
    </form>
<?php else: ?>
    <div class="alert">
        Paciente não encontrado.
    </div>
    <a href="/mvc-consultas/paciente/lista" class="btn-voltar">Voltar para Lista</a>
<?php endif; ?> 