<?php 
    include_once("templates/header.php");
    require_once("Models/contato.php");
    require_once("dao/ContatoDAO.php");

    $contatoModel = new Contato();

    $contatoDao = New ContatoDAO($conn);

    $id = filter_input(INPUT_GET, "id");

    $contato = $contatoDao->findById($id);
?>
    <div class="container" id="view-contact-container">
      <h1 id="main-title"><?php echo $contato->nome ?></h1>
      <p class="bold">Telefone:</p>
      <p><?php echo $contato->telefone ?></p>
      <p class="bold">E-mail:</p>
      <p><?php echo $contato->email ?></p>
      <a class="btn btn-secondary" href="index.php">Voltar</a>
    </div>
  <?php include_once("templates/footer.php") ?>
