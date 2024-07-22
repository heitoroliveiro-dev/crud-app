<?php include('header.php')?>
<?php include('conexao.php')?>

<!--LENDO O CONTEUDO DA ID SELECIONADA E ADICIONANDO NOS CAMPOS INPUT-->
    <?php
        //guardando o id em uma variavel 
        if(isset($_GET['id'])){
            $id = $_GET['id'];

            //chamando o select where id = ? 
            $query = "select * from alunos where id = $id";

            //$result faz a conexao e executa a query
            $result = mysqli_query($conn,$query);

            //validação e caso esteja tudo ok, preencher os campos
            if(!$result){
                die("Erro na Query.");
            }else{
                //nesse caso, não é necessario utilizar while como no caso do READ no index pois trabalharemos somente com uma linha. Assim, utilizamos mysqli_fetch_ASSOC.
                $row=mysqli_fetch_assoc($result);
            }

        }
    ?>
    
<!--QUANDO O USUARIO APERTA O BOTAO ATUALIZAR, OS DADOS SERAO ATUALIZADOS-->
    <?php 
        if(isset($_POST['up_aluno'])){

            //recebendo id
            if(isset($_GET['id_new'])){
                $idnew=$_GET['id_new'];
            }

            //guardando info em variaveis
            $nome = $_POST['nome'];
            $sobrenome = $_POST['sobrenome'];
            $idade = $_POST['idade'];

            /*com a query update, recebemos o $id atraves do action do form onde definimos ?id_new=<?php echo $id?>*/
            $query = "update alunos set nome = '$nome', sobrenome = '$sobrenome', idade = $idade where id = $idnew";

            //validacao e mensagem de sucesso
            $result = mysqli_query($conn,$query);
            if(!$result){
                die("Query falhou!");
            }else{
                header('location:index.php?up_msg=Aluno atualizado com sucesso!');
            }

        }
    ?>

<!--FORMULARIO-->
    <form action="atualizar.php?id_new=<?php echo $id ?>" method="post">
        <div class="form-group">      
            <label for="nome">Nome</label>     
            <input type="text" name="nome" id="idnome" class="form-control" value="<?php echo $row['nome'] ?>">
            <br>
            <label for="sobrenome">Sobrenome</label>     
            <input type="text" name="sobrenome" id="idsobrenome" class="form-control" value="<?php echo $row['sobrenome'] ?>">
            <br>
            <label for="idade">Idade</label>     
            <input type="int" name="idade" id="ididade" class="form-control" value="<?php echo $row['idade'] ?>">
        </div>  
        <input type="submit" class="btn btn-success" name="up_aluno" value="Atualizar">  
    </form>



<?php include('footer.php')?>