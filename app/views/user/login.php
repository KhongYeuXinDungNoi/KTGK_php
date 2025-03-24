<?php include BASE_PATH . '/app/views/shares/header.php'; ?>

<h2>Đăng nhập</h2>

<?php if (!empty($error)): ?>
    <div class="alert alert-danger"><?php echo $error; ?></div>
<?php endif; ?>

<form method="post" action="/ktgk/public/index.php?controller=User&action=login">
    <div class="form-group">
        <label>Tên đăng nhập</label>
        <input type="text" name="username" class="form-control" placeholder="Nhập tên đăng nhập">
    </div>
    <div class="form-group">
        <label>Mật khẩu</label>
        <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu">
    </div>
    <button type="submit" class="btn btn-primary">Đăng nhập</button>
</form>

<?php include BASE_PATH . '/app/views/shares/footer.php'; ?>
