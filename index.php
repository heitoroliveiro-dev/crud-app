<!--Aqui, é aplicado o conceito de herança, onde criamos uma página externa para conexão, cabeçalho e rodapé e chamamos esse código através da funcção INCLUDE do php-->
<?php include("header.php");?>
<?php include("conexao.php");?>

    <!--Titulo e botao de ADICIONAR-->
    <div class="box1">
        <h2>Todos os alunos</h2>

        <!--Este botão irá abrir um modal onde será realizado a inclusão de novos registros. Este modal irá receber um formulário. O botão, formatado em BOOTSTRAP, contém o data-target que busca a id do modal-->
        <button class="btn btn-primary" data-toggle="modal" data-target="#addaluno">ADD ALUNO(A)</button>
    </div>

    <!--Tabela com os dados vindo do DB-->
    <table class="table table-hover table-bordered table-striped">
       <!--Cabeçalho da tabela-->
        <thead> 
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>Idade</th>
                <th>Atualizar</th>
                <th>Apagar</th>
            </tr>
        </thead>

        <!--Corpo da tabela-->
        <tbody>      
            <?php 
                //A $query chama o comando select para mostrar os dados na tela
                $query="select * from alunos";

                //a $result recebe a conexão e o comando
                $result=mysqli_query($conn, $query);

                //aqui, testamos se o comando foi executado com sucesso
                if(!$result){
                    die("Erro na QUERY");
                }else{
                    //caso esteja tudo certo, precisamos realizar um loop que irá varrer todo o banco de dados e listar em um array as informações. a função mysqli_fetch_assoc() irá buscar através do parametro $result, onde está alocado a conexão e também o comando select
                    while($row=mysqli_fetch_assoc($result)){    
                        ?>
                            <!--Aqui, já não temos código php, e sim o HTML com a nossa tabela que será exibida na tela-->
                            <tr>
                                <td><?php echo $row['id'];?></td>
                                <td><?php echo $row['nome'];?></td>
                                <td><?php echo $row['sobrenome'];?></td>
                                <td><?php echo $row['idade'];?></td>
                                <td><a href="atualizar.php?id=<?php echo $row['id'];?>" class="btn btn-success ">Atualizar</a></td>
                                <td><a href="apagar.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Apagar</a></td>
                            </tr>
                            <!--Para que os botoes atualizar e deletar funcionem da forma como queremos, é preciso receber o ID da linha que queremos alterar-->
                        <?php                        
                    }
                }
            ?>
        </tbody>
    </table>

    <!--Mensagem de erro caso o usuario não preencha o Nome-->
    <div style="color:red; text-align:center;">
        <?php 
            if(isset($_GET['message'])){
                echo $_GET['message'];
            }
        ?>
    </div>
    <!--Acredito que essa validação possa ser evitada utilizando REQUIRED em cada input, porém foi interessante aprender sobre a função HEADER-->

    <!--Mensagem de "Aluno(a) cadastrado com sucesso-->
    <div style="color:green; text-align:center;">
        <?php 
            if(isset($_GET['insert_msg'])){
                echo $_GET['insert_msg'];
            }
        ?>
    </div>

    <!--Mensagem de "Aluno(a) atualizado com sucesso-->
    <div style="color:green; text-align:center;">
        <?php 
            if(isset($_GET['up_msg'])){
                echo $_GET['up_msg'];
            }
        ?>
    </div>

    <!--Mensagem de "Aluno(a) deletado com sucesso-->
    <div style="color:green; text-align:center;">
        <?php 
            if(isset($_GET['del_msg'])){
                echo $_GET['del_msg'];
            }
        ?>
    </div>    
    

    <!--Formulário modal a ser preenchido (action para inserir.php e method POST por segurança)-->
    <form action="inserir.php" method="post">
        <div class="modal fade" id="addaluno" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Adicionar aluno(a)</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">      
                        <!--Formulário para inserir novos registros-->
                        <div class="form-group">      
                            <label for="nome">Nome</label>     
                            <input type="text" name="nome" id="idnome" class="form-control">
                            <br>
                            <label for="sobrenome">Sobrenome</label>     
                            <input type="text" name="sobrenome" id="idsobrenome" class="form-control">
                            <br>
                            <label for="idade">Idade</label>     
                            <input type="int" name="idade" id="ididade" class="form-control">
                        </div>                                             
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <input type="submit" class="btn btn-success" name="add_aluno" value="Adicionar">
                    </div>
                </div>
            </div>
        </div>
    </form>

<?php include("footer.php");?>