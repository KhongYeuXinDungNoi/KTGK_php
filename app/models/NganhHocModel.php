<?php
class NganhHocModel
{
    private $conn;
    private $table_name = "NganhHoc";

    public function __construct($db)
    {
        $this->conn = $db;            
    }

    public function getNganhHoc()
    {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
}
?>
