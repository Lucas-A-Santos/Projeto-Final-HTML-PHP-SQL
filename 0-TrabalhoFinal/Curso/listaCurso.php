<!DOCTYPE html>
<html lang="pr-BR">
<head>
    <meta charset="UTF-8">
    <title>Listar Cursos</title>
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
<h1>Listar Cursos</h1>
</header>
<section>
<div>';


$sqlpesquisa ="select * from curso";

$resultado=@mysqli_query($conn,$sqlpesquisa);


if(!$resultado){
    die("Pesquisa incorreta - ".mysqli_error($conn));
}
else{
    while( $dados = mysqli_fetch_assoc($resultado))
    {
        echo'<br>ID:'.$dados["CursoId"]
            .'<br>Nome:'.$dados["CursoNome"]
            .'<br>Periodo:'.$dados["CursoPeriodo"]
            .'<br>Descrição:'.$dados["CursoDescricao"]
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