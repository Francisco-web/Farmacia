<?php 
//iniciar Sessão
session_start();

//Verificar se o usuario ja esta autenticado
if(isset($_SESSION['usuario'])){
$nomeUsuario = $_SESSION['usuario'];

}else{
   	//Se nã tiver autenticado, verificar se háum cookie com o nme do usuario
	if(isset($_COOKIE['nomeUsuario'])){
		$nomeUsuario = $_COOKIE['nomeUsuario'];
	}else{
		//Se não houver sessão
		$nomeUsuario = 'visita';
	}
}

//verificar se  suaurio enviou dados od formulario
if(isset($_POST['novoNome'])){
    $novoNome = $_POST['novoNome'];
//Definir um cookie com o nvo nome do usuario que expira me 1hora
setcookie('nomeUsuario', $novoNome, time() + 3600);
//atualizar a variavel de 
$_SESSION['usuario'] = $novoNome;
$nomeUsuario = $novoNome;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie</title>
</head>
<body>
    <h1>Bem Vindo, <?php echo $nomeUsuario;?></h1>
    <form action="" method="post">
        <label for="novoNome"></label>
        <input type="text" name="novoNome" id="novoNome">
        <input type="submit" value="Salvar">
    </form>
</body>
</html>