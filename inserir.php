<?php 
    include "conexao.php";
    
    //validando se a pagina está recebendo o conteúdo do formulário
    if(isset($_POST["add_aluno"])){
        
        /*recebendo valores do form e colocando em variaveis*/
        $nome = $_POST["nome"];
        $sobrenome = $_POST["sobrenome"];
        $idade = $_POST["idade"];

        //validando se os campos foram preenchidos corretamente
        if($nome == "" || empty($nome)){
            //se os campos estão vazios, mostre uma mensagem
            header('location:index.php?message=Preencha o campo nome!');
        }else{
            //se tudo estiver ok, damos sequencia na inserção dos dados no db
            $query="insert into alunos (nome, sobrenome, idade) values ('$nome', '$sobrenome', $idade)";

            $result=mysqli_query($conn,$query);

            if(!$result){
                die("Query falhou");
            }else{
                header('location:index.php?insert_msg=Aluno(a) cadastrado com sucesso');
            }
        }
    
    }


?>