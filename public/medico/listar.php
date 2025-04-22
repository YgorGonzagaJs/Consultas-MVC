<h2>Lista de Médicos</h2>

<?php
if (isset($_GET['info'])) {
    $mensagem = '';
    if ($_GET['info'] == 1) {
        $mensagem = 'Médico cadastrado com sucesso!';
    } elseif ($_GET['info'] == 2) {
        $mensagem = 'Médico alterado com sucesso!';
    } elseif ($_GET['info'] == 3) {
        $mensagem = 'Médico excluído com sucesso!';
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
                <th>Nome</th>
                <th>Especialidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($parametro as $p) : ?>
                <tr>
                    <td><?= $p["nome"] ?></td>
                    <td><?= $p["especialidade"] ?></td>
                    <td>
                        <a href="/mvc-consultas/medico/formularioalterar?id=<?= $p["id"] ?>" class="btn-edittwo">Editar</a>
                        <a href="/mvc-consultas/medico/excluir?id=<?= $p["id"] ?>" class="btn-excluir" onclick="return confirm('Deseja realmente excluir este médico?')">Excluir</a>
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

<a href="/mvc-consultas/medico/formulario" class="btn-ag">Cadastrar Novo Médico</a>
