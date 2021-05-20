<?php

    require_once("templates/header.php");
    require_once("Models/contato.php");
    require_once("dao/ContatoDAO.php");

    $contatoModel = new Contato();

    $contatoDao = new ContatoDAO($conn);

    $busca = filter_input(INPUT_GET, "busca");

    $contatos = $contatoDao->findByNome($busca);

?>
    <div class="container" id="view-contact-container">
        <h2 class="section-nome" id="search-nome">Você está buscando por: <span id="search-result"><?php echo $busca ?></span></h2>
        <p class="section-description">Resultados retornados baseados em sua busca.</p>
        <div class="contatos-container">
            <?php foreach($contatos as $contato): ?>
            <div>
                <h1 id="main-title"><?php echo $contato->nome ?></h1>
                <p class="bold">Telefone:</p>
                <p><?php echo $contato->telefone ?></p>
                <p class="bold">E-mail:</p>
                <p><?php echo $contato->email ?></p>
            </div>
            <?php endforeach; ?>    
            <?php if(count($contatos) === 0): ?>
                <p class="empty-list">Não há contatos para esta busca, <a class="back-link" href="index.php">voltar</a>.</p>
            <?php endif; ?>
        </div>
    </div>
    </div>

<?php  include_once("templates/footer.php"); ?>