<?php
include_once 'class.db.php';
class model extends db{
    public function insert($pm,$localtion){
        $sql = "INSERT INTO `recorddata`(`sensor`, `location_id`) VALUES (:sensor, :location_id)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":sensor",         $pm,        PDO::PARAM_STR);
        $stmt->bindValue(":location_id",    $localtion,   PDO::PARAM_INT);
        return $stmt->execute();
    }
    public function showPM($localtion){
        $sql = "SELECT sensor FROM recorddata WHERE location_id = {$localtion} ORDER BY id DESC LIMIT 1";
        $sensor = $this->db->query($sql)->fetchall(PDO::FETCH_ASSOC);
        return $sensor;
    }
}
?>