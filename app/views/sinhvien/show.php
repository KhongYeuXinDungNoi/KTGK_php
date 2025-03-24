<?php include BASE_PATH . '/app/views/shares/header.php'; ?>

<?php
// Hiển thị lỗi để debug nếu cần
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<h1>Chi tiết sinh viên</h1>

<?php if (isset($sinhvien) && $sinhvien): ?>
    <div class="form-group">
        <label>Mã sinh viên:</label>
        <input type="text" class="form-control" value="<?php echo htmlspecialchars($sinhvien->MaSV, ENT_QUOTES, 'UTF-8'); ?>" disabled>
    </div>

    <div class="form-group">
        <label>Họ tên:</label>
        <input type="text" class="form-control" value="<?php echo htmlspecialchars($sinhvien->HoTen, ENT_QUOTES, 'UTF-8'); ?>" disabled>
    </div>

    <div class="form-group">
        <label>Giới tính:</label><br>
        <input type="text" class="form-control" value="<?php echo htmlspecialchars($sinhvien->GioiTinh, ENT_QUOTES, 'UTF-8'); ?>" disabled>
    </div>

    <div class="form-group">
        <label>Ngày sinh:</label>
        <input type="date" class="form-control" value="<?php echo htmlspecialchars($sinhvien->NgaySinh, ENT_QUOTES, 'UTF-8'); ?>" disabled>
    </div>

    <div class="form-group">
        <label>Ảnh đại diện:</label><br>
        <?php if (!empty($sinhvien->Hinh)): ?>
            <img src="/ktgk/uploads/<?php echo htmlspecialchars($sinhvien->Hinh, ENT_QUOTES, 'UTF-8'); ?>" 
                 alt="Ảnh đại diện" style="width: 120px; border: 1px solid #ccc; padding: 5px;"><br>
        <?php else: ?>
            <p>Không có ảnh đại diện</p>
        <?php endif; ?>
    </div>


    <a href="/ktgk/SinhVien/index" class="btn btn-secondary mt-2">Quay lại danh sách</a>
<?php else: ?>
    <p>Không tìm thấy sinh viên.</p>
<?php endif; ?>

<?php include BASE_PATH . '/app/views/shares/footer.php'; ?>
