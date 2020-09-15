<?php
//..cabeçalho
require_once('../base/header.php');
?>

<h2>Listar Exercícios</h2>
<!-- esse tal de PHP_SELF signfica que o form envia os dados para ele mesmo -->
<form method="post" action="<?=$_SERVER['PHP_SELF']?>">

    <label for="nome">Exercicio:</label>
    <input type="text" name="exercicio" id="exercicio">
    <br>
    <input type="submit" name="comando" value="Listar">
</form>

<table border="1">
    <tr>
        <th>Exercicio</th><th>Editar/Excluir</th>
    </tr>
    <?php
        gerarLista();
    ?>
</table>


<?php
require_once('../base/footer.php'); //..mostra o rodapé.


function gerarLista(){
    if($_POST){
        //..pega o arquivo de bd
        require_once("../bd/academia_bd.php");
        //..pega a variável nome do formulário (post)
        $exercicio = $_POST['exercicio'];
        $academias = listar($exercicio); //..usa a função listar e armazena os nomes recuperados em $generos
        if($academias){ //..se encontrou alguma coisa, então...
            foreach($academias as $academia){ //..percorre ou itera a lista construindo as linhas e células da tabela
                echo "<tr>";
                echo "<td>{$academia['nome_exercicio']}</td>";
                echo "<td><a href=\"academia_cadastro.php?id={$academia['id']}\">OK</a></td>"; //..cria um link para o formulário de edição/exclusão
                echo "</tr>";
            }
        }
    }
}

?>