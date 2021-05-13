<!DOCTYPE html>
<html lang="pr-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Turma</title>
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
<h1>Editar Turma</h1>
</header>
<section>
<div>';

$codigo = $_POST["id"];

$sql_busca = "select * from turma where TurmaId=$codigo";

$resultado=@mysqli_query($conn,$sql_busca);


if(!$sql_busca){
    die("Turma não encontrada - ".mysqli_error($conn));
}
else{
    $dados = mysqli_fetch_array($resultado);
    echo'<form method="post" action="editaTurma2.php">
        <label>
        ID:<br>
        <input type="text" name="idd" size="5" value="'.$dados['TurmaId'].'" readonly>
        <br>
        Descrição:<br>
        <input type="text" name="descc" size="50" value="'.$dados['TurmaDescricao'].'">
        <br>
        Curso ID:<br>
        <input type="number" name="cursoo" size="50" value="'.$dados['CursoId'].'">
        <br><br>
        <input type="submit" value="ENVIAR">
        </label>
        </form>';
}
echo '<br>
        <form method="post" action="editaTurma.html">
            <label>
                <input type="submit" value="Voltar.">
            </label>
        </form>
        <br>
</div>
</section>
<footer>Lucas Adriano Santos</footer>
</body>';