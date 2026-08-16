<?php

session_start();

require_once 'Conexão.php';

$id = $_GET['id'];

$sql = "DELETE FROM transacoes WHERE id = ?";

$stmt = $conn->prepare($sql);

$stmt->bind_param("i", $id);

$stmt->execute();

$_SESSION['mensagem'] = "Transação excluída com sucesso!";

header("Location: Index.php");
exit;