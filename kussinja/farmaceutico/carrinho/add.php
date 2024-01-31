

<?php 
include_once '../../conexao.php';
ob_start();
session_start();

if (isset($_POST['add_carrinho'])) {
    
    $entrada_id = mysqli_real_escape_string($conexao,$_POST['id_entrada']);
    $qtd_produto = mysqli_real_escape_string($conexao,$_POST['qtd']);
    $data_carrinho = date('Y-m-d h:s:i');
    $id_farmaceutico = 1;

    if(empty($entrada_id)){
        $_SESSION['msg'] = "<div class='alert alert-warning' role='alert'> Atenção: Seleciona o Produto!</div>";
        header("location:../add_carrinho.php");
    }elseif(empty($qtd_produto)){
        $_SESSION['msg'] = "<div class='alert alert-warning' role='alert'> Atenção: Insira a Quatidade!</div>";
        header("location:../add_carrinho.php");
    }else{

    
        //Query verificar se o produto ja esta no carrinho
        $query_produto = mysqli_query($conexao,"SELECT * FROM carrinho car inner join entradas ent on car.id_entrada = ent.id_entrada join remedios rem on ent.id_remedio = rem.id_remedio join nivel_acesso nivel on car.id_farmaceutico = nivel.id_nivel_acesso WHERE ent.id_entrada = '$entrada_id' and id_farmaceutico = $id_farmaceutico");

        //Query para verificar a quantidade no estoque
        $query_qtd = mysqli_query($conexao,"SELECT qtd_movida FROM entradas ent join remedios rem on ent.id_remedio = rem.id_remedio WHERE ent.id_entrada = '$entrada_id'");
        $dados = mysqli_fetch_array($query_qtd);
        $qtd_entrada= $dados['qtd_movida'];

        if($resultado = mysqli_num_rows($query_produto)){
            $_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>Este Remédio Já Existe na Lista de Compra!</div>";
            header("location:../add_carrinho.php");

        }elseif ($qtd_produto > $qtd_entrada) {
            $_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>Quantidade Inexistente! Estoque Actual $qtd_entrada</div>";
            header("location:../add_carrinho.php");
        }else {
        //adicionar rem;edio ao carrinho
        $sql ="INSERT INTO `carrinho` (`id_carrinho`, `id_farmaceutico`, `id_entrada`, `qtd_remedio`, `data_carrinho`) VALUES (NULL, '$id_farmaceutico', '$entrada_id', '$qtd_produto','$data_carrinho');";
        
        if (mysqli_query($conexao,$sql)) {
            $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Remédio Adiconado a Lista de Compra!</div>";
            header("location:../add_carrinho.php");
        }else {
            $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Remédio não adicionado a Lista de Compra!</div>";
            header("location:../add_carrinho.php");
        }
        }
    }


}
?>