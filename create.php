<?php include_once("templates/header.php"); ?>

    <div class="container">
        <h1 id="main-title">Criar contato</h1>
        <form action="process.php" method="POST">
            <input type="hidden" name="type" value="create">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite um nome">
            </div>
            <div class="form-group">
                <label for="telefone">telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Digite um telefone">
            </div>
            <div class="form-group">
                <label for="email">email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Digite um email">
            </div>
            <br />
            <input type="submit" class="btn btn-primary" value="Cadastrar">
            <a href="index.php" class="btn btn-secondary">Voltar</a>
        </form>
    </div>

<?php include_once("templates/footer.php"); ?>    