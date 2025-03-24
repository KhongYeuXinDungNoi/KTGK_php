<?php include BASE_PATH . '/app/views/shares/header.php'; ?>

<h1>Danh sách học phần</h1>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Mã học phần</th>
            <th>Tên học phần</th>
            <th>Số tín chỉ</th>
            <th>Thao tác</th>

        </tr>
    </thead>
    <tbody>
        <?php foreach ($hocphans as $hocphan): ?>
            <tr>
                <td><?php echo htmlspecialchars($hocphan->MaHP); ?></td>
                <td><?php echo htmlspecialchars($hocphan->TenHP); ?></td>
                <td><?php echo htmlspecialchars($hocphan->SoTinChi); ?></td>
                <td>
                    <button type="submit" class="btn btn-success btn-sm">Đăng ký</button>
                </td>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include BASE_PATH . '/app/views/shares/footer.php'; ?>
