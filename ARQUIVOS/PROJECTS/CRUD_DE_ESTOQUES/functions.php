<?php

function conectaBanco(){

    $host = "localhost";
    $user = "porti668_Admin";
    $senha = "admin@@dmin#2oo5";
    $banco = "porti668_crud_estoque";
    $link = mysqli_connect($host, $user, $senha, $banco);

    return $link;

}

function inseriProduto($CODIGO, $NOME, $UNIDADE, $PRECO_V, $PRECO_C){

    $link = conectaBanco();

    $sql = "INSERT INTO produtos (CODIGO, NOME, UNIDADE, PRECO_V, PRECO_C) VALUES ('$CODIGO', '$NOME', '$UNIDADE', '$PRECO_V', '$PRECO_C')";
    $result = mysqli_query($link, $sql);

    if($result){

        return 1;

    }else{

        return 0;

    }

}

function inseriCompra($SELC, $QUANTIDADE){

    $link = conectaBanco();

    $sql = "INSERT INTO compras (PRODUTO, QUANTIDADE) VALUES ('$SELC', '$QUANTIDADE')";
    $result = mysqli_query($link, $sql);

    if($result){

        return 1;

    }else{

        return 0;

    }

}

function alterProdutoCompra($NOME, $QUANTIDADE){

    $link = conectaBanco();

    $sql1 = "SELECT (p.QUANTIDADE + $QUANTIDADE) TOTAL FROM produtos p INNER JOIN compras c ON p.NOME = c.PRODUTO WHERE PRODUTO = '$NOME'";
    $result1 = mysqli_query($link, $sql1);

    foreach($result1 as $r){
        if($r["TOTAL"] != ""){
            $TOTAL = $r["TOTAL"];
        }
    }

    $sql2 = "UPDATE produtos SET QUANTIDADE = '$TOTAL' WHERE NOME = '$NOME'";
    $result2 = mysqli_query($link, $sql2);

    if($result2){

        return 1;

    }else{

        return 0;

    }

}

function inseriVenda($SELV, $QUANTIDADE){

    $link = conectaBanco();

    $sql = "INSERT INTO vendas (PRODUTO, QUANTIDADE) VALUES ('$SELV', '$QUANTIDADE')";
    $result = mysqli_query($link, $sql);

    if($result){

        return 1;

    }else{

        return 0;

    }

}

function alterProdutoVenda($NOME, $QUANTIDADE){

    $link = conectaBanco();

    $sql1 = "SELECT (p.QUANTIDADE - $QUANTIDADE) TOTAL FROM produtos p INNER JOIN compras c ON p.NOME = c.PRODUTO WHERE PRODUTO = '$NOME'";
    $result1 = mysqli_query($link, $sql1);

    foreach($result1 as $r){
        if($r["TOTAL"] != ""){
            $TOTAL = $r["TOTAL"];
        }
    }

    $sql2 = "UPDATE produtos SET QUANTIDADE = '$TOTAL' WHERE NOME = '$NOME'";
    $result2 = mysqli_query($link, $sql2);

    if($result2){

        return 1;

    }else{

        return 0;

    }

}

function excluiProduto($ID){

    $link = conectaBanco();

    $sql = "SELECT NOME FROM produtos WHERE ID_PRODUTO = '$ID'";
    $result = mysqli_query($link, $sql);

    foreach($result as $r){
        $NOME_PRODUTO = $r["NOME"];
    }

    $sql2 = "DELETE FROM compras WHERE PRODUTO = '$NOME_PRODUTO'";
    $result2 = mysqli_query($link, $sql2);

    $sql3 = "DELETE FROM vendas WHERE PRODUTO = '$NOME_PRODUTO'";
    $result3 = mysqli_query($link, $sql3);

    $sql4 = "DELETE FROM produtos WHERE ID_PRODUTO = '$ID'";
    $result4 = mysqli_query($link, $sql4);

    if($result4){

        return 1;

    }else{

        return 0;

    }

}

function excluiCompra($ID){

    $link = conectaBanco();

    $sql = "SELECT PRODUTO FROM compras WHERE ID_COMPRA = '$ID'";
    $result = mysqli_query($link, $sql);

    foreach($result as $r){
        $NOME_PRODUTO = $r["PRODUTO"];
    }

    $sql2 = "SELECT QUANTIDADE FROM compras WHERE PRODUTO = '$NOME_PRODUTO'";
    $result2 = mysqli_query($link, $sql2);

    foreach($result2 as $r){
        $QUANTIDADE = $r["QUANTIDADE"];
    }

    $sql3 = "UPDATE produtos SET QUANTIDADE = (QUANTIDADE - $QUANTIDADE) WHERE NOME = '$NOME_PRODUTO'";
    $result3 = mysqli_query($link, $sql3);

    $sql4 = "DELETE FROM compras WHERE ID_COMPRA = '$ID'";
    $result4 = mysqli_query($link, $sql4);

    if($result4){

        return 1;

    }else{

        return 0;

    }

}

function excluiVenda($ID){

    $link = conectaBanco();

    $sql = "SELECT PRODUTO FROM vendas WHERE ID_VENDA = '$ID'";
    $result = mysqli_query($link, $sql);

    foreach($result as $r){
        $NOME_PRODUTO = $r["PRODUTO"];
    }

    $sql2 = "SELECT QUANTIDADE FROM vendas WHERE PRODUTO = '$NOME_PRODUTO'";
    $result2 = mysqli_query($link, $sql2);

    foreach($result2 as $r){
        $QUANTIDADE = $r["QUANTIDADE"];
    }

    $sql3 = "UPDATE produtos SET QUANTIDADE = (QUANTIDADE + $QUANTIDADE) WHERE NOME = '$NOME_PRODUTO'";
    $result3 = mysqli_query($link, $sql3);

    $sql4 = "DELETE FROM vendas WHERE ID_VENDA = '$ID'";
    $result4 = mysqli_query($link, $sql4);

    if($result4){

        return 1;

    }else{

        return 0;

    }

}

function selectProdutoAll(){

    $link = conectaBanco();

    $sql = "SELECT * FROM produtos";
    $result = mysqli_query($link, $sql);

    return $result;

}

function selectCompraAll(){

    $link = conectaBanco();

    $sql = "SELECT * FROM compras";
    $result = mysqli_query($link, $sql);

    return $result;

}

function selectVendaAll(){

    $link = conectaBanco();

    $sql = "SELECT * FROM vendas";
    $result = mysqli_query($link, $sql);

    return $result;

}

?>