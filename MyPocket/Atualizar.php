<?php

session_start();

require_once 'Conexão.php';

$id = $_POST['id'];
$tipo = $_POST['tipo'];
$valor = (float) $_POST['valor'];
$descricao = $_POST['descricao'];
$data = $_POST['data'];

$sql = "UPDATE transacoes
        SET descricao = ?,
            valor = ?,
            tipo = ?,
            data_transacao = ?
        WHERE id = ?";

$stmt = $conn->prepare($sql);

$stmt->bind_param(
    "sdssi",
    $descricao,
    $valor,
    $tipo,
    $data,
    $id
);

$stmt->execute();

$_SESSION['mensagem'] = "Transação atualizada com sucesso!";

header("Location: Index.php");
exit;