


<?php
include_once '../../conexao.php';
session_start();

if(isset($_GET['deletar'])&& isset($_GET['id'])){
   $id = $_GET['id'];
   $sql = "DELETE FROM entradas WHERE id_entrada = $id";

   if (mysqli_query($conexao,$sql)) {
    $_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Registro de Entrada Apagado!</div>";
    header("location:../entrada.php");
   }else{
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Registro de Entrada Não Apagado!</div>";
    header("location:../entrada.php");
   }
}
?>