<?php

session_start();

require_once 'Conexão.php';

try {

    $tipo = $_POST['tipo'];
    $valor = (float) $_POST['valor'];
    $descricao = $_POST['descricao'];
    $data = $_POST['data'];

    $sql = "INSERT INTO transacoes 
            (descricao, valor, tipo, data_transacao)
            VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "sdss",
        $descricao,
        $valor,
        $tipo,
        $data
    );

    $stmt->execute();

    $_SESSION['mensagem'] =
        "Transação cadastrada com sucesso!";

} catch (Exception $e) {

    $_SESSION['erro'] =
        $e->getMessage();
}

header("Location: Index.php");
exit;