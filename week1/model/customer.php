<?php
include_once 'db.php';
class customer extends db{
    public function addcustomer($opt){
        $sql = "INSERT INTO `customer_info`(`cus_name`, `addres`, `tel_no`, `cus_type`) 
        VALUES (:cus_name, :address, :tel_no, :cus_type)";
        $stmt = $this->db->prepare($sql);
        $data = [':cus_name'    => $opt["cus_name"],
                 ':address'     => $opt["address"],
                 ':tel_no'      => $opt["tel_no"],
                 ':cus_type'    => $opt["cus_type"]
                ];
        // $stmt->execute($data);
        return ($stmt->execute($data)?1:0);
    }
    public function getall(){
        return $this->db->query("SELECT * FROM customer_info")->fetchall(PDO::FETCH_ASSOC);
    }
}
?>