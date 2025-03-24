<?php
class SinhVienModel {
    private $conn;
    private $table_name = "SinhVien";

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getAllSinhVien() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function getSinhVienByMaSV($maSV) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE MaSV = :maSV";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':maSV', $maSV);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    public function addSinhVien($maSV, $hoTen, $gioiTinh, $ngaySinh, $hinh, $maNganh) {
        $errors = [];
        if (empty($maSV)) {
            $errors['MaSV'] = 'Mã sinh viên không được để trống';
        }
        if (empty($hoTen)) {
            $errors['HoTen'] = 'Họ tên không được để trống';
        }
        if (empty($gioiTinh)) {
            $errors['GioiTinh'] = 'Giới tính không được để trống';
        }
        if (empty($ngaySinh)) {
            $errors['NgaySinh'] = 'Ngày sinh không được để trống';
        }
        if (empty($maNganh)) {
            $errors['MaNganh'] = 'Mã ngành không được để trống';
        }

        if (count($errors) > 0) {
            return $errors;
        }

        $query = "INSERT INTO " . $this->table_name . " 
        (MaSV, HoTen, GioiTinh, NgaySinh, Hinh, MaNganh) 
        VALUES (:maSV, :hoTen, :gioiTinh, :ngaySinh, :hinh, :maNganh)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':maSV', $maSV);
        $stmt->bindParam(':hoTen', $hoTen);
        $stmt->bindParam(':gioiTinh', $gioiTinh);
        $stmt->bindParam(':ngaySinh', $ngaySinh);
        $stmt->bindParam(':hinh', $hinh);
        $stmt->bindParam(':maNganh', $maNganh);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function updateSinhVien($maSV, $hoTen, $gioiTinh, $ngaySinh, $hinh, $maNganh) {
        $query = "UPDATE " . $this->table_name . " 
        SET HoTen = :hoTen, GioiTinh = :gioiTinh, NgaySinh = :ngaySinh, Hinh = :hinh, MaNganh = :maNganh 
        WHERE MaSV = :maSV";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':maSV', $maSV);
        $stmt->bindParam(':hoTen', $hoTen);
        $stmt->bindParam(':gioiTinh', $gioiTinh);
        $stmt->bindParam(':ngaySinh', $ngaySinh);
        $stmt->bindParam(':hinh', $hinh);
        $stmt->bindParam(':maNganh', $maNganh);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function deleteSinhVien($maSV) {
        $query = "DELETE FROM " . $this->table_name . " WHERE MaSV = :maSV";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':maSV', $maSV);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
