<?php

    include_once("Models/contato.php");

    class ContatoDAO implements ContatoDAOInterface {
        
        private $conn;

        public function __construct(PDO $conn) {
            $this->conn = $conn;
        }

        public function buildContato($data){

            $contato = new Contato();

            $contato->id = $data["id"];
            $contato->nome = $data["nome"];
            $contato->telefone = $data["telefone"];
            $contato->email = $data["email"];

            return $contato;
        }

        public function create(Contato $contato) {
            
            $stmt = $this->conn->prepare("INSERT INTO contatos (nome, telefone, email) VALUES (:nome, :telefone, :email)");

            $stmt->bindParam(":nome", $contato->nome);
            $stmt->bindParam(":telefone", $contato->telefone);
            $stmt->bindParam(":email", $contato->email);

            $stmt->execute();

        }

        public function findAll() {
            
            $contatos = [];

            $stmt = $this->conn->prepare("SELECT * FROM contatos");

            $stmt->execute();

            if($stmt->rowCount() > 0) { 

                $contatos = $stmt->fetchAll();
                
            }

            return $contatos;
        }

        public function findById($id) {
            
            $contato = [];

            $stmt = $this->conn->prepare("SELECT * FROM contatos WHERE id = :id");
      
            $stmt->bindValue(":id", $id);
      
            $stmt->execute();
      
            if($stmt->rowCount() > 0) {
      
              $contatoData = $stmt->fetch();
      
              $contato = $this->buildContato($contatoData);
      
              return $contato;

            }
            
        }

        public function findByNome($nome) {

            $contatos = [];

            $stmt = $this->conn->prepare("SELECT * FROM contatos WHERE nome LIKE :nome");

            $stmt->bindValue(":nome", '%'.$nome.'%');

            $stmt->execute();

            if($stmt->rowCount() > 0) {

                $contatosArray = $stmt->fetchAll();
                
                foreach($contatosArray as $contato) {
                  
                    $contatos[] = $this->buildContato($contato);
                
                }
                
            }
              
            return $contatos;

        }

        public function update(Contato $contato) {

            $stmt = $this->conn->prepare("UPDATE contatos SET nome = :nome, telefone = :telefone, email = :email WHERE id = :id");

            $stmt->bindParam(":nome", $contato->nome);
            $stmt->bindParam(":telefone", $contato->telefone);
            $stmt->bindParam(":email", $contato->email);
            $stmt->bindParam(":id", $contato->id);

            $stmt->execute();

            header('Location: edit.php');

        }

        public function destroy($id) {

            $stmt = $this->conn->prepare("DELETE FROM contatos WHERE id = :id");

            $stmt->bindValue(":id", $id);

            $stmt->execute();

            header('Location: index.php');
        }
    }