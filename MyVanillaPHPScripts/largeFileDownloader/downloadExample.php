<?php

require "LargeFileDownloader.php";


$url = "https://coderbooks.ru/media/PHP%208_%20объекты%2C%20шаблоны%20и%20методики%20программирования.%206%20изд/php-8-obekty-shablony-i-metod_ZJtCsl8.pdf";
$downloader = new LargeFileDownloader($url, "php8objects.pdf");
$downloader->download();