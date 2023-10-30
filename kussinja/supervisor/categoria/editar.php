
<?php
include_once '../../conexao.php';
session_start();

if(isset($_POST['update'])){
  $id = $_POST['id'];
  $categoria = mysqli_escape_string($conexao,$_POST['categoria']);
  $descricao =  mysqli_escape_string($conexao,$_POST['descricao']);

   //Verifica os valores dentro das variáveis se são null ou true 
   if(empty($categoria)){
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Digite a Categoria!</div>";
    header("location:../category.php?id=$id");
    }else {
      //Consulta SQL para alterar dados da Categoria
      $sql = "UPDATE categoria SET categoria = ?, descricao = ? WHERE id_categoria = $id";

      //Preparar a Consulta
      $consulta = mysqli_prepare($conexao,$sql);
      if ($consulta == false) {
        $_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Erro na preparação da consulta!</div>";
        header("location:../category.php?id=$id");
      }

      //vincular os parametros
      mysqli_stmt_bind_param($consulta, "ss",$categoria,$descricao);

      //Executar a consulta
      if (mysqli_stmt_execute($consulta)) {
        $_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Dados da Categoria Alterados Com Sucesso!</div>";
        header("location:../category.php");
      }else{
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Dados da Categoria Não Alterados!</div>";
        header("location:../category.php");
      }

      /*if (mysqli_query($conexao,$sql)) {
        $_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Dados da Categoria Alterados Com Sucesso!</div>";
        header("location:../category.php");
      }else{
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Dados da Categoria Não Alterados!</div>";
        header("location:../category.php");
      }*/
    }
    //Fechar COnsulta e Conexão
    mysqli_stmt_close($consulta);
    mysqli_close($conexao);
}
?>