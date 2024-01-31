
<?php
include_once '../../conexao.php';
ob_start();
session_start();

if(isset($_GET['id'])){
   $id = $_GET['id'];
   $sql = "DELETE FROM carrinho WHERE id_carrinho = $id";

   if (mysqli_query($conexao,$sql)) {
    $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Remédio Removido da Lista!</div>";
    header("location:../add_carrinho.php");
   }else{
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Remédio Não Removido!</div>";
    header("location:../add_carrinho.php");
   }
}
?>