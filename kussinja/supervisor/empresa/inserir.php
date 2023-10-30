



<?php 
include_once '../../conexao.php';
session_start();

if(isset($_POST['add-categoria'])){
$categoria = mysqli_escape_string($conexao,$_POST['categoria']);
$descricao = mysqli_escape_string($conexao,$_POST['descricao']);

    if(empty($categoria)){
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Digite a Categoria!</div>";
        header("location:../add-category.php");
        }else {
            $sql = "INSERT INTO categorias (id,nome,descricao)VALUES(NULL,'$categoria','$descricao')";
            if(mysqli_query($conexao,$sql)){
                $_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Categoria Adicionada com sucesso!</div>";
                header("location:../add-category.php");
            }else{
                $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Categoria não Adicionada!</div>";
                header("location:../add-category.php");
            }
    }

}
mysqli_close($conexao);
?>