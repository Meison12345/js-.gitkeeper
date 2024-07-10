<!DOCTYPE html>
<html lang="ru">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="style/normalize.css" rel="stylesheet" type="text/css">
    <link href="style/style.css" rel="stylesheet" type="text/css">
    <link href="style/effect.css" rel="stylesheet" type="text/css">
    <link href="style/adaptive.css" rel="stylesheet" type="text/css">
    <title>Галактический вестник</title>
    <link rel="shortcut icon" href="img/logo.ico" type="image/x-icon">
    <!-- <script src="js/test.js"></script> -->
</head>

<body>
<header class="center header">
    <nav class="header-nav">
        <a href="index.php">
            <img src="img/logo.svg" alt="Лого сайта" width="390" height="74">
        </a>
        <ul>
            <?php 
                require 'menu.php';
                foreach ($a as $v){?>
                <li><a href='<?= $v["link"]?>'><?= $v["text"]?></a></li>
                <?}?>
            
            <!-- <li><a href="$k"></a> -->

            <!-- echo "<li><a href=$k.php>$v</a></li>"; -->
        
            <!-- li><a href="index.php">Главная</a></li>
            <li><a href="index.php">Главная</a></li> -->
        </ul>
              
    </nav>
</header>