<?php include BASE_PATH . '/app/views/shares/header.php'; ?>

<h1>Thêm sinh viên mới</h1>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form method="POST" action="/ktgk/public/index.php?controller=SinhVien&action=store" enctype="multipart/form-data">
    <div class="form-group">
        <label for="MaSV">Mã sinh viên:</label>
        <input type="text" id="MaSV" name="MaSV" class="form-control" required>
    </div>
    
    <div class="form-group">
        <label for="HoTen">Họ tên:</label>
        <input type="text" id="HoTen" name="HoTen" class="form-control" required>
    </div>
    
    <div class="form-group">
        <label for="GioiTinh">Giới tính:</label>
        <input type="text" id="GioiTinh" name="GioiTinh" class="form-control" required>
    </div>
    
    <div class="form-group">
        <label for="NgaySinh">Ngày sinh:</label>
        <input type="date" id="NgaySinh" name="NgaySinh" class="form-control" required>
    </div>
    
    <div class="form-group">
        <label for="Hinh">Hình:</label>
        <input type="file" id="Hinh" name="Hinh" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="MaNganh">Mã ngành:</label>
        <input type="text" id="MaNganh" name="MaNganh" class="form-control" required>
    </div>
    
    <button type="submit" class="btn btn-primary">Thêm sinh viên</button>
</form>

<a href="/ktgk/SinhVien/index" class="btn btn-secondary mt-2">Quay lại danh sách sinh viên</a>

<?php include BASE_PATH . '/app/views/shares/footer.php'; ?>
