<h2>Lista de Pacientes</h2>

<?php
if (isset($_GET['info'])) {
    $info = $_GET['info'];
    if ($info == 1) {
        echo '<div class="alert alert-success">Paciente cadastrado com sucesso!</div>';
    } elseif ($info == 2) {
        echo '<div class="alert alert-success">Paciente alterado com sucesso!</div>';
    } elseif ($info == 3) {
        echo '<div class="alert alert-success">Paciente excluído com sucesso!</div>';
    }
}
?>

<a href="/mvc-consultas/paciente/formulario" class="btn-cad3">Cadastrar Novo Paciente</a>

<table class="table-tb">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
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
                    <td><?= $p["email"] ?></td>
                    <td>
                        <a href="/mvc-consultas/paciente/formularioalterar?id=<?= $p["id"] ?>" class="btn-edittwo">Editar</a>
                        <a href="/mvc-consultas/paciente/excluir?id=<?= $p["id"] ?>" class="btn-excluir" onclick="return confirm('Deseja realmente excluir este paciente?')">Excluir</a>
                    </td>
                </tr>
                <?php
            }
        } else {
            echo '<tr><td colspan="4" class="text-center">Nenhum paciente cadastrado</td></tr>';
        }
        ?>
    </tbody>
</table>