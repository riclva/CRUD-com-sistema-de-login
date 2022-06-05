<?php 

    class UserService {

         private $conexao;
         private $user;

         

         public function __construct(Conexao $conexao, User $user) {
                $this->conexao = $conexao->conectar();
                $this->user = $user;   
         }


            public function efetuar_cadastro() {
               
               $query = 'insert into usuarios(email, senha)VALUES(:email, :senha)';
               $stmt = $this->conexao->prepare($query);
               $stmt->bindValue(':email', $this->user->__get('email'));
               $stmt->bindValue(':senha', $this->user->__get('senha'));
               $stmt->execute();
            
            }   

            public function verificar_usuario() {
               
               $query = 'select * from usuarios where email = :email and senha = :senha';
               $stmt = $this->conexao->prepare($query);
               $stmt->bindValue(':email', $this->user->__get('email'));
               $stmt->bindValue(':senha', $this->user->__get('senha'));
               $stmt->execute();
               return $stmt->fetchAll(PDO::FETCH_OBJ);
               
            } 

    }     


?>