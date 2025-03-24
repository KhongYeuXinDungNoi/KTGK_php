<?php include BASE_PATH . '/app/views/shares/header.php'; ?>

<h1>Danh sách sinh viên</h1>
<a href="/ktgk/SinhVien/add" class="btn btn-success mb-2">Thêm sinh viên mới</a>

<ul class="list-group">
<?php foreach ($sinhViens as $sv): ?>
    <li class="list-group-item">
        <h4>
            <a href="/ktgk/SinhVien/show/<?php echo htmlspecialchars($sv->MaSV, ENT_QUOTES, 'UTF-8'); ?>">
                <?php echo htmlspecialchars($sv->HoTen, ENT_QUOTES, 'UTF-8'); ?>
            </a>
        </h4>
        <p>Giới tính: <?php echo htmlspecialchars($sv->GioiTinh, ENT_QUOTES, 'UTF-8'); ?></p>
        <p>Ngày sinh: <?php echo htmlspecialchars($sv->NgaySinh, ENT_QUOTES, 'UTF-8'); ?></p>
        <p>Mã ngành: <?php echo htmlspecialchars($sv->MaNganh, ENT_QUOTES, 'UTF-8'); ?></p>
        <?php if (!empty($sv->Hinh)): ?>
            <p><img src="/ktgk/uploads/<?php echo htmlspecialchars($sv->Hinh, ENT_QUOTES, 'UTF-8'); ?>" 
                    alt="Hình sinh viên" width="100"></p>
        <?php endif; ?>
        <a href="/ktgk/SinhVien/edit/<?php echo htmlspecialchars($sv->MaSV, ENT_QUOTES, 'UTF-8'); ?>" 
           class="btn btn-warning">Sửa</a>
        <a href="/ktgk/SinhVien/delete/<?php echo htmlspecialchars($sv->MaSV, ENT_QUOTES, 'UTF-8'); ?>" 
           class="btn btn-danger" 
           onclick="return confirm('Bạn có chắc chắn muốn xóa sinh viên này?');">Xóa</a>
    </li>
<?php endforeach; ?>
</ul>

<?php include BASE_PATH . '/app/views/shares/footer.php'; ?>
