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
if(!$conn){
    die("CONEXÃO FALHOU! - ".mysqli_connect_error());
}
else {
    $codigo = $_POST['idd'];
    $desc1 = $_POST['descc'];
    $curso1 = $_POST['cursoo'];

    if ($curso1 <= 0 || $curso1 == "") {
        echo "ID de Curso Invalido";
        exit;
    }
    $sqlpesquisa1 = "select * from curso where CursoId=$curso1";
    $resultado1 = @mysqli_query($conn, $sqlpesquisa1);
    if (!$resultado1) {
        die("Pesquisa incorreta - " . mysqli_error($conn));
        exit;
    } else {

        $sql_update = 'UPDATE turma SET TurmaDescricao="' . $desc1 . '",CursoId="' . $curso1 . '" WHERE TurmaId="' . $codigo . '"';

        $resultado = @mysqli_query($conn, $sql_update);
        if (!$resultado) {
            die("Algo deu Errado - " . mysqli_error($conn));
        } else {

            echo "Curso Editado com Sucesso";
        }
    }
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
mysqli_close($conn);