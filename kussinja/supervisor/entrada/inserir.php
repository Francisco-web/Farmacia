
<?php 
include_once '../../conexao.php';
session_start();

if(isset($_POST['add-entrada'])){
$remedio = mysqli_escape_string($conexao,$_POST['remedio']);
$qtd_inicial = mysqli_escape_string($conexao,$_POST['qtd_inicial']);
$preco_compra = mysqli_escape_string($conexao,$_POST['preco_compra']);
$data_expirar = mysqli_escape_string($conexao,$_POST['data_expirar']);
$percentagemLucro = mysqli_escape_string($conexao,$_POST['percentagemLucro']);
$qtd_movida = $qtd_inicial;
$data_entrada = date('Y-m-d');
$id_nivel_acesso = 1;
$preco_venda = $percentagemLucro + $preco_compra;

    if(empty($remedio)){
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Atenção: Seleciona o Remédio!</div>";
        header("location:../add-entrada.php");
    }if(empty($qtd_inicial)){
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Atenção: Insira a Quantidade!</div>";
        header("location:../add-entrada.php");
    }if(empty($preco_compra)){
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Atenção: Insira o Valor de Compra!</div>";
        header("location:../add-entrada.php");
    }if(empty($preco_venda)){
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Atenção: Insira o Preço Unitário!</div>";
        header("location:../add-entrada.php");
    }if(empty($data_expirar)){
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Atenção: Insira a Data de Expiração do Remédio!</div>";
        header("location:../add-entrada.php");
    }else {
        if ($data_expirar == $data_entrada || $data_expirar <= $data_entrada) {
            $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Esse Remédio Expirou, Não pode ser Adicionado!</div>";
            header("location:../add-entrada.php");
        }else {
            
            if ($qtd_inicial >= 30 ) {
                $estado_entrada = 'Estoque Confortável'; 
            }elseif ($qtd_inicial > 0  && $qtd_inicial <= 29 ) {
                $estado_entrada = 'Estoque Baixo'; 
            }elseif ($qtd_inicial == 0 ) {
                $estado_entrada = 'Sem Estoque'; 
            }
            $sql = "INSERT INTO entradas (id_entrada,id_remedio,id_nivel_acesso,qtd_inicial,qtd_movida,preco_compra,preco_venda,margemLucro,estado_entrada,vancimento,data_entrada)
                    VALUES(NULL,'$remedio','$id_nivel_acesso','$qtd_inicial','$qtd_movida','$preco_compra','$preco_venda','$percentagemLucro','$estado_entrada','$data_expirar','$data_entrada')";
            if(mysqli_query($conexao,$sql)){
                $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Entrada de Remédio Efectuda com Sucesso!</div>";
                header("location:../add-entrada.php");
            }else{
                $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro: Entrada de Remédio não Efectuado!</div>";
                header("location:../add-entrada.php");
            }
        }

    }

}
mysqli_close($conexao);
?>