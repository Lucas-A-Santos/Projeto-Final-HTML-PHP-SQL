<!DOCTYPE html>
<html lang="pr-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Professor</title>
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
<h1>Cadastro de Professor</h1>
</header>
<section>
<div>';
if(!$conn){
    die("CONEXÃO FALHOU! - ".mysqli_connect_error());
}

$sql = "INSERT INTO professor(ProfessorId,ProfessorNome,ProfessorTitulo) VALUES("
    ."'"
    .$_POST["nome"]
    ."','"
    .$_POST["nome"]
    ."','"
    .$_POST["titulo"]
    ."');";

if ($conn -> query($sql) === TRUE) {
    echo "CADASTRO REALIZADO COM SUCESSO";
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






