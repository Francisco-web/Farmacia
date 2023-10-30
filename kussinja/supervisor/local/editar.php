
<?php
include_once '../../conexao.php';
session_start();

if(isset($_POST['update'])){
  $id = $_POST['id'];
  $local = mysqli_escape_string($conexao,$_POST['local']);
  $descricao =  mysqli_escape_string($conexao,$_POST['descricao']);

  //Consulta SQL para Alterar dados do Local de Estoque
  $sql = "UPDATE local_estoque SET nome_local = ?, descricao = ? WHERE id_local = $id";

  //Prepara a Consulta
  $consulta = mysqli_prepare($conexao,$sql);

  //Vincular parametros
  mysqli_stmt_bind_param($consulta, "ss", $local,$descricao);

  //Executar a Consulta
  if (mysqli_stmt_execute($consulta)) {
    $_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Dados Local de Remédio Alterados Com Sucesso!</div>";
    header("location:../local.php");
  }else{
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Dados Local Remédio Não Alterados!</div>";
    header("location:../local.php");
   }
  /*if (mysqli_query($conexao,$sql)) {
   $_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Dados Local de Remédio Alterados Com Sucesso!</div>";
   header("location:../local.php");
  }else{
   $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Dados Local Remédio Não Alterados!</div>";
   header("location:../local.php");
  }*/

  //Fechar COnsulta e Conexao
  mysqli_stmt_close($consulta);
  mysqli_close($conexao);
}
?>