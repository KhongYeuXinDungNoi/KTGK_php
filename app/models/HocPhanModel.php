<?php
class HocPhanModel
{
    private $conn;
    private $table_name = "HocPhan";

    public function __construct($db)
    {
        $this->conn = $db;            
    }

    public function getHocPhan()
    {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
}
?>
