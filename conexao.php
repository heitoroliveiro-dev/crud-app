<?php 
    //aplicando as informações de conexão em constantes
    $host="localhost";
    $user="root";
    $password="123";
    $database="estudantes";

    //realizando a conexao com o banco de dados
    $conn = mysqli_connect($host,$user,$password,$database);

    //checando a conexao
    if(!$conn){
        die("A conexão falhou!");
    }
?>
