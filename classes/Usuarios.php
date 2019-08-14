<?php

class Usuarios {

    public function getInfo($id){
        global $pdo;

        $sql = $pdo->prepare("SELECT * FROM usuarios WHERE  id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $sql = $sql->fetch();

            return $sql;
        }else{

            return array();
        }
    }

    public function cadastrar($nome, $login, $senha, $status){
        global $pdo;

        if ($this->existeUsuario($login) == true){

            $sql = $pdo->prepare("INSERT INTO usuarios (nome, login, senha, status) VALUES (:nome, :login, :senha, :status)");
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':login', $login);
            $sql->bindValue(':senha', md5($senha));
            $sql->bindValue(':status', $status);
            $sql->execute();
            
            return true;
            
        }else{

            return false;
        }
    }

    public function editar($nome, $login, $senha, $status, $id){
        global $pdo;

            $sql = $pdo->prepare("UPDATE usuarios SET nome = :nome, login = :login, senha = :senha, status = :status WHERE id = :id");
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':login', $login);
            $sql->bindValue(':senha', md5($senha));
            $sql->bindValue(':status', $status);
            $sql->bindValue(':id', $id);
            $sql->execute();

            return true;

    }

    public function excluir($id){
        global $pdo;

        $sql = $pdo->prepare("DELETE FROM usuarios WHERE id = :id ");
        $sql->bindValue(':id', $id);  
        $sql->execute();  

        return true;
    }

    private function existeUsuario($login){

        global $pdo;

        $sql = $pdo->prepare("SELECT * FROM usuarios WHERE login = :login");
        $sql->bindValue(':login', $login);
        $sql->execute();

        if ($sql->rowCount() == 0){

            return true;

        }else{

            return false;
        }
    }

    public function login($login, $senha){
        global $pdo;

        $sql = $pdo->prepare("SELECT * FROM usuarios WHERE login = :login AND senha = :senha AND status = 1");
        $sql->bindValue(':login', $login);        
        $sql->bindValue(':senha', md5($senha));
        $sql->execute();

        if($sql->rowCount() > 0){
            $dados = $sql->fetch();

            $_SESSION['devpro'] = $dados['id'];

            return true;
        }else{

            return false;
        }
    }

    public function filtros($filtros){
        global $pdo;

        $array =array();

        $filtrosstring = array('1=1');
        if(!empty($filtros['nome'])){
            $filtrosstring[] = 'nome = :nome';
        }
        if(!empty($filtros['status'])){
            $filtrosstring[] = 'status = :status';
        }

        $sql = $pdo->prepare("SELECT * FROM usuarios WHERE ".implode(' AND ', $filtrosstring));
        
        if(!empty($filtros['nome'])){
            $sql->bindValue(':nome', $filtros['nome']);
        }
        if(!empty($filtros['status'])){
            $sql->bindValue(':status', $filtros['status']);
        }

        $sql->execute();

        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
        }

        return $array;
    }
}