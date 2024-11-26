<?php
require_once "conexao.php";
$conexao = conectar();
$receita = json_decode(file_get_contents("php://input"));
$sql = "INSERT INTO receita
        (nome, tipo, pais)
        VALUES 
        ('$receita->nome', 
        '$receita->tipo', 
        '$receita->pais')";
executarSQL($conexao, $sql);
$receita->id = mysqli_insert_id($conexao);
echo json_encode($receita);
