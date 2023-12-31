<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $setting['title'] ?></title>
    <link rel="icon" href="<?= $setting['icon'] ?>" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= asset('public/app/css/linearicons.css') ?>">
    <link rel="stylesheet" href="<?= asset('public/app/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('public/app/css/magnific-popup.css') ?>">
    <link rel="stylesheet" href="<?= asset('public/app/css/nice-select.css') ?>">
    <link rel="stylesheet" href="<?= asset('public/app/css/animate.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('public/app/css/owl.carousel.css') ?>">
    <link rel="stylesheet" href="<?= asset('public/app/css/jquery-ui.css') ?>">
    <link rel="stylesheet" href="<?= asset('public/app/css/home.css') ?>">
</head>

<body>
    <header>
        <?php if (!empty($bodyBanner)) { ?>
            <img class="header-img" src="<?= asset($bodyBanner['image']) ?>" alt="">
        <?php } else { ?>
            <img class="header-img" src="https://scontent.xx.fbcdn.net/v/t1.15752-9/398453771_1550852109015797_3736781129414547725_n.png?_nc_cat=104&ccb=1-7&_nc_sid=510075&_nc_ohc=hgWcUep1O5EAX9VTVEV&_nc_ad=z-m&_nc_cid=0&_nc_ht=scontent.xx&oh=03_AdTUp-nZg3w1EhL1lp2MnaPc70AUxS4-AC4_dZX0x1x3Ng&oe=65AA1EBD" alt="">
        <?php } ?>
    </header>

    <!-- Connect to db -->
    <?php

    use database\DataBase;
    ?>

    <nav class="navbar navbar-expand-lg bg-white">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="font-weight: 700; text-transform: uppercase;">
                    <?php foreach ($menus as $menu) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $menu['url'] ?>"><?= $menu['name'] ?></a>
                        </li>
                    <?php } ?>
                    <?php
                    $db = new DataBase();
                    $categories = $db->select("SELECT * FROM categories")->fetchAll();
                    ?>

                    <?php
                    // Get current route
                    $currentUrl = $_SERVER['REQUEST_URI'];
                    $urlParts = explode('/', trim($currentUrl, '/'));

                    // Get id is last item of array
                    $categoryId = end($urlParts);

                    // Get id
                    $selectedCategoryId = is_numeric($categoryId) ? $categoryId : null;
                    ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="categoryDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            DANH MỤC
                        </a>
                        <div class="dropdown-menu" aria-labelledby="categoryDropdown">
                            <?php foreach ($categories as $category) { ?>
                                <a class="dropdown-item <?php echo ($category['id'] == $selectedCategoryId) ? 'active' : ''; ?>" href="<?= url('show-category/' . $category['id']) ?>">
                                    <?= $category['name'] ?>
                                </a>
                            <?php } ?>
                        </div>
                    </li>
                </ul>

                <form class="d-flex" role="search" action="<?= url('search') ?>">
                    <input class="form-control me-2" type="search" name="Search-box" id="Search-box" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit" style="white-space: nowrap;">Tìm kiếm</button>
                </form>

                <!-- Processing login, logout -->
                <?php if (isset($_SESSION['user'])) {
                    $db = new DataBase();
                    $userInfo = $db->select("SELECT username, email FROM users WHERE id = ?", [$_SESSION['user']])->fetch();

                    if ($userInfo) { ?>
                        <ul class="navbar-nav ms-5">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle me-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?= $userInfo['username'] ?>
                                </a>
                                <ul class="dropdown-menu" style="min-width: 7rem;">
                                    <li><a class="dropdown-item" href="<?= url('logout') ?>">Đăng xuất</a></li>
                                </ul>
                            </li>
                        </ul>
                    <?php
                    }
                } else {
                    ?>
                    <button class="btn"><a href="<?= url('register') ?>">Đăng ký</a></button>
                    <button class="btn"><a href="<?= url('login') ?>">Đăng nhập</a></button>
                <?php
                }
                ?>
            </div>
        </div>
    </nav>