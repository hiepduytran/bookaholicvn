<!DOCTYPE html>
<html lang="en">

<head>
    <title>Trang chủ</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?=asset('public/app/css/linearicons.css')?>">
    <link rel="stylesheet" href="<?=asset('public/app/css/font-awesome.min.css')?>">
    <link rel="stylesheet" href="<?=asset('public/app/css/magnific-popup.css')?>">
    <link rel="stylesheet" href="<?=asset('public/app/css/nice-select.css')?>">
    <link rel="stylesheet" href="<?=asset('public/app/css/animate.min.css')?>">
    <link rel="stylesheet" href="<?=asset('public/app/css/owl.carousel.css')?>">
    <link rel="stylesheet" href="<?=asset('public/app/css/jquery-ui.css')?>">
    <link rel="stylesheet" href="<?= asset('public/app/css/home.css') ?>">
</head>

<body>
    <header>
        <img class="header-img" src="https://scontent.xx.fbcdn.net/v/t1.15752-9/398453771_1550852109015797_3736781129414547725_n.png?_nc_cat=104&ccb=1-7&_nc_sid=510075&_nc_ohc=hgWcUep1O5EAX9VTVEV&_nc_ad=z-m&_nc_cid=0&_nc_ht=scontent.xx&oh=03_AdTUp-nZg3w1EhL1lp2MnaPc70AUxS4-AC4_dZX0x1x3Ng&oe=65AA1EBD" alt="">
    </header>

    <nav class="navbar navbar-expand-lg bg-white">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Văn học</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Cộng đồng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Giải trí</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Đời sống</a>
                    </li>
                </ul>

                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" name="Search-box" id="Search-box" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>

                <button class="btn">Đăng ký</button>
                <button class="btn">Đăng nhập</button>
            </div>
        </div>
    </nav>