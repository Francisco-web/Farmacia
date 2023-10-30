
<?php
include_once '../../conexao.php';
session_start();

if(isset($_POST['update'])){
  $id = $_POST['id'];
  $nome = mysqli_escape_string($conexao,$_POST['nome']);
  $email = mysqli_escape_string($conexao,$_POST['email']);
  $telefone = mysqli_escape_string($conexao,$_POST['telefone']);
  $endereco = mysqli_escape_string($conexao,$_POST['endereco']);
  $remedios = mysqli_escape_string($conexao,$_POST['remedios']);

  if(empty($nome)){
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Digite o nome do Fornecedor!</div>";
    header("location:../supplier.php");
    }elseif(empty($email)){
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Digite o email!</div>";
    header("location:../supplier.php");
    }elseif(empty($telefone)){
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Digite o Número de telefone!</div>";
    header("location:../supplier.php");
    }elseif(empty($endereco)){
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Digite o Endereço!</div>";
        header("location:../supplier.php");
    }elseif(empty($remedios)){
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Digite o(os) Remedios Fornecidos!</div>";
        header("location:../supplier.php");
    }else {

    $sql = "UPDATE fornecedores SET nome_fornecedor = '$nome',email = '$email',telefone = '$telefone',endereco ='$endereco',descricao = '$remedios' WHERE id_fornecedor = $id";

    if (mysqli_query($conexao,$sql)) {
    $_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Dados do Fornecedor Alterados !</div>";
    header("location:../supplier.php");
    }else{
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Dados do Fornecedor Não Alterados!</div>";
    header("location:../supplier.php");
    }
  }
}
?>