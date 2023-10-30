
<?php
include_once '../../conexao.php';
session_start();

if(isset($_POST['update'])){
  $idlocal = mysqli_escape_string($conexao,$_POST['idlocal']);
  $nome = mysqli_escape_string($conexao,$_POST['remedio']);
  $unidade = mysqli_escape_string($conexao,$_POST['unidade']);
  $descricao = mysqli_escape_string($conexao,$_POST['descricao']);
  $idcategoria = mysqli_escape_string($conexao,$_POST['idcategoria']);
  $idfornecedor= mysqli_escape_string($conexao,$_POST['idfornecedor']);
  $imagem = $_FILES['imagem'];
  $id = mysqli_escape_string($conexao,$_POST['id']);

  if(empty($idlocal)){
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro: Seleciona o Local do Remédio!</div>";
      header("location:../editarRemedio.php?id=$id");
  }elseif(empty($nome)){
      $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro: Digita o Nome do Remédio!</div>";
      header("location:../editarRemedio.php?id=$id");
  }elseif(empty($idcategoria)){
      $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro: Seleciona a Categoria!</div>";
      header("location:../editarRemedio.php?id=$id");
  }elseif(empty($idfornecedor)){
      $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro: Seleciona o Fornecedor!</div>";
      header("location:../editarRemedio.php?id=$id");
  }elseif(empty($unidade)){
      $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro: Digita a Unidade do Remédio!</div>";
      header("location:../editarRemedio.php?id=$id");
  }else {
    //verificar se existe um remedio com este nome
    $sql ="SELECT remedio FROM remedios";
    $query = mysqli_query($conexao,$sql);
    $dados = mysqli_fetch_assoc($query);
    $nome_anterior = $dados['remedio'];
    if($nome == $nome_anterior){
      $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Este Remédio Já Existe, Tente Outro Novamente!</div>";
      header("location:../editarRemedio.php?id=$id");
    }else{
  
      $sql = "UPDATE remedios SET remedio = '$nome',unidade = '$unidade',descricao = '$descricao',id_categoria ='$idcategoria',id_local ='$idlocal',id_fornecedor ='$idfornecedor'	 WHERE id_remedio = $id";

      if (mysqli_query($conexao,$sql)) {
        $_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Dados do Remedio Alterados!</div>";
        header("location:../medicine.php");
        }else{
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Dados do remédio Não Alterados!</div>";
        header("location:../medicine.php");
      }

    }
  }
         
}

if (isset($_POST['alterar_imagem'])) {
  $imagem = $_FILES['imagem'];
  $id = mysqli_real_escape_string($conexao,$_POST['id']);

  if (empty($imagem)) {
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Insira a Imagem do Remédio!</div>";
    header("location:../alterar_imagem.php?id=$id");
  }else {
      // Verifica se não houve erro durante o upload
    if ($imagem['error'] === 0) {

        // Verifica se o tamanho do arquivo
        if($imagem ['size'] > 200000) {
          
            $_SESSION['msg'] ="<div class='alert alert-danger' role='alert'> Tamanho da imagem é maior!</div>";
            header('location:../alterar_imagem.php?id=$id');
        }
        
        // Move o arquivo para um diretório de destino
        $caminhoDestino = '../images/uploads/remedios/' . $imagem['name'];
        move_uploaded_file($imagem['tmp_name'], $caminhoDestino);
        
        // Verifica se o arquivo é uma imagem válida
        $extensao = strtolower(pathinfo($caminhoDestino, PATHINFO_EXTENSION));
        $tiposPermitidos = array('jpg', 'jpeg', 'png');
        if (!in_array($extensao, $tiposPermitidos)) {
            header('location: ../alterar_imagem.php?id=$id');
            $_SESSION['msg'] ="<div class='alert alert-danger' role='alert'> Formato de arquivo inválido. Apenas imagens JPG, JPEG e PNG são permitidas!</div>";
        
            // Verifica se o arquivo existe na pasta de destino
            if (!file_exists($caminhoDestino)) {
                header('location: ../alterar_imagem.php?id=$id');
                $_SESSION['msg'] ="<div class='alert alert-danger' role='alert'> Erro ao mover o arquivo para a pasta de destino!</div>";

            }
        }
            
        // Salva as informações da imagem no banco de dados
        $imagem = $imagem['name'];

        //Adicionar registo na tabela usuario recebendo o ID pessoa atraves da função mysqli_insert_id
        $sql = "UPDATE remedios SET imagem = '$imagem' WHERE id_remedio = $id";
        if(mysqli_query($conexao,$sql)){
            $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Imagem Alterada com sucesso!</div>";
            header("location:../alterar_imagem.php?id=$id");
        }else{
            $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro: Imagem do Remédio não Alterada!</div>";
        header("location:../alterar_imagem.php?id=$id");
        }
    }
  }
}
?>