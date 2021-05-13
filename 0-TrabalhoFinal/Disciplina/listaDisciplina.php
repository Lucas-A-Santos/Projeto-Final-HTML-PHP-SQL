<!DOCTYPE html>
<html lang="pr-BR">
<head>
    <meta charset="UTF-8">
    <title>Listar Disciplinas</title>
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
<h1>Listar Disciplinas</h1>
</header>
<section>
<div>';


$sqlpesquisa ="select * from disciplina order by CursoId";

$resultado=@mysqli_query($conn,$sqlpesquisa);


if(!$resultado){
    die("Pesquisa incorreta - ".mysqli_error($conn));
}
else{
    while( $dados = mysqli_fetch_assoc($resultado))
    {
        echo'<br>Curso ID:'.$dados["CursoId"]
            .'<br>Professor ID:'.$dados["ProfessorId"]
            .'<br>Disciplina ID:'.$dados["DisciplinaId"]
            .'<br>Nome:'.$dados["DisciplinaNome"]
            .'<br>Ementa:'.$dados["DisciplinaEmenta"]
            .'<br>Horario:'.$dados["DisciplinaHorario"]
            .'<br>';
    }
    echo"";
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