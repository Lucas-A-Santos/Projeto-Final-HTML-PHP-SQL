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

$codigo = $_POST['idd'];
$nome1 = $_POST['nomee'];
$periodo1 = $_POST['periodoo'];
$desc1 = $_POST['descc'];


$sql_update = 'UPDATE curso SET CursoNome="'.$nome1.'",CursoPeriodo="'.$periodo1.'",CursoDescricao="'.$desc1.'" WHERE CursoId="'.$codigo.'"';

$resultado=@mysqli_query($conn,$sql_update);
if(!$resultado){
    die("Algo deu Errado - ".mysqli_error($conn));
}
else {

    echo"Curso Editado com Sucesso";
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
mysqli_close($conn);