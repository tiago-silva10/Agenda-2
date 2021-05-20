<?php 

    include_once("templates/header.php");
    require_once("dao/ContatoDAO.php");

    $contatoDao = new ContatoDAO($conn);

    $contatos = $contatoDao->findAll();
 

?>
    <div class="container">
        <h1 id="main-title">Minha Agenda de Contatos</h1>
        <?php if(count($contatos) > 0): ?>
            <table class="table" id="contacts-table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($contatos as $contato): ?>
                        <tr>
                            <td scope="row"><?php echo $contato['id'] ?></td>
                            <td scope="row"><?php echo($contato['nome']) ?></td>
                            <td scope="row"><?php echo $contato['telefone']?></td>
                            <td scope="row"><?= $contato['email']?></td>
                            <td class="actions">
                                <a href="show.php?id=<?= $contato['id'] ?>">
                                    <i class="fas fa-eye check-icon"></i>
                                </a>
                                <a href="edit.php?id=<?= $contato['id'] ?>">
                                    <i class="far fa-edit edit-icon"></i>
                                </a>
                                <form class="delete-form" action="process.php" method="POST">
                                    <input type="hidden" name="type" value="delete">
                                    <input type="hidden" name="id" value="<?= $contato['id'] ?>">
                                    <button type="submit">
                                        <i class="fas fa-times delete-icon"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p id="empty-list-text">Ainda não há contatos na sua agenda, <a href="create.php">clique aqui para adicionar</a>.</p>
        <?php endif; ?>
    </div>    

<?php include_once("templates/footer.php"); ?>
