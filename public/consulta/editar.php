<?php
$titulo = "Editar Consulta";
$acao = "/mvc-consultas/consulta/alterar";
?>

<h2><?= $titulo ?></h2>

<?php if ($parametro && count($parametro) > 0): ?>
    <form method="POST" action="<?= $acao ?>" class="ptrn">
        <div class="ptrn">
            <label for="paciente_id" class="form-label">Paciente:</label>
            <select class="form-select" id="paciente_id" name="paciente_id" required>
                <option value="">Selecione um paciente</option>
                <?php foreach ($pacientes as $paciente): ?>
                    <option value="<?= $paciente['id'] ?>" <?= ($parametro[0]['paciente_id'] == $paciente['id']) ? 'selected' : '' ?>>
                        <?= $paciente['nome'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div class="ptrn">
            <label for="medico_id" class="form-label">Médico:</label>
            <select class="form-select" id="medico_id" name="medico_id" required>
                <option value="">Selecione um médico</option>
                <?php foreach ($medicos as $medico): ?>
                    <option value="<?= $medico['id'] ?>" <?= ($parametro[0]['medico_id'] == $medico['id']) ? 'selected' : '' ?>>
                        <?= $medico['nome'] ?> (<?= $medico['especialidade'] ?>)
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div class="ptrn">
            <label for="data_consulta" class="form-label">Data da Consulta:</label>
            <input type="datetime-local" class="form-control" id="data_consulta" name="data_consulta" 
                   value="<?= str_replace(' ', 'T', $parametro[0]['data_consulta']) ?>" required>
        </div>
        
        <div class="ptrn">
            <label for="observacoes" class="form-label">Observações:</label>
            <textarea class="form-control" id="observacoes" name="observacoes" rows="4"><?= $parametro[0]['observacoes'] ?></textarea>
        </div>
        
        <input type="hidden" name="id" value="<?= $parametro[0]['id'] ?>">
        
        <button type="submit" class="btn-voltar">Salvar Alterações</button>
        <a href="/mvc-consultas/consulta/lista" class="btn-rtrn">Cancelar</a>
    </form>
<?php else: ?>
    <div class="alert">
        Consulta não encontrada.
    </div>
    <a href="/mvc-consultas/consulta/lista" class="btn-voltar">Voltar para Lista</a>
<?php endif; ?>