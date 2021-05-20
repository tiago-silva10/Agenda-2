<?php 
    include_once("templates/header.php");
    include_once("dao/ContatoDAO.php");
    include_once("Models/contato.php");

    $contatoModel = new Contato();

    $contatoDao = New ContatoDAO($conn);

    $id = filter_input(INPUT_GET, "id");

    $contato = $contatoDao->findById($id);
?>

    <div class="container">
        <h1 id="main-title">Editar Contato</h1>
        <form id="edit-form" action="process.php" method="POST">
            <input type="hidden" name="type" value="update">
            <input type="hidden" name="id" value="<?= $id ?>">
            
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite um nome" required value="<?php echo $contato->nome ?>">
            </div>
            
            <div class="form-group">
                <label for="telefone">telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Digite um telefone" required value="<?php echo $contato->telefone ?>">
            </div>
            
            <div class="form-group">
                <label for="email">email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Digite um email" required value="<?php echo $contato->email ?>">
            </div>

            <input type="submit" class="btn btn-primary" value="Atualizar">
            <a class="btn btn-secondary" href="index.php">Voltar</a>
        </form>
    </div>

<?php include_once("templates/footer.php"); ?>    