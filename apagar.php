<?php include("conexao.php");?>


<?php 
    //recebendo id  por $_GET e colocando em uma var
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    
        $query = "delete from alunos where id = $id;";

        $result = mysqli_query($conn,$query);

        if(!$result){
            die("Query falhou");
        }else{
            header('location:index.php?del_msg=Aluno excluído com sucesso!');
        }
    }
?>