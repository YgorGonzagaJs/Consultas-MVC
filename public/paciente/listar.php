<h2>Lista de Pacientes</h2>

<?php
if (isset($_GET['info'])) {
    $mensagem = '';
    if ($_GET['info'] == 1) {
        $mensagem = 'Paciente cadastrado com sucesso!';
    } elseif ($_GET['info'] == 2) {
        $mensagem = 'Paciente alterado com sucesso!';
    } elseif ($_GET['info'] == 3) {
        $mensagem = 'Paciente excluído com sucesso!';
    }

    if ($mensagem !== '') {
        echo "<script>alert('$mensagem');</script>";
    }
}
?>

<?php if (!empty($parametro)) : ?>
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
            <?php foreach ($parametro as $p) : ?>
                <tr>
                    <td><?= $p["id"] ?></td>
                    <td><?= $p["nome"] ?></td>
                    <td><?= $p["email"] ?></td>
                    <td>
                        <a href="/mvc-consultas/paciente/formularioalterar?id=<?= $p["id"] ?>" class="btn-edittwo">Editar</a>
                        <a href="/mvc-consultas/paciente/excluir?id=<?= $p["id"] ?>" class="btn-excluir" onclick="return confirm('Deseja realmente excluir este paciente?')">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else : ?>
    <div class="alert-nth">
        Nenhuma médico cadastrado!
    </div>
<?php endif; ?>

<a href="/mvc-consultas/paciente/formulario" class="btn-ag">Cadastrar Novo Paciente</a>
