<?php

include("functions.php");

if(isset($_REQUEST["PNome"]) && isset($_REQUEST["PCod"]) && isset($_REQUEST["PUnidade"]) && isset($_REQUEST["PPrecoC"]) && isset($_REQUEST["PPrecoV"]))
{

    $NOME = $_REQUEST["PNome"];
    $COD = $_REQUEST["PCod"];
    $UNIDADE = $_REQUEST["PUnidade"];
    $PRECO_C = $_REQUEST["PPrecoC"];
    $PRECO_V = $_REQUEST["PPrecoV"];

    if ($NOME == "" || $COD == "" || $UNIDADE == "" || $PRECO_C == "" || $PRECO_V == "" ){

        header("location: ?");

    }else{

        inseriProduto($COD, $NOME, $UNIDADE, $PRECO_C, $PRECO_V);

        header("location: ?");

    }

}

if(isset($_REQUEST["SelC"]) && isset($_REQUEST["CQuantidade"]))
{

    $SELC = $_REQUEST["SelC"];
    $QUANTIDADE = $_REQUEST["CQuantidade"];

    if ($SELC == "" || $QUANTIDADE == ""){

        header("location: ?action=C");

    }else{

        inseriCompra($SELC, $QUANTIDADE);

        alterProdutoCompra($SELC, $QUANTIDADE);

        header("location: ?action=C");

    }

}

if(isset($_REQUEST["SelV"]) && isset($_REQUEST["VQuantidade"]))
{

    $SELV = $_REQUEST["SelV"];
    $QUANTIDADE = $_REQUEST["VQuantidade"];

    if ($SELV == "" || $QUANTIDADE == ""){

        header("location: ?action=V");

    }else{

        inseriVenda($SELV, $QUANTIDADE);

        alterProdutoVenda($SELV, $QUANTIDADE);

        header("location: ?action=V");

    }

}

if(isset($_REQUEST["Pex"])){

    excluiProduto($_REQUEST["Pex"]);

    header("location: ?");

}

if(isset($_REQUEST["Cex"])){

    excluiCompra($_REQUEST["Cex"]);

    header("location: ?action=C");

}

