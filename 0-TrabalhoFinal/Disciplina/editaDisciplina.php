<!DOCTYPE html>
<html lang="pr-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Disciplina</title>
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
<h1>Editar Disciplina</h1>
</header>
<section>
<div>';



$codigo = $_POST["id"];

$sql_busca = "select * from disciplina where DisciplinaId=$codigo";

$resultado=@mysqli_query($conn,$sql_busca);


if(!$sql_busca){
    die("Curso não encontrado - ".mysqli_error($conn));
}
else{
    $dados = mysqli_fetch_array($resultado);
    echo'<form method="post" action="editaDisciplina2.php">
        <label>
        ID:<br>
        <input type="text" name="idd" size="5" value="'.$dados['DisciplinaId'].'" readonly>
        <br>
        Nome:<br>
        <input type="text" name="nomee" size="50" value="'.$dados['DisciplinaNome'].'">
        <br>
        Ementa:<br>
        <input type="text" name="ementaa" size="50" value="'.$dados['DisciplinaEmenta'].'">
        <br>
        Horario:<br>
        <input type="text" name="horarioo" size="50" value="'.$dados['DisciplinaHorario'].'">
        <br>
        CursoID:<br>
        <input type="number" name="cursoo" size="50" value="'.$dados['CursoId'].'">
        <br>
        ProfessorID:<br>
        <input type="number" name="profesorr" size="50" value="'.$dados['ProfessorId'].'">
        <br>
        <br>
        <input type="submit" value="ENVIAR">
        </label>
        </form>';
}
echo '<br>
        <form method="post" action="editaDisciplina.html">
            <label>
                <input type="submit" value="Voltar.">
            </label>
        </form>
        <br>
</div>
</section>
<footer>Lucas Adriano Santos</footer>
</body>';