<!DOCTYPE html>
<html lang="pr-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Aluno</title>
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
<h1>Editar Aluno</h1>
</header>
<section>
<div>';
if(!$conn){
    die("CONEXÃO FALHOU! - ".mysqli_connect_error());
}
else {
    $codigo = $_POST['idd'];
    $nome1 = $_POST['nomee'];
    $turma1 = $_POST['turmaa'];

    if ($turma1 <= 0 || $turma1 == "") {
        echo "ID de Curso Invalido";
        exit;
    }
    $sqlpesquisa1 = "select * from turma where TurmaId=$turma1";
    $resultado1 = @mysqli_query($conn, $sqlpesquisa1);
    if (!$resultado1) {
        die("Pesquisa incorreta - " . mysqli_error($conn));
        exit;
    } else {

        $sql_update = 'UPDATE aluno SET AlunoNome="' . $nome1 . '",TurmaId="' . $turma1 . '" WHERE AlunoId="' . $codigo . '"';

        $resultado = @mysqli_query($conn, $sql_update);
        if (!$resultado) {
            die("Algo deu Errado - " . mysqli_error($conn));
        } else {

            echo "Aluno Editado com Sucesso";
        }
    }
}
echo '<br>
        <form method="post" action="editaAluno.html">
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