<?php
    require_once("db.php");
    require_once("dao/ContatoDAO.php");
    require_once("Models/contato.php");

    // Verificando o tipo do formulário
    $type = filter_input(INPUT_POST, "type");

    $contatoDao = new ContatoDAO($conn);

    if($type === "create") {

        $nome = filter_input(INPUT_POST, "nome");
        $telefone = filter_input(INPUT_POST, "telefone");
        $email = filter_input(INPUT_POST, "email");

        $contato = new Contato();

        $contato->nome = $nome;
        $contato->telefone = $telefone;
        $contato->email = $email;

        $contatoDao->create($contato);

        header('Location: index.php');

    } else if ($type === "update") {
        
        $nome = filter_input(INPUT_POST, "nome");
        $telefone = filter_input(INPUT_POST, "telefone");
        $email = filter_input(INPUT_POST, "email");
        $id = filter_input(INPUT_POST, "id");

        $contatoDb = $contatoDao->findById($id);

        $contatoDb->nome = $nome;
        $contatoDb->telefone = $telefone;
        $contatoDb->email = $email;

        $contato = new Contato();

        $contatoDao->update($contatoDb);

        header('Location: index.php');

    } else if ($type === "delete") {

        // Recebendo os inputs do formulário
        $id = filter_input(INPUT_POST, "id");

        $contato = $contatoDao->findById($id);

        $contatoDao->destroy($contato->id);

        header('Location: index.php');

    }