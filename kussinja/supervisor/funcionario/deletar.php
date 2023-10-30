


<?php
include_once '../../conexao.php';
session_start();

if(isset($_GET['id'])){
   $id = $_GET['id'];
   
   $delF = mysqli_query($conexao,"DELETE FROM funcionarios WHERE id = $id");
   
   $delU = "DELETE FROM usuarios WHERE id = $id";
   
   if (mysqli_query($conexao,$delU)) {
    $_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Funcionário Apagado!</div>";
    header("location:../cashier.php");
   }else{
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Funcionário Não Apagado!</div>";
    header("location:../cashier.php");
   }
}
mysqli_close($conexao);
?>