if(isset($_REQUEST["Vex"])){

    excluiVenda($_REQUEST["Vex"]);

    header("location: ?action=V");

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Estoque</title>

    <link rel="stylesheet" href="styles2.css">

</head>
<body>

    <main class="main">

        <div class="main__div">

            <?php
                    
            if(!isset($_REQUEST["action"])){

            ?>

            <form action="" method="post" class="main__div__form">

                <fieldset class="main__div__form__filedset">

                    <legend>Cadastro de Produto</legend>
                        
                    <label for='' class='main__div__form__filedset__label'>Nome do Produto</label>
                    <input type='text' name='PNome' id='PNome' class='main__div__form__filedset__input'>
        
                    <label for='' class='main__div__form__filedset__label'>Código do Produto</label>
                    <input type='text' name='PCod' id='PCod' class='main__div__form__filedset__input'>
        
                    <label for='' class='main__div__form__filedset__label'>Unidade do Produto</label>
                    <input type='text' name='PUnidade' id='PUnidade' class='main__div__form__filedset__input'>
        
                    <label for='' class='main__div__form__filedset__label'>Preço de Compra da Unidade</label>
                    <input type='text' name='PPrecoC' id='PPrecoC' class='main__div__form__filedset__input'>
        
                    <label for='' class='main__div__form__filedset__label'>Preço de Venda da Unidade</label>
                    <input type='text' name='PPrecoV' id='PPrecoV' class='main__div__form__filedset__input'>
        
                    <input type='submit' value='Cadastrar' class='main__div__form__filedset__input'>

                    <div class="main__div__form__filedset__div">

                        <a href='?action=C' class="main__div__form__filedset__div__a">Cadastrar Compra</a>

                        <a href='?action=V' class="main__div__form__filedset__div__a">Cadastrar Venda</a>

                    </div>
                       
            <?php

            }else if(isset($_REQUEST["action"]) && $_REQUEST["action"] == "C"){
                
            ?>

            <form action="?action=C" method="post" class="main__div__form">

                <fieldset class="main__div__form__filedset">

                    <legend>Cadastro de Compra</legend>
                            
                    <label for='' class='main__div__form__filedset__label'>Produto</label>
                    <select name="SelC" id="SelC" class="main__div__form__filedset__select">
                                
                        <?php
                                
                        foreach(selectProdutoAll() as $s){

                            $NOME = $s["NOME"];

                            echo "<option value='$NOME'>$NOME</option>";

                        }
                                
                        ?>

                    </select>

                    <label for='' class='main__div__form__filedset__label'>Quantidade</label>
                    <input type='text' name='CQuantidade' id='CQuantidade' class='main__div__form__filedset__input'>

                    <input type='submit' value='Cadastrar' class='main__div__form__filedset__input'>

                    <div class="main__div__form__filedset__div">

                        <a href='?' class="main__div__form__filedset__div__a">Cadastrar Produto</a>

                        <a href='?action=V' class="main__div__form__filedset__div__a">Cadastrar Venda</a>

                    </div>
                    
            <?php

            }else if(isset($_REQUEST["action"]) && $_REQUEST["action"] == "V"){

            ?>

            <form action="?action=V" method="post" class="main__div__form">

                <fieldset class="main__div__form__filedset">

                    <legend>Cadastro de Venda</legend>
                            
                    <label for='' class='main__div__form__filedset__label'>Produto</label>
                    <select name="SelV" id="SelV" class="main__div__form__filedset__select">
                                
                        <?php
                                
                        foreach(selectProdutoAll() as $s){

                            $NOME = $s["NOME"];

                            echo "<option value='$NOME'>$NOME</option>";

                        }
                                
                        ?>

                    </select>

                    <label for='' class='main__div__form__filedset__label'>Quantidade</label>
                    <input type='text' name='VQuantidade' id='VQuantidade' class='main__div__form__filedset__input'>

                    <input type='submit' value='Cadastrar' class='main__div__form__filedset__input'>

                    <div class="main__div__form__filedset__div">

                        <a href='?' class="main__div__form__filedset__div__a">Cadastrar Produto</a>

                        <a href='?action=C' class="main__div__form__filedset__div__a">Cadastrar Compra</a>

                    </div>

            <?php

            }
            
            ?>

                </fieldset>

            </form>

        </div>

        <div class="main__div__div">

            <table class="main__div__div__table">

                <thead class="main__div__div__table__thead">

                    <?php
                        
                    if(!isset($_REQUEST["action"])){

                    ?>

                    <th class="main__div__div__table__thead__th">ID do Produto</th>
                    <th class="main__div__div__table__thead__th">Código do Produto</th>
                    <th class="main__div__div__table__thead__th">Nome</th>
                    <th class="main__div__div__table__thead__th">Unidade do Produto</th>
                    <th class="main__div__div__table__thead__th">Quantidade</th>
                    <th class="main__div__div__table__thead__th">Preço de Compra da Unidade</th>
                    <th class="main__div__div__table__thead__th">Preço de Venda da Unidade</th>

                    <?php
                        
                    }else if(isset($_REQUEST["action"]) && $_REQUEST["action"] == "C"){
                        
                    ?>

                    <th class="main__div__div__table__thead__th">ID da Compra</th>
                    <th class="main__div__div__table__thead__th">ID do Produto</th>
                    <th class="main__div__div__table__thead__th">Quantidade</th>
                    <th class="main__div__div__table__thead__th">Total da Compra</th>

                    <?php
                        
                    }else if(isset($_REQUEST["action"]) && $_REQUEST["action"] == "V"){
                        
                    ?>

                    <th class="main__div__div__table__thead__th">ID da Venda</th>
                    <th class="main__div__div__table__thead__th">ID do Produto</th>
                    <th class="main__div__div__table__thead__th">Quantidade</th>
                    <th class="main__div__div__table__thead__th">Total da Venda</th>

                    <?php
                        
                    }
                        
                    ?>

                </thead>

                <tbody>

                    <?php
                        
                    if(!isset($_REQUEST["action"])){

                        foreach(selectProdutoAll() as $s){

                            $ID_PRODUTO = $s["ID_PRODUTO"];
                            $CODIGO = $s["CODIGO"];
                            $NOME = $s["NOME"];
                            $UNIDADE = $s["UNIDADE"];
                            $QUANTIDADE = $s["QUANTIDADE"];
                            $PRECO_C = $s["PRECO_C"];
                            $PRECO_V = $s["PRECO_V"];
        
                            echo "<tr> <td> $ID_PRODUTO </td> <td> $CODIGO </td> <td> $NOME </td> <td> $UNIDADE </td> <td> $QUANTIDADE </td> <td> $PRECO_C </td> <td> $PRECO_V </td> <td> <a href='?Pex=$ID_PRODUTO'> Excluir </a> </td> </tr>";
        
                        }
                        
                    }else if(isset($_REQUEST["action"]) && $_REQUEST["action"] == "C"){
                        
                        foreach(selectCompraAll() as $s){

                            $ID_COMPRA = $s["ID_COMPRA"];
                            $ID_PRODUTO = $s["PRODUTO"];
                            $QUANTIDADE = $s["QUANTIDADE"];
                            $TOTAL_COMPRA = $s["TOTAL_COMPRA"];
        
                            echo "<tr> <td> $ID_COMPRA </td> <td> $ID_PRODUTO </td> <td> $QUANTIDADE </td> <td> $TOTAL_COMPRA </td> <td> <a href='?action=C&Cex=$ID_COMPRA'> Excluir </a> </td> </tr>";
        
                        }
                        
                    }else if(isset($_REQUEST["action"]) && $_REQUEST["action"] == "V"){
                        
                        foreach(selectVendaAll() as $s){

                            $ID_VENDA = $s["ID_VENDA"];
                            $ID_PRODUTO = $s["PRODUTO"];
                            $QUANTIDADE = $s["QUANTIDADE"];
                            $TOTAL_VENDA = $s["TOTAL_VENDA"];
        
                            echo "<tr> <td> $ID_VENDA </td> <td> $ID_PRODUTO </td> <td> $QUANTIDADE </td> <td> $TOTAL_VENDA </td> <td> <a href='?action=V&Vex=$ID_VENDA'> Excluir </a> </td> </tr>";
        
                        }
                        
                    }
                        
                    ?>

                </tbody>

            </table>

        </div>

    </main>
    
</body>
</html>