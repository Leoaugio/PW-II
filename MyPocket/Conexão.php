<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "mypocket";

$conn = new mysqli($servidor, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

echo "Conexão realizada com sucesso!";