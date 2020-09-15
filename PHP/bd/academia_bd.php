<?php
//..faz a requisição ao arquivo conexao.php
require_once('conexao.php');


/*função para gravar/atualizar um registro no banco de dados
  A função possui dois parâmetros de entrada: o id e o nome
  se o id for deixando em branco, a função insere um novo registro;
  se o id for preenchido, a função atualiza um registro já existente.
*/
function persistir($id,$exercicio,$peso,$dia,$repeticoes) 
{
    $sql = null; //..declara a variável $sql
    if (!$id) { //..se não tiver id, então insere
        $sql = "insert into academia (nome_exercicio,peso,dia,repeticoes) values ('$exercicio','$peso','$dia',$repeticoes)";
    } else { //..se tiver, então atualiza
        $sql = "update academia set nome_exercicio = '$exercicio', peso = '$peso', dia = '$dia', repeticoes = $repeticoes where id = {$id} ";
    }
    $con = conectar(); //..conecta ao banco de dados
    $result = pg_query($con, $sql); //..executa a instrução sql e pega o retorno em $result
    pg_close($con); //.fecha a conexão
    return $result; //..retorna o $result
}

/**
 * Função para excluir - mediante um id informado por parâmetro
*/
function excluir($id)
{
    $sql = "delete from academia where id = {$id}";
    $con = conectar();
    $result = pg_query($sql);
    pg_close($con);
    return $result;
}

/**
 * recupera um registro mediante um id informado
 */
function recuperarPorId($id)
{
    $sql = "select * from academia where id = {$id}"; //..sql de consulta
    $con = conectar(); //..conecta ao banco
    $result = pg_query($con, $sql); //..pega o resultado em $result
    pg_close($con); //.fecha a conexão
    if (pg_num_rows($result) > 0) { //..se tiver mais de uma linha então recupera os registros
        $registro = pg_fetch_all($result);
        return $registro[0]; //..pega somente o primeiro registro retornado. 
    } else {
        return null; //..senão, retorna null
    }
}

/**
 * Lista os dados cadastrados no banco de dados
 * parâmetros de entrada: nome e ordem (para ordenar a listagem)
 */
function listar($exercicio = '', $ordem = 'nome_exercicio')
{
    //..sql para consulta
    $sql = "select * from academia where upper(nome_exercicio) like upper('$exercicio%') order by $ordem";
    //..conecta no bd
    $con = conectar();
    //..executa a consulta
    $result = pg_query($con, $sql);
    pg_close($con); //fecha a conexão
    if (pg_num_rows($result) > 0) { //..se tiver resultado, então retorna todos os registros
        $registros = pg_fetch_all($result);
        return $registros;
    } else {
        return null; //..senão retorna null
    }
}








