
<?php 
include_once '../../conexao.php';
session_start();

if(isset($_POST['add'])){
$idlocal = mysqli_escape_string($conexao,$_POST['local_remedio']);
$nome = mysqli_escape_string($conexao,$_POST['nome']);
$unidade = mysqli_escape_string($conexao,$_POST['unidade']);
$descricao = mysqli_escape_string($conexao,$_POST['descricao']);
$idcategoria = mysqli_escape_string($conexao,$_POST['idcategoria']);
$idfornecedor= mysqli_escape_string($conexao,$_POST['fornecedor']);
$imagem = $_FILES['imagem'];

  if(empty($idlocal)){
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro: Seleciona o Local do Remédio!</div>";
        header("location:../medicine.php");
    }elseif(empty($nome)){
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro: Digita o Nome do Remédio!</div>";
        header("location:../medicine.php");
    }elseif(empty($idcategoria)){
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro: Seleciona a Categoria!</div>";
        header("location:../medicine.php");
    }elseif(empty($idfornecedor)){
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro: Seleciona o Fornecedor!</div>";
        header("location:../medicine.php");
    }elseif(empty($unidade)){
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro: Digita a Unidade do Remédio!</div>";
        header("location:../medicine.php");
    }else {

        //verificar se existe um remedio com este nome
        $sql ="SELECT remedio FROM remedios";
        $query = mysqli_query($conexao,$sql);
        $dados = mysqli_fetch_assoc($query);
        $nome_anterior = $dados['remedio'];
        if($nome == $nome_anterior){
                $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Este Remédio Já Existe, Tente Outro Novamente!</div>";
                header("location:../medicine.php");
            }else{
                if (empty($imagem)) {
                    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Insira a Imagem do Remédio!</div>";
                    header("location:../medicine.php");
                }else {
                        // Verifica se não houve erro durante o upload
                    if ($imagem['error'] === 0) {
    
                        // Verifica se o tamanho do arquivo
                        if($imagem ['size'] > 200000) {
                           
                            $_SESSION['msg'] ="<div class='alert alert-danger' role='alert'> Tamanho da imagem é maior!</div>";
                            header('location:../medicine.php');
                        }
                        
                        // Move o arquivo para um diretório de destino
                        $caminhoDestino = '../images/uploads/remedios/' . $imagem['name'];
                        move_uploaded_file($imagem['tmp_name'], $caminhoDestino);
                        
                        // Verifica se o arquivo é uma imagem válida
                        $extensao = strtolower(pathinfo($caminhoDestino, PATHINFO_EXTENSION));
                        $tiposPermitidos = array('jpg', 'jpeg', 'png');
                        if (!in_array($extensao, $tiposPermitidos)) {
                            header('location: ../medicine.php');
                            $_SESSION['msg'] ="<div class='alert alert-danger' role='alert'> Formato de arquivo inválido. Apenas imagens JPG, JPEG e PNG são permitidas!</div>";
                        
                            // Verifica se o arquivo existe na pasta de destino
                            if (!file_exists($caminhoDestino)) {
                                header('location: ../medicine.php');
                                $_SESSION['msg'] ="<div class='alert alert-danger' role='alert'> Erro ao mover o arquivo para a pasta de destino!</div>";
    
                            }
                        }
                            
                        // Salva as informações da imagem no banco de dados
                        $imagem = $imagem['name'];
    
                        //Adicionar registo na tabela usuario recebendo o ID pessoa atraves da função mysqli_insert_id
                        $sql = "INSERT INTO remedios (id_remedio,imagem,remedio,unidade,descricao,id_categoria,id_local,id_fornecedor) 
                            VALUES(NULL,'$imagem','$nome','$unidade','$descricao','$idcategoria','$idlocal','$idfornecedor')";
                        if(mysqli_query($conexao,$sql)){
                            $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Remédio Adicionado com sucesso!</div>";
                            header("location:../medicine.php");
                        }else{
                            $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro: Remédio não Adicionado!</div>";
                        header("location:../medicine.php");
                        }
                    }
                }
            
        }

    }

}
mysqli_close($conexao);
?>