
<?php
include_once '../../conexao.php';
session_start();

//mudar o estado da despesa
if (isset($_GET['update'])&& isset($_GET['id'])&& isset($_GET['estado'])) {
  $estado =  mysqli_escape_string($conexao, $_GET['estado']);
  $id_despesa = mysqli_escape_string($conexao, $_GET['id']);

  //Verificar o estado da despesa
    if($estado == 'Pendente'){

      $Novo_estado = 'Liquidada'; 
      
      //COnsulta SQL para actualizar estado da despesa
      $sql = "UPDATE `despesas` SET `estado_despesa` = ? WHERE `despesas`.`id_despesa` = ? ";
      
      //Preparar a consulta
      $consulta = mysqli_prepare($conexao,$sql);

      //Vincular parametros
      mysqli_stmt_bind_param($consulta,"si",$Novo_estado,$id_despesa);

      //Exceutar a consulta
      if(mysqli_stmt_execute($consulta)){
        $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Estado da Despesa Actualizado com Sucesso</div>";
        header('location: ../despesas.php');
      }else{
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro: Estado da Despesa Não Actualizado com Sucesso!</div>";
        header('location: ../despesas.php');
      }
      //msg não pode actualizar por causa do estado 
    }else{
      $_SESSION['msg'] = "<div class='alert alert-info' role='alert'> Não Pode Actualizar Esta Despesa!</div>";
      header('location: ../despesas.php');
    }
      /*if (mysqli_query($conexao,$sql)) {
      $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Estado da Despesa Actualizado com Sucesso</div>";
      header('location: ../despesas.php');
      }else{
      $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro: Estado da Despesa Não Actualizado com Sucesso!</div>";
      header('location: ../despesas.php');
      }
    }else{
      $_SESSION['msg'] = "<div class='alert alert-info' role='alert'> Não Pode Actualizar Esta Despesa!</div>";
      header('location: ../despesas.php');
    }*/
    //Fechar a conexao e a consulta
    mysqli_stmt_close($consulta);
    mysqli_close($conexao);
    
 } 
?>