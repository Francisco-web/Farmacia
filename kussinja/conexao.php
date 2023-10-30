


<?php

$conexao = mysqli_connect("localhost","root","","kussinja");
mysqli_set_charset($conexao,"utf8");
if(mysqli_connect_error()){
    echo "Erro na conexão com o banco de dados:". mysqli_connect_error();
}

?>