<!DOCTYPE html>
<html lang="pr-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Professor</title>
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
<h1>Editar Professor</h1>
</header>
<section>
<div>';

$codigo = $_POST['idd'];
$nome1 = $_POST['nomee'];
$titulo1 = $_POST['tituloo'];


$sql_update = 'UPDATE professor SET ProfessorNome="'.$nome1.'",ProfessorTitulo="'.$titulo1.'" WHERE ProfessorId="'.$codigo.'"';

$resultado=@mysqli_query($conn,$sql_update);
if(!$resultado){
    die("Algo deu Errado - ".mysqli_error($conn));
}
else {

    echo"Professor Editado com Sucesso";
}
echo '<br>
        <form method="post" action="editaProfessor.html">
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