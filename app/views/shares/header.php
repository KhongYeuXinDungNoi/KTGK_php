<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sinh viên</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/ktgk/public/index.php?controller=SinhVien&action=index">Quản lý sinh viên</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" 
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/ktgk/public/index.php?controller=SinhVien&action=index">Danh sách sinh viên</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/ktgk/public/index.php?controller=SinhVien&action=add">Thêm sinh viên</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/ktgk/public/index.php?controller=HocPhan&action=index">Danh sách học phần</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/ktgk/public/index.php?controller=HocPhan&action=add">Thêm học phần</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/ktgk/public/index.php?controller=User&action=login">Đăng nhập</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container mt-4">
