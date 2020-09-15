<?php

//..pega cabeçalho que já está pronto
require_once('../base/header.php');

//..banco de dados
require_once('../bd/academia_bd.php');

$id=null; $exercicio = null;$peso = null;$dia = null;$repeticoes = null;
if($_GET){
    $idBusca = $_GET['id'];
    $dados = recuperarPorId($idBusca);
    if($dados){
        $id = $dados['id'];
        $exercicio= $dados['nome_exercicio'];
        $peso = $dados['peso'];
        $dia = $dados['dia'];
        $repeticoes = $dados['repeticoes'];
    }
}

?>

<h2>Cadastro de Exercicios</h2>

<form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">

<input type="hidden" name="id" id="id" value="<?=$id?>">
<label for="">Nome</label>
<br>
<input type="text" name="exercicio" id="exercicio" required value="<?=$exercicio?>">
<br>
<label for="">Peso</label>
<br>
<input type="text" name="peso" id="peso" required value="<?=$peso?>">
<br>
<label for="">Dia do Exercício</label>
<br>
<input type="text" name="dia" id="dia" required value="<?=$dia?>">
<br>
<label for="">Repetições</label>
<br>
<input type="text" name="repeticoes" id="repeticoes" required value="<?=$repeticoes?>">
<br>
<input type="reset" name="comando" value="Novo">
<input type="submit" name="comando" value="Salvar">
<input type="submit" name="comando" value="Excluir">

</form>


<?php
//rodapé
require_once('../base/footer.php');

if($_POST){  
  
    $comando = strtolower($_POST['comando']);
    switch ($comando){
        case 'salvar':            
            $result = persistir($_POST['id'],$_POST['exercicio'],$_POST['peso'],$_POST['dia'],$_POST['repeticoes']);            
            echo "<script>alert('Genero atualizado/cadastrado com sucesso!')</script>";
            break;
        case 'excluir':
            $result = excluir($_POST['id']);
            echo "<script>alert(\"Gênero excluído com sucesso!\")</script>";
            break;
        default:
            break;
    }

}


?>


