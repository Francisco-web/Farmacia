


<?php
include_once '../../conexao.php';
session_start();

if(isset($_GET['id'])){
   $id = $_GET['id'];
   $sql = "DELETE FROM fornecedores WHERE id_fornecedor = $id";

   if (mysqli_query($conexao,$sql)) {
    $_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Dados do Fornecedor Apagados!</div>";
    header("location:../supplier.php");
   }else{
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Dados do Fronecedor Não Apagado!</div>";
    header("location:../supplier.php");
   }
}
?>