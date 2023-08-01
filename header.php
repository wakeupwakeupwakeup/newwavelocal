<?php

?>
<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>New Wave - организация мероприятий</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta property="og:title" content="">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">

  <!--  <link rel="manifest" href="site.webmanifest"> -->
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="/wp-content/themes/newwave/css/normalize.css">
  <link rel="stylesheet" href="/wp-content/themes/newwave/css/main.css">

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <meta name="theme-color" content="#fafafa">
</head>

<div class="wrapper">
<body>
  <header class="header">
    <a href="/"><img src="/wp-content/themes/newwave/img/logo.png" alt="logo" class="logo"></a>
    <nav class="nav-container">
      <ul class="nav">
        <li class="nav-item"><a href="/" class="nav-link" id="link_main">Главная страница</a></li>
        <li class="nav-item"><a href="/about-us/" class="nav-link" id="link_about_us">О Нас</a></li>
        <li class="nav-item"><a href="" class="nav-link" id="link_blog">Блог</a></li>
        <li class="nav-item"><a href="#" class="nav-link" id="link_footer">Контакты</a></li>
      </ul>
    </nav>
    <div class="header-socials-container">
      <a href="https://t.me/Manager_NewWave" class="container-item"><img src="/wp-content/themes/newwave/img/icons/tg_header_icon.png" alt="" class="socials-icon"></a>
      <a href="" class="container-item"><img src="/wp-content/themes/newwave/img/icons/wa_header_icon.png" alt="" class="socials-icon"></a>
    </div>
    <div class="language">
    <?php
      echo do_shortcode('[gtranslate]');
    ?>
    </div>
    <div class="burger-menu">
      <img src="img/icons/burger_icon.png" alt="" class="burger-icon">
    </div>
    <div class="header_menu">
      <img src="/wp-content/themes/newwave/img/icons/header_menu.png" alt="Menu">
    </div>
  </header>
  <main class="main">

