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
            include BASE_PATH . '/app/views/sinhvien/show.php';
        }else{
            echo "Không tìm thấy sinh viên";
        }
    }

    public function add()
    {
        $nganhhoc = (new NganhHocModel($this->db))->getNganhHoc();
        include_once BASE_PATH . '/app/views/sinhvien/add.php';
    }


    public function store() {
        $errors = [];

        // Lấy dữ liệu từ form
        $MaSV = $_POST['MaSV'] ?? '';
        $HoTen = $_POST['HoTen'] ?? '';
        $GioiTinh = $_POST['GioiTinh'] ?? '';
        $NgaySinh = $_POST['NgaySinh'] ?? '';
        $MaNganh = $_POST['MaNganh'] ?? '';

        // Kiểm tra dữ liệu
        if (empty($MaSV)) $errors[] = "Mã sinh viên không được để trống";
        if (empty($HoTen)) $errors[] = "Họ tên không được để trống";
        if (empty($GioiTinh)) $errors[] = "Giới tính không được để trống";
        if (empty($NgaySinh)) $errors[] = "Ngày sinh không được để trống";
        if (empty($MaNganh)) $errors[] = "Mã ngành không được để trống";

        // Xử lý upload hình ảnh
        $Hinh = '';
        if (isset($_FILES['Hinh']) && $_FILES['Hinh']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = BASE_PATH . '/public/uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $fileTmpPath = $_FILES['Hinh']['tmp_name'];
            $fileName = basename($_FILES['Hinh']['name']);
            $destPath = $uploadDir . $fileName;

            if (move_uploaded_file($fileTmpPath, $destPath)) {
                $Hinh = '/public/uploads/' . $fileName; 
            } else {
                $errors[] = "Lỗi khi tải ảnh lên";
            }
        }

        if (!empty($errors)) {
            include BASE_PATH . '/app/views/sinhvien/add.php';
            return;
        }

        // Lưu vào CSDL
        $result = $this->sinhVienModel->addSinhVien($MaSV, $HoTen, $GioiTinh, $NgaySinh, $Hinh, $MaNganh);
        if ($result) {
            header('Location: /SinhVien/index');
            exit;
        } else {
            $errors[] = "Thêm sinh viên thất bại";
            include BASE_PATH . '/app/views/sinhvien/add.php';
        }
    }

    public function edit($id)
    {
        $sinhvien = $this->sinhVienModel->getSinhVienByMaSV($id);
        $nganhs = (new NganhHocModel($this->db))->getNganhHoc();

        if ($sinhvien) {
            include BASE_PATH . '/app/views/sinhvien/edit.php';
        } else {
            echo "Không tìm thấy sinh viên.";
        }
    }


    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? '';
            $MaSV = $_POST['MaSV'] ?? '';
            $HoTen = $_POST['HoTen'] ?? '';
            $GioiTinh = $_POST['GioiTinh'] ?? '';
            $NgaySinh = $_POST['NgaySinh'] ?? '';
            $MaNganh = $_POST['MaNganh'] ?? '';

            $errors = [];

            if (empty($MaSV)) $errors[] = "Mã sinh viên không được để trống";
            if (empty($HoTen)) $errors[] = "Họ tên không được để trống";
            if (empty($GioiTinh)) $errors[] = "Giới tính không được để trống";
            if (empty($NgaySinh)) $errors[] = "Ngày sinh không được để trống";
            if (empty($MaNganh)) $errors[] = "Mã ngành không được để trống";

            $Hinh = $_POST['old_image'] ?? ''; // Hình cũ

            if (isset($_FILES['Hinh']) && $_FILES['Hinh']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = BASE_PATH . '/public/uploads/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                $fileTmpPath = $_FILES['Hinh']['tmp_name'];
                $fileName = basename($_FILES['Hinh']['name']);
                $destPath = $uploadDir . $fileName;

                if (move_uploaded_file($fileTmpPath, $destPath)) {
                    $Hinh = '/public/uploads/' . $fileName;
                } else {
                    $errors[] = "Lỗi khi tải ảnh lên";
                }
            }

            if (!empty($errors)) {
                $sinhvien = $this->sinhVienModel->getSinhVienByMaSV($id);
                $nganhs = (new NganhHocModel($this->db))->getNganhHoc();
                include BASE_PATH . '/app/views/sinhvien/edit.php';
                return;
            }

            $result = $this->sinhVienModel->updateSinhVien($id, $MaSV, $HoTen, $GioiTinh, $NgaySinh, $Hinh, $MaNganh);

            if ($result) {
                header('Location: /ktgk/SinhVien/index');
                exit;
            } else {
                echo "Đã xảy ra lỗi khi cập nhật sinh viên.";
            }
        }
    }


    public function delete($id) {
        if ($this->sinhVienModel->deleteSinhVien($id)) {
            header('Location: /ktgk/SinhVien/index');
        } else {
            echo "Đã có lỗi xảy ra khi xóa sinh viên";
        }
    }
}
?>
