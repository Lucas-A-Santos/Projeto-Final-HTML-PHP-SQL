<!DOCTYPE html>
<html lang="pr-BR">
<head>
    <meta charset="UTF-8">
    <title>Remover Turma</title>
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
<h1>Remover Turma</h1>
</header>
<section>
<div>';

$codigo = $_POST["id"];
$sql_deletar="delete from turma where TurmaId = $codigo";

$resultado= @mysqli_query($conn,$sql_deletar);

if (!$resultado)
{
    die("Execução Inválida".mysqli_error($conn));
}
else{
    echo"Turma Removida Com Sucesso.";
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