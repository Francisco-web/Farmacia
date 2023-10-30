


<?php
include_once '../../conexao.php';
session_start();

if(isset($_GET['id'])){
   $id = $_GET['id'];
   //Consulta SQL para excluir local de Esoque
   $sql = "DELETE FROM local_estoque WHERE id_local = ?";

   //Preparar a conusulta
   $consulta = mysqli_prepare($conexao,$sql);

   //vincular paramentros
   mysqli_stmt_bind_param($consulta, "i", $id);

   //Executar a COnsulta
   if (mysqli_stmt_execute($consulta)) {
      $_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Local de Remédio Apagado!</div>";
      header("location:../local.php");
   }else{
      $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Local de Remédio Não Apagado!</div>";
      header("location:../local.php");
     }
   /*if (mysqli_query($conexao,$sql)) {
    $_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Local de Remédio Apagado!</div>";
    header("location:../local.php");
   }else{
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Local de Remédio Não Apagado!</div>";
    header("location:../local.php");
   }*/
   mysqli_stmt_bind_param($consulta);
   mysqli_close($conexao);
}
?>