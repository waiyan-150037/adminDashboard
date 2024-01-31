<?php

namespace Libs\Database;
use PDOException;
class UsersTable{
    private $db=null;

    public function __construct(MySQL $mysql){
        $this->db=$mysql->connect();
    }
    public function checkByNameAndEmail($email,$password){
        try{
        $sql="SELECT * FROM users WHERE email=:email AND password=:password";
        $stmt=$this->db->prepare($sql);
        $stmt->execute([":email"=>$email,":password"=>$password]);
        $user=$stmt->fetch();
        if($user){
            return $user;
        }else{
            return false;
        }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function insert($data){
        try{
            $sql="INSERT INTO users (name,email,phone,address,password,created_at)
            VALUES (:name,:email,:phone,:address,:password,NOW())
            ";
            $stmt=$this->db->prepare($sql);
            $stmt->execute($data);
            return $this->db->lastInsertId();
        }catch(PDOException $e){
            echo $e->getMessage();
            exit();
        }
    }
    public function getAll(){
        try{
            $stmt=$this->db->query("SELECT users.id,users.name,users.email,users.phone,users.password,users.role_id,users.suspended,roles.name AS role FROM users LEFT JOIN roles ON users.role_id=roles.id");
            return $stmt->fetchAll();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        
    }
    public function getRoles(){
        try{
            $sql="SELECT * FROM roles";
            $stmt=$this->db->query($sql);
            return $stmt->fetchAll();
        }catch(PDOException $e){

        }
    }
    public function delete($id){
        try{
            $sql="DELETE FROM users WHERE id=:id";
            $stmt=$this->db->prepare($sql);
            $stmt->execute(["id"=>$id]);
            return $stmt->rowCount();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function suspended($id){
        try{
            $sql="UPDATE users SET suspended=1 WHERE id=:id";
            $stmt=$this->db->prepare($sql);
            $stmt->execute(["id"=>$id]);
            return $stmt->rowCount();
        }catch(PDOException $e){

        }
    }
    public function changeRole($id,$role_id){
        try{
            $sql="UPDATE users SET role_id=:role_id WHERE id=:id";
            $stmt=$this->db->prepare($sql);
            $stmt->execute(["id"=>$id,"role_id"=>$role_id]);
            return $stmt->rowCount();
        }catch(PDOException $e){

        }
    }
    public function unsuspended($id){
        try{
            $sql="UPDATE users SET suspended=0 WHERE id=:id";
            $stmt=$this->db->prepare($sql);
            $stmt->execute(["id"=>$id]);
            return $stmt->rowCount();
        }catch(PDOException $e){

        }
    }
    public function updatePhoto($id,$photo){
        try{
            $sql="UPDATE users SET photo=:photo WHERE id=:id";
            $stmt=$this->db->prepare($sql);
            $stmt->execute(["id"=>$id,"photo"=>$photo]);
            return $stmt->rowCount();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}