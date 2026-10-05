<?php

include("../infra/conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $categoria = $_POST["categoria"];
    $faixa_etaria = $_POST["faixa_etaria"];
    $preco = $_POST["preco"];
    $quantidade_estoque = $_POST["quantidade_estoque"];

    $sql = "INSERT INTO brinquedos
            (nome, categoria, faixa_etaria, preco, quantidade_estoque)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $conexao->prepare($sql);

    $stmt->bind_param(
        "ssidi",
        $nome,
        $categoria,
        $faixa_etaria,
        $preco,
        $quantidade_estoque
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
    <title>Cadastrar brinquedo</title>
</head>

<body>

    <h1>Cadastrar brinquedo</h1>

    <form method="POST">

        <label>Nome:</label>
        <input type="text" name="nome" required>

        <br><br>

        <label>Categoria:</label>
        <input type="text" name="categoria" required>

        <br><br>

        <label>Faixa etária:</label>
        <input type="number" name="faixa_etaria" required>

        <br><br>

        <label>Preço:</label>
        <input type="number" step="0.01" name="preco" required>

        <br><br>

        <label>Quantidade em estoque:</label>
        <input type="number" name="quantidade_estoque" required>

        <br><br>

        <button type="submit">Cadastrar</button>

    </form>

    <br>

    <a href="../index.php">Voltar</a>

</body>

</html>