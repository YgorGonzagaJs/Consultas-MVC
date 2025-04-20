<h2>Consultas Agendadas</h2>

<?php
if (isset($_GET['info'])) {
    $info = $_GET['info'];
    if ($info == 1) {
        echo '<div class="alert alert-success">Consulta agendada com sucesso!</div>';
    } elseif ($info == 2) {
        echo '<div class="alert alert-success">Consulta alterada com sucesso!</div>';
    } elseif ($info == 3) {
        echo '<div class="alert alert-success">Consulta excluída com sucesso!</div>';
    }
}
?>

<a href="/mvc-consultas/consulta/formulario" class="btn-cad3">Agendar Nova Consulta</a>

<?php if (!empty($parametro)) : ?>
    <table class="table-tb">
        <thead>
            <tr>
                <th>Paciente</th>
                <th>Médico</th>
                <th>Data</th>
                <th>Observações</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($parametro as $consulta) : ?>
                <tr>
                    <td><?= $consulta['paciente_nome'] ?></td>
                    <td><?= $consulta['medico_nome'] ?></td>
                    <td><?= date('d/m/Y H:i', strtotime($consulta['data_consulta'])) ?></td>
                    <td>
                        <?php if (strlen($consulta['observacoes']) > 50): ?>
                            <?= substr($consulta['observacoes'], 0, 50) ?>...
                        <?php else: ?>
                            <?= $consulta['observacoes'] ?>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="/mvc-consultas/consulta/formularioalterar?id=<?= $consulta['id'] ?>" class="btn-edittwo">Editar</a>
                        <a href="/mvc-consultas/consulta/excluir?id=<?= $consulta['id'] ?>" class="btn-excluir" onclick="return confirm('Deseja realmente excluir esta consulta?')">Excluir</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
<?php else : ?>
    <div class="alert-nth">
        Nenhuma consulta agendada no momento.
    </div>
<?php endif; ?>