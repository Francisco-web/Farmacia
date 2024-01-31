
<?php
include_once '../../conexao.php';
session_start();

if(isset($_POST['actualizar'])){
  $id = $_POST['carrinho_id'];
  $qtd_remedio = $_POST['qtd_remedio'];

  $sql = "UPDATE carrinho SET qtd_remedio = '$qtd_remedio' WHERE id_carrinho = $id";

    if (mysqli_query($conexao,$sql)) {
        $_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Quantidade Actualizada.</div>";
        header("location:../add_carrinho.php");
    }else{
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Quantidade Não Actualizada!</div>";
        header("location:../add_carrinho.php");
    }
}
?>