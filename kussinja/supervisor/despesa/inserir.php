



<?php 
include_once '../../conexao.php';
session_start();

if(isset($_POST['add_despesa'])){
$data_despesa = mysqli_escape_string($conexao,$_POST['data_despesa']);
$despesa = mysqli_escape_string($conexao,$_POST['despesa']);
$estado_despesa = mysqli_escape_string($conexao,$_POST['estado_despesa']);
$valor_despesa = mysqli_escape_string($conexao,$_POST['valor_despesa']);
$id_nivel_acesso = 1;

//Verifica se as variaveis estão vazias ou não
    if(empty($data_despesa)){
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Atenção: Insira a Data da Despesa!</div>";
        header("location:../despesas.php");
    }elseif(empty($despesa)){
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Atenção: Descreve a Despesa!</div>";
        header("location:../despesas.php");
    }elseif(empty($estado_despesa)){
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Atenção: Seleciona o Estado da Despesa!</div>";
        header("location:../despesas.php");
    }elseif(empty($valor_despesa)){
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Atenção: Insira o valor da Despesa!</div>";
        header("location:../despesas.php");
    }else {

        //Consulta SQL para inserir despesa 
        $sql = "INSERT INTO despesas (id_despesa,data_despesa,despesa,estado_despesa,valor_despesa,id_nivel_acesso)
                VALUES(NULL,?,?,?,?,?)";
        
        //Preparar a consulta
        $consulta = mysqli_prepare($conexao,$sql);

        //Vincular paramentros
        mysqli_stmt_bind_param($consulta, "sssii",$data_despesa,$despesa,$estado_despesa,$valor_despesa,$id_nivel_acesso);
        
        //Executa a consulta
        if (mysqli_stmt_execute($consulta)) {
            $_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Despesa Registrada com Sucesso!</div>";
            header("location:../despesas.php");
        }else{
            $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Despesa não Registrada!</div>";
            header("location:../despesas.php");
        }

        /*if(mysqli_query($conexao,$sql)){
            $_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Despesa Registrada com Sucesso!</div>";
            header("location:../despesas.php");
        }else{
            $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Despesa não Registrada!</div>";
            header("location:../despesas.php");
        }*/
    }

}
//Fechar conexão e consulta
mysqli_stmt_close($consulta);   
mysqli_close($conexao);
?>