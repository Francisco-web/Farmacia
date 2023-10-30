<?php 
include_once '../../conexao.php';
session_start();

if(isset($_POST['add'])){
$local = mysqli_escape_string($conexao,$_POST['local_remedio']);
$descricao = mysqli_escape_string($conexao,$_POST['descricao']);

    if(empty($local)){
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Digite o Local do Remédio!</div>";
        header("location:../local.php");
    }else {

        //Consulta SQL para Inserir Local
        $sql = "INSERT INTO local_estoque(id_local,nome_local,descricao)
                VALUES(NULL,?,?)";
        //Prepara a COnsulta
        $consulta = mysqli_prepare($conexao,$sql);
        if ($consulta == false) {
            $_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Erro na preparação da consulta!</div>";
            header("location:../local.php");
        }

        //vincular os paramentos
        mysqli_stmt_bind_param($consulta, "ss",$local,$descricao);

        //Executar a Consulta
        if (mysqli_stmt_execute($consulta)) {
            $_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Local de Remédio Adicionado com Sucesso!</div>";
            header("location:../local.php");
        }else{
            $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Local de Remédio não Adicionado!</div>";
            header("location:../local.php");
        }

        /*if(mysqli_query($conexao,$sql)){
            $_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Local de Remédio Adicionado com Sucesso!</div>";
            header("location:../local.php");
        }else{
            $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Local de Remédio não Adicionado!</div>";
            header("location:../local.php");
        }*/
    }
        mysqli_stmt_close($consulta);
        mysqli_close($conexao);
}
?>