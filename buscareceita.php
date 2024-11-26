<?php
$id_receita = $_GET['id_receita'];
require_once "conexao.php";
$conexao = conectar();
$sql = "SELECT id, nome, tipo, pais FROM receita
        WHERE id = $id_receita";
$resultado = executarSQL($conexao, $sql);
$receita = mysqli_fetch_assoc($resultado);
echo json_encode($receita);