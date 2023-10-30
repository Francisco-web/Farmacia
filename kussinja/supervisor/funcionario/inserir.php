



<?php 
include_once '../../conexao.php';
session_start();

if(isset($_POST['add'])){

$novoNome = ucwords(strtolower(trim($nome = mysqli_escape_string($conexao,$_POST['nome']))));
$novoBi = strtolower(trim($bi = mysqli_escape_string($conexao,$_POST['bi'])));
$novoEnd = ucwords(strtolower(trim($endereco = mysqli_escape_string($conexao,$_POST['endereco']))));
$novoTel = trim($telefone = mysqli_escape_string($conexao,$_POST['telefone']));
$novoEmail = strtolower(trim($email = mysqli_escape_string($conexao,$_POST['email'])));
$cargo = mysqli_escape_string($conexao,$_POST['cargo']);
$estado= 'Activo';//ativo 1, inativo 0

//imagem

$caminho = "images/";
$foto = $caminho . basename($_FILES["foto"]["name"]);
$uploadOk = 1;
$extensao = strtolower(pathinfo($foto,PATHINFO_EXTENSION));

    if(empty($novoNome)){
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Digite o nome!</div>";
        header("location:../cashier.php");
    }elseif(empty($novoBi)){
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Insira o Número do B.I!</div>";
        header("location:../cashier.php");
    }elseif(empty($novoTel)){
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Insira o Número de Telefone!</div>";
        header("location:../cashier.php");
    }elseif(empty($novoEnd)){
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Digite o seu Endereço!</div>";
        header("location:../cashier.php");
    }elseif(empty($novoEmail)){
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Digite o Endereço de Email!</div>";
        header("location:../cashier.php");
    }elseif(empty($cargo)){
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Seleciona o Cargo!</div>";
        header("location:../cashier.php");
    }elseif(empty($foto)){
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Insira uma Fotografia de Perfil!</div>";
        header("location:../cashier.php");
    }else {

            //verificar tamanho da imagem
            $tamanho = getimagesize($_FILES["foto"]["tmp_name"]);
            if($tamanho !== false){
                $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>O fichero é uma imagem!</div>";
                header("location:../cashier.php");
                $uploadOk = 1;
            }else {
                $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: O fichero não é uma imagem!</div>";
                header("location:../cashier.php");
                $uploadOk = 0;
            }
            //Verificar se existe o ficheiro
            if (file_exists($foto)) {
                $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: O ficheiro já existe!</div>";
                header("location:../cashier.php");
                $uploadOk = 0;
            }
            //verificar Tamanho
            if ($_FILES["foto"]["size"] > 500000) {
                $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: O ficheiro é muito grande!</div>";
                header("location:../cashier.php");
                $uploadOk = 0;
            }
            //formatos permitidos
            if ($extensao != "jpg" && $extensao != "png" && $extensao != "jpeg") {
                $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Apenas é permitido ficheiros do tipo JPEG,PNG e JPG!</div>";
                header("location:../cashier.php");
                $uploadOk = 0;
            }
            //tudo ok faz o upload
            if ( $uploadOk == 0 ) {
                $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Ficheiro Não Inserido!</div>";
                header("location:../cashier.php");
            }else {
                if (move_uploaded_file($_FILES["foto"]["tmp_name"],$foto)) {
                    
            

                    $sql ="SELECT * FROM usuarios where nome_usuario = '$novoNome' and bi = '$novoBi'";
                    $res_n = mysqli_query($conexao,$sql);
                    $contagem = mysqli_fetch_assoc($res_n);
                    if($contagem > 0){

                        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro: Este Usuário já Existe. Tente Outro Novamente!</div>";
                        header("location:../cashier.php");
                    }else{

                    $sql="INSERT INTO usuarios (id_usuario,nome_usuario,bi,foto,data_usuario) 
                            VALUES(NULL,'$novoNome','$novoBi','$foto','$data')";
                    if(mysqli_query($conexao,$sql)){
                        $idusuario = mysqli_insert_id($conexao);
                        $sql = "INSERT INTO nivel_acesso (id_nivel_acesso,id_usuario,nivel,email,telefone,senha,estado_usuario,data_nivel)
                                VALUES(NULL,'$idusuario','$cargo','$novoEmail','$novoTel','$novoBi','$estado','$data')";
                        
                        mysqli_query($conexao,$sql);
                
                        $_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Funcionário Adicionado!</div>";
                        header("location:../cashier.php");
                    }else
                    {
                        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Funcionário não Adicionada!</div>";
                        header("location:../cashier.php");
                    }
                }
            }
            
        }
    }

}
mysqli_close($conexao);
?>