<?php
//..conexão com o banco de dados
function conectar(){
    $con = pg_connect("host= localhost port = 5433 dbname= bd_academia user= postgres password=123")
    or die ("Não foi possível conectar no banco de dados: " . pg_last_error());
    return $con;
}