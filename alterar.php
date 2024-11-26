<?php

require_once "conexao.php";
$conexao = conectar();
$receita = json_decode(file_get_contents("php://input"));
$sql = "UPDATE receita SET
        nome = '$receita->nome', 
        tipo = '$receita->tipo', 
        pais = '$receita->pais'
        WHERE id = $receita->id_receita";
executarSQL($conexao, $sql);
echo json_encode($receita);
