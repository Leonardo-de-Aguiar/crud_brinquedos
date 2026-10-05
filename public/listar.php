<?php

include("../infra/conexao.php");

$sql = "SELECT * FROM brinquedos";

$resultado = $conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de brinquedos</title>
</head>

<body>

    <h1>Lista de brinquedos</h1>

    <a href="cadastrar.php">Cadastrar brinquedo</a>

    <br><br>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Categoria</th>
            <th>Faixa Etária</th>
            <th>Preço</th>
            <th>Estoque</th>
            <th>Ações</th>
        </tr>

        <?php while ($brinquedos = $resultado->fetch_assoc()) { ?>

            <tr>
                <td><?= $brinquedos['id'] ?></td>
                <td><?= $brinquedos['nome'] ?></td>
                <td><?= $brinquedos['categoria'] ?></td>
                <td><?= $brinquedos['faixa_etaria'] ?></td>
                <td>R$ <?= $brinquedos['preco'] ?></td>
                <td><?= $brinquedos['quantidade_estoque'] ?></td>

                <td>
                    <a href="editar.php?id=<?= $brinquedos['id'] ?>">
                        Editar
                    </a>

                    |

                    <a href="excluir.php?id=<?= $brinquedos['id'] ?>">
                        Excluir
                    </a>
                </td>
            </tr>

        <?php } ?>

    </table>

</body>
</html>