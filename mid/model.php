<?php
class product{
    public $db;
    private $product_id;
    private $product_name;
    private $price;
    private $quantity;
    const value = "Value";
    public function __construct(){
        define("USER","user");
        define("PASS","@FmjEoMoeg2*.-at");
        define("CON","mysql:host=localhost; dbname=workshop1; charset=utf8");
        echo "test<br>";
        echo product::value."<br>";
        try{
            $this->db = new PDO(CON,USER,PASS);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(\PDOException $e){
            echo $e->getMessage();
        }
    }
    public function closeConnect(){
        $this->db = null;
    }
    public function insert($id,$name,$price,$qty){
        $sql = "INSERT INTO product(product_id, product_name, price, qty) 
        VALUES (:Product_id, :Product_name, :price, :qty)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":Product_id",     $id,      PDO::PARAM_INT);
        $stmt->bindValue(":Product_name",   $name,    PDO::PARAM_STR);
        $stmt->bindValue(":price",          $price,   PDO::PARAM_INT);
        $stmt->bindValue(":qty",            $qty,     PDO::PARAM_INT);
        return $stmt->execute();
    }
    public function update($id,$name,$price,$qty){
        // echo $id." ".$name." ".$price." ".$qty."<br>";
        $sql = "UPDATE product SET product_id = {$id},
                product_name = '{$name}', price = {$price}, qty = {$qty}
                WHERE product_id = {$id}";
        echo $sql;
        $stmt = $this->db->prepare($sql);
        return $stmt->execute();
        // $command = "UPDATE product SET";
        // $i = 0;
        // foreach($field as $idx => $value){
        //     if($value != null){
        //         $command .= ($i==0?"{$idx}={$value}":", {$idx}={$value}");
        //         $i++;
        //     }
        // }
        // $command .= " WHERE product_id = {$pid}";
        // echo $command;
        // $this->db->exec($command);
    }
    public function delete($id){
        $sql = "DELETE FROM product WHERE product_id = :Product_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":Product_id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    public function getProductbyID($id){
        $sql = "SELECT *FROM product WHERE product_id = ?";
        // echo $sql;
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        // print_r($data);
        return $res;
    }
    public function product_list(){
        $sql = "SELECT * FROM product";
        $res = $this->db->query($sql);
        return $res->fetchall(PDO::FETCH_ASSOC);
    }
}
?>