<?php /*include_once '../conexao.php';
//Daos do funcionario preenchido na pagina perfil e outras
$sql = "SELECT f.nome,f.endereco,f.email,f.telefone,u.nivel,u.senha FROM usuarios u join funcionarios f WHERE u.nome = f.nome; ";
$query = mysqli_query($conexao,$sql);
$dados = mysqli_fetch_assoc($query); 
  $nome = $dados['nome'];
  $endereco = $dados['endereco']; 
  $email = $dados['email']; 
  $telefone = $dados['telefone']; 
  $cargo = $dados['nivel'];
  $senha = $dados['senha']; 

  //data de hoje
  $hoje = date("d/m/Y");
*/?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Painel Farmaceutico</title>

    <!-- Bootstrap -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    </head>