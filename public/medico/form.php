<?php
$medico = $parametro['medico'] ?? ($parametro ?? null);
$titulo = ($medico != null) ? "Editar Médico" : "Cadastrar Médico";
$acao = ($medico != null) ? "/mvc-consultas/medico/alterar" : "/mvc-consultas/medico/inserir";
?>

<h2><?= $titulo ?></h2>

<form method="POST" action="<?= $acao ?>" class="ptrn">
    <div class="ptrn">
        <label for="nome" class="form-label">Nome:</label>
        <input type="text" class="form-control" id="nome" name="nome" value="<?= ($parametro != null) ? $parametro[0]["nome"] : "" ?>" required>
    </div>
    
    <div class="ptrn">
        <label for="especialidade" class="form-label">Especialidade:</label>
        <input type="text" class="form-control" id="especialidade" name="especialidade" value="<?= ($parametro != null) ? $parametro[0]["especialidade"] : "" ?>" required>
    </div>
    
    <?php
    if ($parametro != null) {
        ?>
        <input type="hidden" name="id" value="<?= $parametro[0]["id"] ?>"/>
        <?php
    }
    ?>
    
    <button type="submit" class="btn-voltar">Salvar</button>
    <a href="/mvc-consultas/medico/lista" class="btn-rtrn">Cancelar</a>
</form>