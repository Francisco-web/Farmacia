


<?php
include_once '../../conexao.php';
session_start();

if(isset($_GET['id'])){
   $id = $_GET['id'];

   //COnsulta SQL para Excluir Categoria
   $sql = "DELETE FROM categoria WHERE id_categoria = ?";

   //Preparar a Consulta
   $consulta = mysqli_prepare($conexao,$sql);
   if ($consulta == false) {
      $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro na preparação da consulta!</div>";
      header("location:../category.php");
   }

   //Vincular os parametros
   mysqli_stmt_bind_param($consulta, "i", $id);

   //Executar a Consulta
   if (mysqli_stmt_execute($consulta)) {
      $_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Categoria Apagada!</div>";
      header("location:../category.php");
   }else{
      $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Categoria Não Apagada!</div>";
      header("location:../category.php");
     }

   /*if (mysqli_query($conexao,$sql)) {
    $_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Categoria Apagada!</div>";
    header("location:../category.php");
   }else{
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Categoria Não Apagada!</div>";
    header("location:../category.php");
   }*/
   
   //fechar Consulta e Conexao
   mysqli_stmt_close($consulta);
   mysqli_close($conexao);
}
?>