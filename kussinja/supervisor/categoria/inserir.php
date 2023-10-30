



<?php 
include_once '../../conexao.php';
session_start();

if(isset($_POST['add-categoria'])){
$categoria = mysqli_escape_string($conexao,$_POST['categoria']);
$descricao = mysqli_escape_string($conexao,$_POST['descricao']);

    //Verifica os valores dentro das variáveis se são null ou true 
    if(empty($categoria)){
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Digite a Categoria!</div>";
        header("location:../category.php");
        }else {

            //Consulta SQL para Inserir nova Categoria
            $sql = "INSERT INTO categoria VALUES(NULL,?,?)";
            
            /*if(mysqli_query($conexao,$sql)){
                $_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Categoria Adicionada com sucesso!</div>";
                header("location:../category.php");
            }else{
                $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Categoria não Adicionada!</div>";
                header("location:../category.php");
            }*/

            //Preparar consulta
            $consulta= mysqli_prepare($conexao,$sql);
            if ($consulta == false) {
                $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro na Preparação da COnsulta SQL!</div>";
                header("location:../category.php");
            }
            //vincular parametros
            mysqli_stmt_bind_param($consulta, "ss",$categoria,$descricao);

            //executar a Consulta
            if(mysqli_stmt_execute($consulta)){
                $_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Categoria Adicionada com sucesso!</div>";
                header("location:../category.php");
            }else {
                $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Categoria não Adicionada!</div>";
                header("location:../category.php");
            }
    }

}
//Fechar a consulta e conexao
mysqli_stmt_close($consulta);
mysqli_close($conexao);
?>