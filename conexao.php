<?php
$conexao = mysqli_connect("HOST", "LOGIN", "PASSWORD", "DB");
$conexao->set_charset("utf8");
     
if (!$conexao) {
    echo "Error: Falha ao conectar-se com o banco de dados MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
 
echo "Sucesso: Sucesso ao conectar-se com a base de dados MySQL." . PHP_EOL."<p>";
 
//mysqli_close($conexao);
?>  