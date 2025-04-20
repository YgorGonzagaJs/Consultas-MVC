<?php
$paciente = $parametro['paciente'] ?? ($parametro ?? null);
$titulo = ($paciente != null) ? "Editar Paciente" : "Cadastrar Paciente";
$acao = ($paciente != null) ? "/mvc-consultas/paciente/alterar" : "/mvc-consultas/paciente/inserir";
?>

<h2><?= $titulo ?></h2>

<form method="POST" action="<?= $acao ?>" class="ptrn">
    <div class="ptrn">
        <label for="nome" class="form-label">Nome:</label>
        <input type="text" class="form-control" id="nome" name="nome" value="<?= ($parametro != null) ? $parametro[0]["nome"] : "" ?>" required>
    </div>
    
    <div class="ptrn">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" id="email" name="email" value="<?= ($parametro != null) ? $parametro[0]["email"] : "" ?>" required>
    </div>
    
    <?php
    if ($parametro != null) {
        ?>
        <input type="hidden" name="id" value="<?= $parametro[0]["id"] ?>"/>
        <?php
    }
    ?>
    
    <button type="submit" class="btn-voltar">Salvar</button>
    <a href="/mvc-consultas/paciente/lista" class="btn-rtrn">Cancelar</a>
</form>