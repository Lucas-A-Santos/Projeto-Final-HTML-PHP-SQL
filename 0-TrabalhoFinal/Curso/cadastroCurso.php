<!DOCTYPE html>
<html lang="pr-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Curso</title>
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
<h1>Cadastro de Curso</h1>
</header>
<section>
<div>';
if(!$conn){
    die("CONEXÃO FALHOU! - ".mysqli_connect_error());
}

$sql = "INSERT INTO curso(CursoId,CursoNome,CursoPeriodo,CursoDescricao) VALUES("
    ."'"
    .$_POST["nome"]
    ."','"
    .$_POST["nome"]
    ."','"
    .$_POST["periodo"]
    ."','"
    .$_POST["desc"]
    ."');";

if ($conn -> query($sql) === TRUE) {
    echo "REGISTRO REALIZADO COM SUCESSO";
}
else{
    echo "ERRO: ".$sql.'<br>'.$conn -> error;
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






