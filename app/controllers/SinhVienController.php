<?php
require_once (BASE_PATH . '/app/models/SinhVienModel.php');
require_once (BASE_PATH . '/app/config/database.php');


class SinhVienController {
    private $sinhVienModel;
    private $db;

    public function __construct() {
        $this->db=(new Database())->getConnection();
        $this->sinhVienModel = new SinhVienModel($this->db);
    }

    // Hiển thị danh sách sinh viên
    public function index() {
        $sinhViens = $this->sinhVienModel->getAllSinhVien();
        include BASE_PATH . '/app/views/sinhvien/list.php';
    }

    public function show($id)
    {
        $sinhvien = $this->sinhVienModel->getSinhVienByMaSV($id);
        if ($sinhvien) {
            include 'app/views/sinhvien/show.php';
        }else{
            echo "Không tìm thấy sinh viên";
        }
    }

    public function add()
    {
        $nganhhoc = (new NganhHocModel($this->db))->getNganhHoc();
        include_once BASE_PATH . '/app/views/sinhvien/add.php';
    }


    public function delete($id)
    {
        if ($this->sinhVienModel->deleteSinhVien($id)) {
            header('Location: /public/index.php?controller=Product&action=index');
        } else {
            echo "Đã có lỗi xảy ra khi xóa sản phẩm";
        }
        
    }
}
?>
