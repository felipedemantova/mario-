<?php
$servidor = "localhost:3308";
$usuario = "root";
$senha = "root";
$dbname = "ceep";

// Criar a conexão
	
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
if (!$conn){
    die("Falha na conexao: " . mysqli_connect_error());
}
else{
    
    //echo "Conexao realizada com sucesso";
}