<!DOCTYPE html>
<html lang="pr-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Aluno</title>
    <link rel="stylesheet" href="../estilo.css">
</head>
<?php
$server="localhost";
$user="root";
$pass="";
$bdname="final_db";

$conn=mysqli_connect($server,$user,$pass,$bdname);
echo '
<body>
<header>
<h1>Cadastro de Aluno</h1>
</header>
<section>
<div>';
if(!$conn){
    die("CONEXÃO FALHOU! - ".mysqli_connect_error());
}
else{
    $codigoturma=$_POST["turmaid"];

    if ($codigoturma<=0 || $codigoturma==""){
        echo"ID de Curso Invalido";
        exit;
    }
    $sqlpesquisa1 ="select * from turma where TurmaId=$codigoturma";
    $resultado1=@mysqli_query($conn,$sqlpesquisa1);

    if(!$resultado1){
        die("Pesquisa incorreta - ".mysqli_error($conn));
        exit;
    }
    else{

        $sql = "INSERT INTO aluno(AlunoId,AlunoNome,TurmaId) VALUES("
            ."'"
            .$_POST["nome"]
            ."','"
            .$_POST["nome"]
            ."','"
            .$_POST["turmaid"]
            ."');";

        if ($conn -> query($sql) === TRUE) {
            echo "REGISTRO REALIZADO COM SUCESSO";
        }
        else{
            echo "ERRO: ".$sql.'<br>'.$conn -> error;
        }
    }
}
echo '<br>
        <form method="post" action="index.html">
            <label>
                <input type="submit" value="Voltar.">
            </label>
        </form>
        <br>
</div>
</section>
<footer>Lucas Adriano Santos</footer>
</body>';
mysqli_close($conn);






