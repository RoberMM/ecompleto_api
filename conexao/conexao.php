<?php
    //Conexão com o banco de dados
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "ecompleto";

    $con = mysqli_connect($host, $user, $password, $dbname);

    if(!$con){
        die("Falha na conexao: " . mysqli_connect_error());
    }
?>