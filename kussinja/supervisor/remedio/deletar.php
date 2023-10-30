


<?php
include_once '../../conexao.php';
session_start();

if(isset($_GET['id'])){
   $id = $_GET['id'];
   $sql = "DELETE FROM remedios WHERE id_remedio = $id";

   if (mysqli_query($conexao,$sql)) {
    $_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Remédio Apagado!</div>";
    header("location:../medicine.php");
   }else{
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Remédio Não Apagado!</div>";
    header("location:../medicine.php");
   }
}
?>