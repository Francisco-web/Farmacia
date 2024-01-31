

<?php
include_once '../../conexao.php';
session_start();

if(isset($_GET['ID'])){
   $id = $_GET['ID'];
   $estado_venda="Anulada";
   $sql_verificar="SELECT estado_venda FROM vendas Where factura_no = '$id'";
   $query = mysqli_query($conexao,$sql_verificar);
   $dados= mysqli_fetch_array($query);
   $estado = $dados['estado_venda'];
   if ($estado == "Anulada") {
        $_SESSION['msg'] = "<div class='alert alert-warning' role='alert'> Atenção: Está Venda já foi Anulada!</div>";
        header("location:../sales-detail.php?factura=$id");
    }else {
        
        $sql = "UPDATE vendas SET estado_venda = '$estado_venda' WHERE factura_no = '$id'";

        if (mysqli_query($conexao,$sql)) {
            $_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Venda Anulada!</div>";
            header("location:../sales-detail.php?factura=$id");
        }else{
            $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Venda Não Anulada!</div>";
            header("location:../sales-detail.php?factura=$id");
        }
        
    }
}
?>