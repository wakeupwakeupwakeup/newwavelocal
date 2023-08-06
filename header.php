<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <title>New Wave - организация мероприятий</title>
    <meta name="description" content="Планируйте незабываемый отдых в Пхукете с нашими туристическими услугами. Исследуйте красивые пляжи, роскошные курорты и захватывающие природные достопримечательности. Забронируйте сейчас и окунитесь в удивительный мир Таиланда">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <meta property="og:title" content="New Wave - организация мероприятий в Пхукете">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://newwave-tour.com/">
    <meta property="og:image" content="https://newwave-tour.com/wp-content/uploads/2023/07/IMG_2976.jpg">

    <link rel="apple-touch-icon" href="/wp-content/themes/newwave/apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    <link rel="stylesheet" href="/wp-content/themes/newwave/css/normalize.css">
    <link rel="stylesheet" href="/wp-content/themes/newwave/css/main.css">
    <link rel="stylesheet" href="/wp-content/themes/newwave/css/burger.css">
    <link rel="stylesheet" href="/wp-content/themes/newwave/css/templates-css/service-banner.css">

    <script>
      function toggleMenu() {
        var menu = $(".menu");
        menu.slideToggle(200);
      }

      function contactsClick() {
        $(".menu").slideUp(200);
      }

      function getPagesSliderSettings(){
        return {
          speed: 350,
          slidesToShow: 4,
          slidesToScroll: 1,
          variableWidth: true,
          infinite: false,
          arrows: false,
          responsive: [
        {
          breakpoint: 1200, // 910
          settings: {
            infinite: true,
            mobileFirst: true,
            slidesToShow: 3,
            slidesToScroll: 3
          }
        },
        {
          breakpoint: 910,
          settings: {
            infinite: true,
            mobileFirst: true,
            centerMode: true,
            centerPadding: "0",
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }],
        }
      }

      function getServicesSliderSettings(show_num){
        return {
          speed: 350,
          slidesToShow: show_num,
          slidesToScroll: 3,
          prevArrow: '#services_slider_left',
          nextArrow: '#services_slider_right',
          infinite: true,
          responsive: [{
          breakpoint: 1920,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
          }
        },
        {
          breakpoint: 1220,
          settings: {
            variableWidth: true,
            centerMode: true,
            centerPadding: "0",
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 700,
          settings: {
            infinite: true,
            variableWidth: true,
            centerMode: true,
            centerPadding: "0",
            slidesToShow: 1,
            slidesToScroll: 1,
          }
        }],
        }
      }

      function getReviewsSliderSettings(){
        return {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          speed: 350,
          prevArrow: '#reviews_slider_left',
          nextArrow: '#reviews_slider_right',
          responsive: [
        {
          breakpoint: 1140,
          settings: {
            variableWidth: true,
            centerMode: true,
            centerPadding: "0",
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 580,
          settings: {
            variableWidth: false,
            centerMode: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 10000,
          }
        }],
        }
      }

      function getRelatedArticlesSliderSettings() {
          return {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true,
              speed: 350,
              arrows: false,
              responsive: [
                  {
                      breakpoint: 1280,
                      settings: {
                          slidesToShow: 1,
                          slidesToScroll: 1,
                          variableWidth: true,
                          centerMode: true,
                          centerPadding: "0",
                      }
                  },
                  {
                      breakpoint: 580,
                      settings: {
                          slidesToShow: 1,
                          slidesToScroll: 1,
                          variableWidth: true,
                          centerMode: true,
                          centerPadding: "0",
                          autoplay: true,
                          autoplaySpeed: 10000,
                      }
                  }],
          }
      }
        </script>

    <meta name="theme-color" content="#fafafa">
    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" height="0" width="0">
      <defs>
        <filter id="svg_romance_hover">
          <feColorMatrix type="matrix" values="1 0 0 0 0   0 0 0 0 0   0 0 0 0 0   0 0 0 1 0" />
          <feComponentTransfer color-interpolation-filters="sRGB">
            <feFuncR type="table" tableValues="0 0.89" />
            <feFuncG type="table" tableValues="0 0.1" />
            <feFuncB type="table" tableValues="0 0.1" />
          </feComponentTransfer>
        </filter>
        <filter id="svg_extreme_hover">
          <feColorMatrix type="matrix" values="1 0 0 0 0   0 0 0 0 0   0 0 0 0 0   0 0 0 1 0" />
          <feComponentTransfer color-interpolation-filters="sRGB">
            <feFuncR type="table" tableValues="1 1" />
            <feFuncG type="table" tableValues="0.5647 0.5647" />
            <feFuncB type="table" tableValues="0 0" />
          </feComponentTransfer>
        </filter>
        <filter id="svg_culture_hover">
          <feColorMatrix type="matrix" values="1 0 0 0 0   0 1 0 0 0   0 0 1 0 0   0 0 0 1 0" />
          <feComponentTransfer color-interpolation-filters="sRGB">
            <feFuncR type="table" tableValues="0 0.12156862745098039 0.12156862745098039" />
            <feFuncG type="table" tableValues="0.8431372549019608 0.8431372549019608 0.8431372549019608" />
            <feFuncB type="table" tableValues="1 1 1" />
          </feComponentTransfer>
        </filter>
        <filter id="svg_nature_hover">
          <feColorMatrix type="matrix" values="1 0 0 0 0   0 1 0 0 0   0 0 1 0 0   0 0 0 1 0" />
          <feComponentTransfer color-interpolation-filters="sRGB">
            <feFuncR type="table" tableValues="0.3176470588235294 0.3176470588235294 0.3176470588235294" />
            <feFuncG type="table" tableValues="0.8549019607843137 0.8549019607843137 0.8549019607843137" />
            <feFuncB type="table" tableValues="0.023529411764705882 0.023529411764705882 0.023529411764705882" />
          </feComponentTransfer>
        </filter>
        <filter id="svg_luxury_hover">
          <feColorMatrix type="matrix" values="1 0 0 0 0   0 1 0 0 0   0 0 1 0 0   0 0 0 1 0" />
          <feComponentTransfer color-interpolation-filters="sRGB">
            <feFuncR type="table" tableValues="1 1 1" />
            <feFuncG type="table" tableValues="0.8941176470588236 0.8941176470588236 0.8941176470588236" />
            <feFuncB type="table" tableValues="0 0 0" />
          </feComponentTransfer>
        </filter>
      </defs>
    </svg>
</head>


<body>
    <div class="wrapper">
      <header class="header">
        <a href="/"><img src="/wp-content/themes/newwave/img/logo.png" alt="logo" class="logo"></a>
        <nav class="nav-container">
          <ul class="nav">
            <li class="nav-item"><a href="/" class="nav-link" id="link_main">Главная страница</a></li>
            <li class="nav-item"><a href="/about-us/" class="nav-link" id="link_about_us">О Нас</a></li>
            <li class="nav-item"><a href="/category/articles/" class="nav-link" id="link_blog">Блог</a></li>
            <li class="nav-item"><a href="#" onclick="contactsClick()" class="nav-link" id="link_footer">Контакты</a></li>
          </ul>
        </nav>
        
        <div class="main-socials">
          <a href="https://t.me/Manager_NewWave" class="container-item"><img src="/wp-content/themes/newwave/img/icons/tg_header_icon.png" alt="" class="socials-icon"></a>
          <a href="" class="container-item"><img src="/wp-content/themes/newwave/img/icons/wa_header_icon.png" alt="" class="socials-icon"></a>
        </div>
        <div class="main-language">
        <?php
          echo do_shortcode('[gtranslate]');
        ?>
        </div>
        <div class="navbar">
          <div class="menu_button" onclick="toggleMenu()">
            <img src="/wp-content/themes/newwave/img/icons/burger_icon.png" alt="Menu">
          </div>
          <div class="menu" id="menu">
          <ul>
            <li class="nav-item"><a href="/" class="nav-link" id="link_main">Главная страница</a></li>
            <li><a href="/about-us/" class="nav-link" id="link_about_us">О Нас</a></li>
            <li><a href="/category/articles/" class="nav-link" id="link_blog">Блог</a></li>
            <li><a href="#" onclick="contactsClick()" class="nav-link" id="link_footer">Контакты</a></li>
          </ul>
          <div class="burger-language">
            <?php
              echo do_shortcode('[gtranslate]');
            ?>
          </div>
          <!--
          <div class="burger-socials">
            <a href="https://t.me/Manager_NewWave" class="container-item"><img src="/wp-content/themes/newwave/img/icons/tg_header_icon.png" alt="" class="socials-icon"></a>
            <a href="" class="container-item"><img src="/wp-content/themes/newwave/img/icons/wa_header_icon.png" alt="" class="socials-icon"></a>
          </div>
          -->
        </div>
      </header>
  <main class="main">

