<!DOCTYPE html>
<html lang="pr-BR">
<head>
    <meta charset="UTF-8">
    <title>Listar Alunos</title>
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
<h1>Listar Alunos</h1>
</header>
<section>
<div>';


$sqlpesquisa ="select * from aluno ORDER by TurmaId";

$resultado=@mysqli_query($conn,$sqlpesquisa);


if(!$resultado){
    die("Pesquisa incorreta - ".mysqli_error($conn));
}
else{
    while( $dados = mysqli_fetch_assoc($resultado))
    {
        echo'<br>Turma ID:'.$dados["TurmaId"]
            .'<br>Aluno ID:'.$dados["AlunoId"]
            .'<br>Nome:'.$dados["AlunoNome"]
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