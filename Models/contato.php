<?php

class Contato {
    public $id, $nome, $telefone, $email;

    public function getId(){
        return $this->id = $id;
    }

    public function setId(){
        $this->id = $id;
    }

    public function getNome(){
        return $this->nome = $nome;
    }

    public function setNome(){
        $this->nome = $nome;
    }

    public function getTelefone(){
        return $this->telefone = $telefone;
    }

    public function setTelefone(){
        $this->telefone = $telefone;
    }

    public function getEmail(){
        return $this->email = $email;
    }

    public function setEmail(){
        $this->email = $email;
    }
}

interface ContatoDAOInterface {

    public function buildContato($data);
    public function findAll();
    public function create(Contato $contato);
    public function findById($id);
    public function findByNome($nome);
    public function update(Contato $contato);
    public function destroy($id);
}