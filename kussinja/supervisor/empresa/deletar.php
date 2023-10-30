


<?php
include_once '../../conexao.php';
session_start();

if(isset($_GET['id'])){
   $id = $_GET['id'];
   $sql = "DELETE FROM categorias WHERE id = $id";

   if (mysqli_query($conexao,$sql)) {
    $_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Categoria Apagada!</div>";
    header("location:../category.php");
   }else{
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Categoria Não Apagada!</div>";
    header("location:../category.php");
   }
}
?>