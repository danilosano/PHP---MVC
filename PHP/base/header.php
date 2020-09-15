<?php
//..define uma constante global para fazer os links corretamente, obverve os links do menu a partir da linha 19.
DEFINE("ROOT_PATH",  "/DaniGoD/" );
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projeto</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
    <div id="conteiner">
        <header>
            <h1>Cadastro de exercícios</h1>
        </header>
        <nav id="menu">
            <ul>
                <li><a href="<?=ROOT_PATH . '/index.php'?>">Início</a></li>
                <li>Cadastros:
                    <ul>
                        <li><a href="<?=ROOT_PATH . 'view/academia_cadastro.php'?>">Exercício</a></li>                        
                    </ul>
                </li>
                <li>Consultar
                    <ul>
                        <li><a href="<?=ROOT_PATH . 'view/academia_listar.php'?>">Exercício</a></li>                        
                    </ul>
                </li>
            </ul>
        </nav>
        <div>
        
       