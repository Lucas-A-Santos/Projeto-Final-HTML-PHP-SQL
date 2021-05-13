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
if(!$conn){
    die("CONEXÃO FALHOU! - ".mysqli_connect_error());
}
else {
    $codigo = $_POST['idd'];
    $nome1 = $_POST['nomee'];
    $ementa1 = $_POST['ementaa'];
    $horario1 = $_POST['horarioo'];
    $cursoid1 = $_POST['cursoo'];
    $profid1 = $_POST['profesorr'];

    if ($cursoid1<=0 || $cursoid1==""){
        echo"ID de Curso Invalido";
        exit;
    }
    if ($profid1<=0 || $profid1==""){
        echo"ID de Professor Invalido";
        exit;
    }
    $sqlpesquisa1 ="select * from curso where CursoId=$cursoid1";
    $resultado1=@mysqli_query($conn,$sqlpesquisa1);
    $sqlpesquisa2 ="select * from professor where ProfessorId=$profid1";
    $resultado2=@mysqli_query($conn,$sqlpesquisa2);
    if(!$resultado1){
        die("Pesquisa incorreta - ".mysqli_error($conn));
        exit;
    }
    else if(!$resultado2){
        die("Pesquisa incorreta - ".mysqli_error($conn));
        exit;
    }
    else
    {
    $sql_update = 'UPDATE disciplina SET DisciplinaNome="' . $nome1 . '",DisciplinaEmenta="' . $ementa1 . '",CursoId="' . $cursoid1 . '",ProfessorId="' . $profid1 . '",DisciplinaHorario="' . $horario1 . '" WHERE DisciplinaId="' . $codigo . '"';

    $resultado = @mysqli_query($conn, $sql_update);
    if (!$resultado) {
        die("Algo deu Errado - " . mysqli_error($conn));
    } else {

        echo "Disciplina Editada com Sucesso";
    }
}
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
mysqli_close($conn);