<!DOCTYPE html>
<html lang="pr-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Curso</title>
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
<h1>Editar Curso</h1>
</header>
<section>
<div>';

$codigo = $_POST["id"];

$sql_busca = "select * from curso where CursoId=$codigo";

$resultado=@mysqli_query($conn,$sql_busca);


if(!$sql_busca){
    die("Curso não encontrado - ".mysqli_error($conn));
}
else{
    $dados = mysqli_fetch_array($resultado);
    echo'<form method="post" action="editaCurso2.php">
        <label>
        ID:<br>
        <input type="text" name="idd" size="5" value="'.$dados['CursoId'].'" readonly>
        <br>
        Nome:<br>
        <input type="text" name="nomee" size="50" value="'.$dados['CursoNome'].'">
        <br>
        Periodo:<br>
        Diurno:<input type="radio" name="periodoo" value="Diurno" checked>
        Noturno:<input type="radio" name="periodoo" value="Noturno"><br>
        Descrição:<br>
        <input type="text" name="descc" size="50" value="'.$dados['CursoDescricao'].'">
        <br><br>
        <input type="submit" value="ENVIAR">
        </label>
        </form>';
}
echo '<br>
        <form method="post" action="editaCurso.html">
            <label>
                <input type="submit" value="Voltar.">
            </label>
        </form>
        <br>
</div>
</section>
<footer>Lucas Adriano Santos</footer>
</body>';