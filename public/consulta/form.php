<?php
$consulta = $parametro['consulta'] ?? null;
$pacientes = $parametro['pacientes'] ?? [];
$medicos = $parametro['medicos'] ?? [];

$titulo = ($consulta != null) ? "Editar Consulta" : "Agendar Nova Consulta";
$acao = ($consulta != null) ? "/mvc-consultas/consulta/alterar" : "/mvc-consultas/consulta/inserir";
?>

<h2><?= $titulo ?></h2>

<form method="POST" action="<?= $acao ?>" class="ptrn">
    <div class="ptrn">
        <label for="paciente_id" class="form-label">Paciente:</label>
        <select class="form-select" id="paciente_id" name="paciente_id" required>
            <option value="">Selecione um paciente</option>
            <?php if (!empty($pacientes)): ?>
                <?php foreach ($pacientes as $paciente): ?>
                    <option value="<?= $paciente['id'] ?>" <?= ($consulta != null && $consulta[0]['paciente_id'] == $paciente['id']) ? 'selected' : '' ?>>
                        <?= $paciente['nome'] ?>
                    </option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>
    </div>
    
    <div class="ptrn">
        <label for="medico_id" class="form-label">Médico:</label>
        <select class="form-select" id="medico_id" name="medico_id" required>
            <option value="">Selecione um médico</option>
            <?php if (!empty($medicos)): ?>
                <?php foreach ($medicos as $medico): ?>
                    <option value="<?= $medico['id'] ?>" <?= ($consulta != null && $consulta[0]['medico_id'] == $medico['id']) ? 'selected' : '' ?>>
                        <?= $medico['nome'] ?> (<?= $medico['especialidade'] ?>)
                    </option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>
    </div>
    
    <div class="ptrn">
        <label for="data_consulta" class="form-label">Data da Consulta:</label>
        <input type="datetime-local" class="form-control" id="data_consulta" name="data_consulta" 
               value="<?= ($consulta != null) ? str_replace(' ', 'T', $consulta[0]['data_consulta']) : '' ?>" required>
    </div>
    
    <div class="ptrn">
        <label for="observacoes" class="form-label">Observações:</label>
        <textarea class="form-control" id="observacoes" name="observacoes" rows="4"><?= ($consulta != null) ? $consulta[0]['observacoes'] : '' ?></textarea>
    </div>
    
    <?php if ($consulta != null): ?>
        <input type="hidden" name="id" value="<?= $consulta[0]['id'] ?>">
    <?php endif; ?>
    
    <button type="submit" class="btn-voltar">Salvar</button>
    <a href="/mvc-consultas/consulta/lista" class="btn-rtrn">Cancelar</a>
</form>