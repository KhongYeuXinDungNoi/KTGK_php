<?php include BASE_PATH . '/app/views/shares/header.php'; ?>

<?php
// Hiển thị lỗi để debug nếu có
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<h1>Sửa thông tin sinh viên</h1>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<?php if (isset($sinhvien) && $sinhvien): ?>
    <form method="POST" action="/ktgk/SinhVien/update" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($sinhvien->id, ENT_QUOTES, 'UTF-8'); ?>">
        <input type="hidden" name="old_image" value="<?php echo htmlspecialchars($sinhvien->Hinh, ENT_QUOTES, 'UTF-8'); ?>">

        <div class="form-group">
            <label for="MaSV">Mã sinh viên:</label>
            <input type="text" id="MaSV" name="MaSV" class="form-control"
                   value="<?php echo htmlspecialchars($sinhvien->MaSV, ENT_QUOTES, 'UTF-8'); ?>" required>
        </div>

        <div class="form-group">
            <label for="HoTen">Họ tên:</label>
            <input type="text" id="HoTen" name="HoTen" class="form-control"
                   value="<?php echo htmlspecialchars($sinhvien->HoTen, ENT_QUOTES, 'UTF-8'); ?>" required>
        </div>

        <div class="form-group">
            <label>Giới tính:</label><br>
            <label><input type="radio" name="GioiTinh" value="Nam" <?php echo ($sinhvien->GioiTinh === 'Nam') ? 'checked' : ''; ?>> Nam</label>
            <label><input type="radio" name="GioiTinh" value="Nữ" <?php echo ($sinhvien->GioiTinh === 'Nữ') ? 'checked' : ''; ?>> Nữ</label>
        </div>

        <div class="form-group">
            <label for="NgaySinh">Ngày sinh:</label>
            <input type="date" id="NgaySinh" name="NgaySinh" class="form-control"
                   value="<?php echo htmlspecialchars($sinhvien->NgaySinh, ENT_QUOTES, 'UTF-8'); ?>" required>
        </div>

        <div class="form-group">
            <label for="Hinh">Ảnh đại diện:</label><br>
            <?php if (!empty($sinhvien->Hinh)): ?>
                <img src="/ktgk/uploads/<?php echo htmlspecialchars($sinhvien->Hinh, ENT_QUOTES, 'UTF-8'); ?>"
                     alt="Ảnh đại diện" style="width: 120px;"><br>
            <?php endif; ?>
            <input type="file" id="Hinh" name="Hinh" class="form-control-file">
        </div>

        <div class="form-group">
            <label for="MaNganh">Ngành học:</label>
            <select id="MaNganh" name="MaNganh" class="form-control" required>
                <?php if (!empty($nganhs)): ?>
                    <?php foreach ($nganhs as $nganh): ?>
                        <option value="<?php echo htmlspecialchars($nganh['MaNganh'], ENT_QUOTES, 'UTF-8'); ?>"
                            <?php echo ($nganh['MaNganh'] == $sinhvien->MaNganh) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($nganh['TenNganh'], ENT_QUOTES, 'UTF-8'); ?>
                        </option>
                    <?php endforeach; ?>
                <?php else: ?>
                    <option value="">Không có ngành học</option>
                <?php endif; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Lưu thay đổi</button>
        <a href="/ktgk/SinhVien/index" class="btn btn-secondary mt-2">Quay lại danh sách</a>
    </form>
<?php else: ?>
    <p>Không tìm thấy sinh viên.</p>
<?php endif; ?>

<?php include BASE_PATH . '/app/views/shares/footer.php'; ?>
