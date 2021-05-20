<?php
    require_once("db.php");
    require_once("dao/ContatoDAO.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- Bootstrap cdnjs -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css" integrity="sha512-oc9+XSs1H243/FRN9Rw62Fn8EtxjEYWHXRvjS43YtueEewbS6ObfXcJNyohjHqVKFPoXXUxwc+q1K7Dee6vv9g==" crossorigin="anonymous" />
        
        <!-- Font awesome cdnjs -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
        
        <!-- CSS -->
        <link rel="stylesheet" href="css/styles.css">

        <title>Agenda de contato</title>
    </head>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="index.php">
                <img src="img/agenda.jpg" alt="agenda">
            </a>

            <form id="search-form" class="form-inline my-2 my-lg-0" action="search.php" method="GET">
                <input name="busca" id="search" class="form-control mr-sm-2" type="search" placeholder="Buscar contato" aria-label="Search">
                <button class="btn my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
            </form>
            
            <div>
                <div class="navbar-nav">
                    <a  class="nav-link active" href="index.php">Agenda</a>
                    <a  class="nav-link active" href="create.php">Adicionar Contato</a>
                </div>  
            </div>
        </nav>
    </header>
    <body>