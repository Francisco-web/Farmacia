
<?php
include_once '../../conexao.php';
session_start();

if(isset($_POST['update'])){
  $id = $_POST['id'];
  $nome = mysqli_escape_string($conexao,$_POST['nome']);
  $bi = mysqli_escape_string($conexao,$_POST['bi']);
  $genero = mysqli_escape_string($conexao,$_POST['genero']);
  $telefone = mysqli_escape_string($conexao,$_POST['telefone']);
  $email = mysqli_escape_string($conexao,$_POST['email']);
  $idcargo = mysqli_escape_string($conexao,$_POST['idcargo']);
  if(empty($nome)){
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Digite o nome!</div>";
    header("location:../add-category.php");
  }elseif(empty($bi)){
      $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Insira o Número do B.I!</div>";
      header("location:../add-category.php");
  }elseif(empty($genero)){
      $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Seleciona o Gênero!</div>";
      header("location:../add-category.php");
  }elseif(empty($telefone)){
      $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Insira o Número de Telefone!</div>";
      header("location:../add-category.php");
  }elseif(empty($email)){
      $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Digite o Endereço de Email!</div>";
      header("location:../add-category.php");
  }elseif(empty($idcargo)){
      $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Seleciona o Cargo!</div>";
      header("location:../add-category.php");
  }else {
    
  $sql = "UPDATE categorias SET nome= '$nome',bi= '$bi',genero= '$genero',telefone= '$telefone',email= '$email',idcargo= '$idcargo' WHERE id = $id";

  if (mysqli_query($conexao,$sql)) {
   $_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Dados do Funcionário Alterados!</div>";
   header("location:../cashier.php");
  }else{
   $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Dados do Funcionário Não Alterados!</div>";
   header("location:../cashier.php");
  }
}
?>