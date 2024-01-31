

<?php 
include_once '../../conexao.php';
ob_start();
session_start();

//Cancelar Venda, esvazia o carrinho
if (isset($_POST['cancelar_venda'])) {
    //comando sql para eliminar dados da tabela carrinho
    if(mysqli_query($conexao,"DELETE FROM carrinho")){
         $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Lista de Compra Vazio.</div>";
        header("location:../add_carrinho.php");
    }else{
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Falha ao Esvaziar lista de Compra!</div>";
        header("location:../add_carrinho.php");
    }
    
}

if (isset($_POST['add_venda'])) {
    
    $valorPago = mysqli_real_escape_string($conexao,$_POST['valorPago']);
    $grandeTotal = $_POST['grandeTotal'];
    //numero de factura
    $num_aleatório= date('s');
    $factura= "kj".rand(1111,9999).substr($num_aleatório,2);
    
    $id_farmaceutico = 1;
    if(empty($valorPago)){
        $_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>Insira o Valor pago pelo Cliente!</div>";
        header("location:../add_carrinho.php");
    }elseif ($valorPago >= $grandeTotal) {
        
        //Query da tabela carrinho com todos os produtos 
        $sql ="SELECT * FROM carrinho Where id_farmaceutico ='$id_farmaceutico '";
        $query= mysqli_query($conexao,$sql);
        while ($dados_venda=mysqli_fetch_array($query)) {
            $produto=[$dados_venda['id_entrada'] => $dados_venda['qtd_remedio']];
            
            foreach ($produto as $id_carrinho => $qtd_carrinho) {

                $sql_entrada = mysqli_query($conexao,"SELECT * FROM entradas WHERE id_entrada = $id_carrinho");
                $dados_entrada = mysqli_fetch_array($sql_entrada);
                $produto_entrada =[$dados_entrada['id_entrada'] => $dados_entrada['qtd_movida']];

                foreach ($produto_entrada as $id_entrada => $qtd_entrada) {
                    if (mysqli_query($conexao,"UPDATE entradas SET qtd_movida=$qtd_entrada-$qtd_carrinho WHERE id_entrada = $id_entrada")) {
                        
                        //Sql inserir na tabela venda, realizar venda
                        $preco_entrada=$dados_entrada['preco_venda'];
                        $total=$qtd_carrinho*$preco_entrada;
                        if(mysqli_query($conexao,"INSERT INTO `vendas` (`id_venda`, `id_entrada`,           `id_nivel_acesso`, `preco`, `qtd`, `total`,`valorPago`, `factura_no`, `via_pagamento`, `estado_venda`, `data_venda`) VALUES (NULL, '$id_entrada', '$id_farmaceutico','$preco_entrada', '$qtd_carrinho', '$total', '$valorPago', '$factura', 'Dinheiro', 'Completo', now())")){
                            $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Venda Feita com Sucesso.</div>";
                            header("location:../add_carrinho.php");
                        }else {
                            $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Falha a Realizar Venda!</div>";
                            header("location:../add_carrinho.php");
                        }

                        //consultar Quantidade actual
                        $sql_qtd_entrada=mysqli_query($conexao,"SELECT qtd_movida FROM entradas WHERE id_entrada = $id_carrinho");
                        $fetch_qtd = mysqli_fetch_array($sql_qtd_entrada);
                        $qtd_actual = $fetch_qtd['qtd_movida'];
                        //Verificar se quantiade actual é igual a 0 para mudar o estado do produto
                        if ($qtd_actual == 0) {
                            mysqli_query($conexao,"UPDATE entradas SET estado_entrada = 'Inactivo' WHERE id_entrada = $id_entrada");
                        }
                        //Eliminar dados do carrinho que já foi adicnado na tabela venda
                        $apagar = mysqli_query($conexao,"DELETE FROM carrinho WHERE id_entrada = $id_entrada");
                        header("location:../add_carrinho.php");
                    }
                    
                }
            }
        }
    }else {
        $_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>Valor a pagar é insuficiente! A conta é $grandeTotal Kz</div>";
        header("location:../add_carrinho.php");
    }
}   
?>