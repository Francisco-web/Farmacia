



<?php 
include_once '../../conexao.php';
session_start();

if(isset($_POST['add'])){
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

        $sql = "INSERT INTO fornecedores (id_fornecedor,nome_fornecedor,email,telefone,endereco,descricao)VALUES(NULL,'$nome','$email','$telefone','$endereco','$remedios')";
        if(mysqli_query($conexao,$sql)){
            $_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Fornecedor Adicionado!</div>";
            header("location:../supplier.php");
        }else{
            $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Fornecedor não Adicionado!</div>";
            header("location:../supplier.php");
        }
    }

}
mysqli_close($conexao);
?>