<h2>Lista de Médicos</h2>

<?php
if (isset($_GET['info'])) {
    $info = $_GET['info'];
    if ($info == 1) {
        echo '<div class="alert alert-success">Médico cadastrado com sucesso!</div>';
    } elseif ($info == 2) {
        echo '<div class="alert alert-success">Médico alterado com sucesso!</div>';
    } elseif ($info == 3) {
        echo '<div class="alert alert-success">Médico excluído com sucesso!</div>';
    }
}
?>

<a href="/mvc-consultas/medico/formulario" class="btn-cad3">Cadastrar Novo Médico</a>

<table class="table-tb">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Especialidade</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!empty($parametro)) {
            foreach ($parametro as $p) {
                ?>
                <tr>
                    <td><?= $p["id"] ?></td>
                    <td><?= $p["nome"] ?></td>
                    <td><?= $p["especialidade"] ?></td>
                    <td>
                        <a href="/mvc-consultas/medico/formularioalterar?id=<?= $p["id"] ?>" class="btn-edittwo">Editar</a>
                        <a href="/mvc-consultas/medico/excluir?id=<?= $p["id"] ?>" class="btn-excluir" onclick="return confirm('Deseja realmente excluir este médico?')">Excluir</a>
                    </td>
                </tr>
                <?php
            }
        } else {
            echo '<tr><td colspan="4" class="text-center">Nenhum médico cadastrado</td></tr>';
        }
        ?>
    </tbody>
</table>