<?php 
include_once '../../conexao.php';
ob_start();
session_start();

if (isset($_POST['alterar_senha'])) {
    
    $id_usuario = $_POST['id'];
    $senha = $_POST['senha'];

    //verificar senha antiga
    $sql_verificar_senha= "SELECT * FROM nivel_acesso where id_nivel_acesso = '$id_usuario' and senha='$senha'";
    $query= mysqli_query($conexao,$sql_verificar_senha);
    if(mysqli_num_rows($query) > 0){
        $_SESSION['msg']="<div class='alert alert-danger' role='alert'> Digitou a senha anterior. Digite Nova senha!</div>";
        header("location:../profile.php");
    }else{
        $sql_alterar_senha="UPDATE nivel_acesso SET senha ='$senha' WHERE id_nivel_acesso = $id_usuario";
        if(mysqli_query($conexao,$sql_alterar_senha)){
            $_SESSION['msg']="<div class='alert alert-success' role='alert'> Senha alterada com Sucesso!</div>"; 
            header("location:../profile.php");
        }else{
            $_SESSION['msg']="<div class='alert alert-danger' role='alert'> Erro: Senha não Alterada!</div>";
            header("location:../profile.php");
        }
    }
}elseif(isset($_POST['alterar_perfil'])){
    $email= $_POST['email'];
    $nome= $_POST['nome'];
    $telefone=$_POST['telefone'];
    $senha=$_POST['senha'];
    $id_nivel_acesso= $_POST['id'];
    //verificar dados
    $sql_verificar_dados= "SELECT * FROM nivel_acesso where id_nivel_acesso != '$id_nivel_acesso' and email = '$email' and senha='$senha'";
    $query= mysqli_query($conexao,$sql_verificar_dados);
    if(mysqli_num_rows($query) > 0){
        $_SESSION['msg']="<div class='alert alert-danger' role='alert'> Este Email já foi cadastrado!</div>";
        header("location:../profile.php");
    }else{
        $sql_alterar_dados="UPDATE nivel_acesso as na join usuarios as us on na.id_usuario= us.id_usuario set na.email = '$email', na.telefone = '$telefone', us.nome_usuario = '$nome' where na.id_nivel_acesso = $id_nivel_acesso";
        if(mysqli_query($conexao,$sql_alterar_dados)){
            $_SESSION['msg']="<div class='alert alert-success' role='alert'> Perfil alterado com Sucesso!</div>"; 
            header("location:../profile.php");
        }else{
            $_SESSION['msg']="<div class='alert alert-danger' role='alert'> Erro: Perfil Não Alterado!</div>";
            header("location:../profile.php");
        }
    }
}
?>