<?php

session_start();

require_once 'Conexão.php';

$id = $_GET['id'];

$sql = "SELECT * FROM transacoes WHERE id = ?";

$stmt = $conn->prepare($sql);

$stmt->bind_param("i", $id);

$stmt->execute();

$resultado = $stmt->get_result();

$transacao = $resultado->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

<meta charset="UTF-8">

<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

<title>Editar Transação</title>

</head>

<body>

<div class="container mt-5">

<h1>Editar Transação</h1>

<form action="atualizar.php" method="POST">

<input
type="hidden"
name="id"
value="<?= $transacao['id'] ?>"
>

<label>Tipo</label>

<select
name="tipo"
class="form-select mb-2">

<option
value="receita"
<?= $transacao['tipo'] === 'receita' ? 'selected' : '' ?>>
Receita
</option>

<option
value="despesa"
<?= $transacao['tipo'] === 'despesa' ? 'selected' : '' ?>>
Despesa
</option>

</select>

<label>Valor</label>

<input
type="number"
step="0.01"
name="valor"
class="form-control mb-2"
value="<?= $transacao['valor'] ?>"
required>

<label>Descrição</label>

<input
type="text"
name="descricao"
class="form-control mb-2"
value="<?= $transacao['descricao'] ?>"
required>

<label>Data</label>

<input
type="date"
name="data"
class="form-control mb-2"
value="<?= $transacao['data_transacao'] ?>"
required>

<button
class="btn btn-primary">

Salvar alterações

</button>

<a
href="Index.php"
class="btn btn-secondary">

Cancelar

</a>

</form>

</div>

</body>

</html>