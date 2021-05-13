<!DOCTYPE html>
<html lang="pr-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Disciplina</title>
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
<h1>Cadastro de Disciplina</h1>
</header>
<section>
<div>';
if(!$conn){
    die("CONEXÃO FALHOU! - ".mysqli_connect_error());
}
else{
    $codigoprof=$_POST["professor"];
    $codigocurso=$_POST["curso"];

    if ($codigocurso<=0 || $codigocurso==""){
        echo"ID de Curso Invalido";
        exit;
    }
    if ($codigoprof<=0 || $codigoprof==""){
        echo"ID de Professor Invalido";
        exit;
    }
    $sqlpesquisa1 ="select * from curso where CursoId=$codigocurso";
    $resultado1=@mysqli_query($conn,$sqlpesquisa1);
    $sqlpesquisa2 ="select * from professor where ProfessorId=$codigoprof";
    $resultado2=@mysqli_query($conn,$sqlpesquisa2);
    if(!$resultado1){
        die("Pesquisa incorreta - ".mysqli_error($conn));
        exit;
    }
    else if(!$resultado2){
        die("Pesquisa incorreta - ".mysqli_error($conn));
        exit;
    }
else
{

    $sql = "INSERT INTO disciplina(DisciplinaId,DisciplinaNome,DisciplinaEmenta,DisciplinaHorario,CursoId,ProfessorId) VALUES("
    ."'"
    .$_POST["nome"]
    ."','"
    .$_POST["nome"]
    ."','"
    .$_POST["ementa"]
    ."','"
    .$_POST["horario"]
    ."','"
    .$_POST["curso"]
    ."','"
    .$_POST["professor"]
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






