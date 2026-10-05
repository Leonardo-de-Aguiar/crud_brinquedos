<?php

include("../infra/conexao.php");

$id = $_GET["id"];

$sql = "SELECT * FROM brinquedos WHERE id = ?";

$stmt = $conexao->prepare($sql);

$stmt->bind_param("i", $id);

$stmt->execute();

$resultado = $stmt->get_result();

$prato = $resultado->fetch_assoc();

$stmt->close();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $categoria = $_POST["categoria"];
    $faixa_etaria = $_POST["faixa_etaria"];
    $preco = $_POST["preco"];
    $quantidade_estoque = $_POST["quantidade_estoque"];

    $sql = "UPDATE brinquedos SET
            nome = ?,
            categoria = ?,
            faixa_etaria = ?,
            preco = ?,
            quantidade_estoque = ?
            WHERE id = ?";

    $stmt = $conexao->prepare($sql);

    $stmt->bind_param(
        "ssidii",
        $nome,
        $categoria,
        $faixa_etaria,
        $preco,
        $quantidade_estoque,
        $id
    );

    $stmt->execute();

    $stmt->close();

    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar brinquedo</title>
</head>

<body>

    <h1>Editar brinquedo</h1>

    <form method="POST">

        <label>Nome:</label>
        <input
            type="text"
            name="nome"
            value="<?= $brinquedos['nome'] ?>"
            required
        >

        <br><br>

        <label>Categoria:</label>
        <input
            type="text"
            name="categoria"
            value="<?= $brinquedos['categoria'] ?>"
            required
        >

        <br><br>

        <label>Faixa etária:</label>
        <input
            type="number"
            name="faixa_etaria"
            value="<?= $brinquedos['faixa_etaria'] ?>"
            required
        >

        <br><br>

        <label>Preço:</label>
        <input
            type="number"
            step="0.01"
            name="preco"
            value="<?= $brinquedos['preco'] ?>"
            required
        >

        <br><br>

        <label>Quantidade em estoque:</label>
        <input
            type="number"
            name="quantidade_estoque"
            value="<?= $brinquedos['quantidade_estoque'] ?>"
            required
        >

        <br><br>

        <button type="submit">Salvar alterações</button>

    </form>

    <br>

    <a href="index.php">Voltar</a>

</body>

</html>