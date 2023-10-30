<?php 

//Destruir sessão do usuario e direciona-lo a pagina de login
session_start();//sessão iniciada;
session_unset();//sessão terminada;
session_destroy();//sessão destruida;
header("location:index.php");// redirecionado a página de login.
?>