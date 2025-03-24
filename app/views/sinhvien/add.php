<?php include BASE_PATH . '/app/views/shares/header.php'; ?>

<h2>THÊM SINH VIÊN</h2>
<p>SinhVien</p>

<form action="/ktgk/SinhVien/store" method="POST" enctype="multipart/form-data">
    <div>
        <label for="MaSV">MaSV</label>
        <input type="text" name="MaSV" />
    </div>
    <div>
        <label for="HoTen">HoTen</label>
        <input type="text" name="HoTen" />
    </div>
    <div>
        <label for="GioiTinh">GioiTinh</label>
        <input type="text" name="GioiTinh" />
    </div>
    <div>
        <label for="NgaySinh">NgaySinh</label>
        <input type="text" name="NgaySinh" />
    </div>
    <div>
        <label for="Hinh">Hinh</label>
        <input type="file" name="Hinh" />
    </div>
    <div>
        <label for="MaNganh">MaNganh</label>
        <input type="text" name="MaNganh" />
    </div>
    <div>
        <input type="submit" value="Create" />
    </div>
</form>

<p><a href="/ktgk/SinhVien/index">Back to List</a></p>

<?php include BASE_PATH . '/app/views/shares/footer.php'; ?>
