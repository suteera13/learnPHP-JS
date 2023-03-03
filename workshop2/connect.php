<?php
    class connect{
        protected $db;
        public function __construct(){
            $this->connectdb();
        }
        public function connectdb(){
            define("user","root");
            define("pass","");
            define("config","mysql:host=localhost; dbname=workshop; charset=utf8");
            try{
                echo "cennect<br>";
                $this->db = new PDO(config,user,pass);
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOExection $e){
                echo $e->getMessage();
            }
        }
        public function insert($name, $pass){
            $check = "SELECT*FROM member WHERE mem_name = :name";
            $chu = $this->db->prepare($check);
            $chu->bindParam(':name', $name , PDO::PARAM_STR);
            $chu->execute();
            if($chu->rowCount()==1){
                $mes = "Registration fail ! This username has already been used.";
            }else{
                $mes = "Registration successful.";
                $sql = "INSERT INTO `member`(`mem_name`, `mem_pass`) VALUES (:user, :pass)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindValue(":user", $name, PDO::PARAM_STR);
                $stmt->bindValue(":pass", $pass, PDO::PARAM_STR);
                $stmt->execute();
            }
            return $mes;
        }
        public function checkLogin($name, $pass){
            $sql = "SELECT*FROM member WHERE mem_name = :user and mem_pass = :pass ";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':user', $name , PDO::PARAM_STR);
            $stmt->bindParam(':pass', $pass , PDO::PARAM_STR);
            $stmt->execute();
            if($stmt->rowCount()==1){
                return 1;
            }
            
        }
    }
?>