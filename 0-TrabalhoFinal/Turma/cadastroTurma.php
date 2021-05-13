<!DOCTYPE html>
<html lang="pr-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Turma</title>
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
<h1>Cadastro de Turma</h1>
</header>
<section>
<div>';
if(!$conn){
    die("CONEXÃO FALHOU! - ".mysqli_connect_error());
}
else{
    $codigocurso=$_POST["cursoid"];

    if ($codigocurso<=0 || $codigocurso==""){
        echo"ID de Curso Invalido";
        exit;
    }
    $sqlpesquisa1 ="select * from curso where CursoId=$codigocurso";
    $resultado1=@mysqli_query($conn,$sqlpesquisa1);

    if(!$resultado1){
        die("Pesquisa incorreta - ".mysqli_error($conn));
        exit;
    }
else{

$sql = "INSERT INTO turma(TurmaId,TurmaDescricao,CursoId) VALUES("
    ."'"
    .$_POST["desc"]
    ."','"
    .$_POST["desc"]
    ."','"
    .$_POST["cursoid"]
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






