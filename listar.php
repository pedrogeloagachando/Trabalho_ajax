
<?php                                                                                                                                                                  require_once "conexao.php";
$conexao = conectar();
$sql = "SELECT * FROM receita";
$resultado = executarSQL($conexao, $sql);
$receitas = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
echo json_encode($receitas);

