<!DOCTYPE html>
<html lang="pr-BR">
<head>
    <meta charset="UTF-8">
    <title>Busca de ALUNO</title>
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
<h1>Busca de aLUNO</h1>
</header>
<section>
<div>';

$codigo = $_POST["id"];

if($codigo=="")
{
    echo"INVALIDO";
    exit;

}

$sqlpesquisa ="select * from aluno where AlunoId=$codigo";

$resultado=@mysqli_query($conn,$sqlpesquisa);


if(!$resultado){
    die("Pesquisa incorreta - ".mysqli_error($conn));
}
else{
    $dados = mysqli_fetch_array($resultado);
    echo"
    Nome: ".$dados['AlunoNome']."<br>
    Curso: ".$dados['TurmaId']."<br>
    ALUNO CONSULTADO COM SUCESSO
    ";
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
