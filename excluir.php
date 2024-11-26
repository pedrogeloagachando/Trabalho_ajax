<?php
$id_receita = $_GET['id_receita'];
require_once "conexao.php";
$conexao = conectar();
$sql = "DELETE FROM receita WHERE id = $id_receita";
$retorno = executarSQL($conexao, $sql);
echo json_encode($retorno);