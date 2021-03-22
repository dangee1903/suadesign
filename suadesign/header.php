<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Grunt</title>
    <link rel="icon" href="">
    <meta name="title" content="" />
    <meta name="description" content="" />
    <meta property="og:locale" content="vi" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Trang chủ" />
    <meta property="og:description" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:image" content="" />

    <?php wp_head()?>
</head>
<body>
<header>
    <div class="container">
        <div class="logo">
            <a href="/"><img src="<?php echo SUA_THEME_IMG_URL?>/sua_design.svg" alt="">SUA</a>
            <h1 class="hidden">SUA DESIGN</h1>
        </div>
        <ul class="menu">
            <li><a href="">Trang chủ</a></li>
            <li><a href="">Blog</a></li>
            <li><a href="">Dịch vụ</a></li>
            <li><a href="">Liên hệ</a></li>
        </ul>
        <div class="search">
            <form action="">
                <input type="text" placeholder="Tìm kiếm ...">
                <button type="submit"><img src="<?php echo SUA_THEME_IMG_URL?>/search.png" alt=""></button>
            </form>
        </div>
        <button id="btn-hamburger">
            <div class="line-1"></div>
            <div class="line-2"></div>
            <div class="line-3"></div>
            </button>
    </div>
</header>