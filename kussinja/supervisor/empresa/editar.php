
<?php
include_once '../../conexao.php';
session_start();

if(isset($_POST['update'])){
  $id = $_POST['id'];
  $categoria = mysqli_escape_string($conexao,$_POST['categoria']);
  $descricao =  mysqli_escape_string($conexao,$_POST['descricao']);

  $sql = "UPDATE categorias SET nome = '$categoria', descricao = '$descricao' WHERE id = $id";

  if (mysqli_query($conexao,$sql)) {
   $_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Dados da Categoria Alterados Com Sucesso!</div>";
   header("location:../category.php");
  }else{
   $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Dados da Categoria Não Alterados!</div>";
   header("location:../category.php");
  }
}
?>