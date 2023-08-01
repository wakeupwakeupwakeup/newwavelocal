<?php
get_header();
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">

<script>
  
$(document).ready(function() {

  updateServices('nature');
  updateMoodTexts('#51da06', 'nature');

  $('.slider-container').slick(getServicesSliderSettings(3));

  $('.reviews-container').slick(getReviewsSliderSettings());

  $(".services-item").click(function() {
  window.location = $(this).find("a").attr("href"); 
  return false;
  });

  $(".article-card").click(function() {
  window.location = $(this).find("a").attr("href"); 
  return false;
  });

  $("#link_footer,#quiz_footer").click(function(){
      scrollToFooter();
  });

  function scrollToFooter(){
    const destination = $(".footer");
    $('html,body').animate({
        scrollTop: destination.offset().top+50
    },'slow');
  }

  function getServicesSliderSettings(show_num){
    return {
      speed: 350,
      slidesToShow: show_num,
      slidesToScroll: 3,
      prevArrow: '#services_slider_left',
      nextArrow: '#services_slider_right',
    }
  }

  function getReviewsSliderSettings(){
    return {
      speed: 350,
      slidesToShow: 3,
      slidesToScroll: 3,
      prevArrow: '#reviews_slider_left',
      nextArrow: '#reviews_slider_right',
    }
  }

  function updateServices(cur_mood) {
    var slider_container = $('.slider-container');
    slider_container.fadeOut('fast');
    $.ajax({
        type: 'POST', // Use POST method to send data
        url: '<?php echo admin_url('admin-ajax.php'); ?>', // Use WordPress AJAX endpoint
        data: {
            action: 'get_mood_entries',
            mood: cur_mood,
        },
        success: function(response) {
            slider_container.fadeIn('slow');
            slider_container.slick('unslick');
            slider_container.empty();
            slider_container.append(response);
            var numberOfDivs = slider_container.find('a').length;
            slider_container.slick(getServicesSliderSettings(Math.min(numberOfDivs, 3)));
        },
    });

  }

  function updateMood(clicked_button) {
    // Remove active class from all buttons
    $(".mood-item").removeClass("selected_mood");
    $(".active_bg").removeClass("active_bg");
    
    // Add active class to the clicked button
    $(clicked_button).addClass("selected_mood");
    

    // Get the selected category from the data attribute
    const selectedCategory = $(clicked_button).attr('id');

    var mood_color = '#e31a1a'
    var mood_id = 'romantic'
    switch (selectedCategory) {
      case 'mood_romance':
        mood_color = '#e31a1a'
        mood_id = 'romantic'
        $("#mood_bg_romance").addClass("active_bg");
        break;
      case 'mood_extreme':
        mood_color = '#ff9000'
        mood_id = 'extreme'
        $("#mood_bg_extreme").addClass("active_bg");
        break;
      case 'mood_culture':
        mood_color = '#1fd7ff'
        mood_id = 'culture'
        $("#mood_bg_culture").addClass("active_bg");
        break;
      case 'mood_nature':
        mood_color = '#51da06'
        mood_id = 'nature'
        $("#mood_bg_nature").addClass("active_bg");
        break;
      case 'mood_luxury':
        mood_color = '#ffe400'
        mood_id = 'luxury'
        $("#mood_bg_luxury").addClass("active_bg");
        break;
    }
    updateServices(mood_id);
    updateMoodTexts(mood_color, mood_id);

  }

  function updateMoodTexts(mood_color, mood_id) {
    const mood_names = {
      "romantic": "Романтика",
      "extreme": "Экстрим",
      "culture": "Культура",
      "nature": "Тишина и природа",
      "luxury": "Роскошь",
    };
    const selector_text = $("#selector_dynamic_color");
    const subtitle_text = $("#subtitle_mood");
    const services_title_text = $("#mood_service_title");    
    $(selector_text).css("color", mood_color);
    $(subtitle_text).css("color", mood_color);
    $(services_title_text).css("color", mood_color);
    $(services_title_text).text(mood_names[mood_id]);
  }

  // Add click event to buttons
  $(".mood-item").on("click", function() {
    updateMood(this);
  });
});

</script>
<section class="main-section">
  <ul class="slideshow">
    <li id="mood_bg_romance" class="mood_bg"></li>
    <li id="mood_bg_extreme" class="mood_bg"></li>
    <li id="mood_bg_culture" class="mood_bg"></li>
    <li id="mood_bg_nature" class="mood_bg active_bg"></li>
    <li id="mood_bg_luxury" class="mood_bg"></li>
  </ul>
  <div class="main-heading">
    <h1 class="title">Организация необычных<br>мероприятий в Тайланде</h1>
    <p class="category-text mood-text" id="subtitle_mood">New Wave - фабрика хорошего настроения</p>
  </div>
  <div class="mood-selector">
    <span class="selector-heading">Ваше праздничное <span id="selector_dynamic_color" class="color">настроение:</span></span>
    <div class="mood-container">
      <button class="mood-item" id="mood_romance">
        <img src="/wp-content/themes/newwave/img/icons/category_romantic.png" alt="" class="mood-img">
        <p class="mood-name">Романтика</p>
      </button>
      <button class="mood-item" id="mood_extreme">
        <img src="/wp-content/themes/newwave/img/icons/category_extreme.png" alt="" class="mood-img">
        <p class="mood-name">Экстрим</p>
      </button>
      <button class="mood-item" id="mood_culture">
        <img src="/wp-content/themes/newwave/img/icons/category_culture.png" alt="" class="mood-img">
        <p class="mood-name">Культура</p>
      </button>
      <button class="mood-item selected_mood" id="mood_nature">
        <img src="/wp-content/themes/newwave/img/icons/category_nature.png" alt="" class="mood-img">
        <p class="mood-name">Тишина и природа</p>
      </button>
      <button class="mood-item" id="mood_luxury">
        <img src="/wp-content/themes/newwave/img/icons/category_luxury.png" alt="" class="mood-img">
        <p class="mood-name">Роскошь</p>
      </button>
    </div>
  </div>
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
  <div class="main-subheading">
    <h3 class="subheading">Нет ничего невозможного</h3>
    <p class="subheading-description">
      Необычные туры, быстрые трансферы, авто на прокат и обмен валюты на Пхукете — мы осуществим любую Вашу мечту!
    </p>
  </div>
  <div class="services-container">
      <div class="services-item">
        <div class="text-container">
          <h4 class="service-name">Аренда жилья</h4>
          <p class="service-description">Мы подберем для вас жилье на любой вкус и кошелек</p>
          <a href="/rental-of-property/" class="more-button">Узнать подробнее</a>
        </div>
        <div class="service-icon-wrapper">
          <img src="/wp-content/themes/newwave/img/icons/service_icon_housing.png" alt="Rental Housing" class="service-icon">
        </div>
      </div>
      <div class="services-item">
        <div class="text-container">
          <h4 class="service-name">Аренда авто</h4>
          <p class="service-description">Организуем аренду транспорта любого класса</p>
          <a href="/rent-a-car/" class="more-button">Узнать подробнее</a>
        </div>
        <div class="service-icon-wrapper">
          <img src="/wp-content/themes/newwave/img/icons/service_icon_transport.png" alt="Transport rental" class="service-icon">
        </div>
      </div>
      <div class="services-item">
        <div class="text-container">
          <h4 class="service-name">Трансфер</h4>
          <p class="service-description">Трансфер в любую локацию для корпоративных поездок</p>
          <a href="/transfer/" class="more-button">Узнать подробнее</a>
        </div>
        <div class="service-icon-wrapper">
          <img src="/wp-content/themes/newwave/img/icons/service_icon_transfer.png" alt="Transfer" class="service-icon">
        </div>
      </div>
      <div class="services-item">
        <div class="text-container">
          <h4 class="service-name">Туры</h4>
          <p class="service-description">Создадим для вас незабываемые воспоминания о Пхукете</p>
          <a href="/tours/" class="more-button">Узнать подробнее</a>
        </div>
        <div class="service-icon-wrapper">
          <img src="/wp-content/themes/newwave/img/icons/service_icon_food.png" alt="Food" class="service-icon">
        </div>
      </div>
  </div>
</section>
<section class="offers-section">
  <div class="slider-title-nav">
    <div class="slider-title">
      <span class="category-text">Давайте исполним все желания</span>
      <h2 class="title">Фантастический отдых<br>на любой вкус —<br><p id="mood_service_title">Тишина и природа</p></h2>
    </div>
    <div class="slider-nav">
      <button class="slider-nav-item" id="services_slider_left"><img src="/wp-content/themes/newwave/img/icons/arrow_left.png" alt="" class="slider-nav-arrow"></button>
      <button class="slider-nav-item" id="services_slider_right"><img src="/wp-content/themes/newwave/img/icons/arrow_right.png" alt="" class="slider-nav-arrow"></button>
    </div>
  </div>
  <div class="offers-bottom">
    <div class="slider-container"></div>
  </div>
</section>
<section class="quiz-section">
  <h2 class="title"><span class="color">Пройдите опрос</span> и позвольте себе<br>
    погрузиться в море новых впечатлений с<br>
    нашими турами</h2>
  <div class="quiz-button-wrapper">
    <button class="general-button popmake-154" id="quiz_footer">Пройти опрос</button>
  </div>
</section>
<section class="articles-section">
    <div class="article-wrapper">
    <?php
      $latest_post_ids = [];
      $articles = new WP_Query(array(
          'category_name' => 'articles',
          'posts_per_page' => 1,
      ));
      if ($articles->have_posts()) {
          while ($articles->have_posts()) {
            array_push($latest_post_ids, get_the_ID());
            $articles->the_post();
              get_template_part('template-parts/post/article-card');
          }
      }
    ?>
    <div class="article-content-container">
      <h2 class="title"><span class="color">Откройте ворота</span><br>в экзотический мир</h2>
      <p class="text-m">
      Здесь вы найдете много интересных и полезных статей, которые помогут вам лучше понять возможности, которые предлагает Таиланд для проведения различных мероприятий. Наша команда профессионалов собирает для вас самые свежие новости и публикует информацию о последних тенденциях и популярных событиях, происходящих в этой удивительной стране.
      </p>
    </div>
  </div>
  <div class="related-articles-wrapper">
    <h2 class="title section-title">Похожие статьи</h2>
    <div class="related-articles-container">
      <?php
        $articles = new WP_Query(array(
            'category_name' => 'articles',
            'posts_per_page' => 3,
            'post__not_in' => $latest_post_ids,
            'orderby' => 'rand',
        ));
        if ($articles->have_posts()) {
            while ($articles->have_posts()) {
              $articles->the_post();
                get_template_part('template-parts/post/related-article-card');
            }
        }
      ?>
  </div>
  </div>
</section>
<section class="reviews-section">
  <div class="reviews-wrapper">
    <div class="slider-title-nav">
      <div class="slider-title">
        <h2 class="title">Отзывы <span class="color">Клиентов</span></h2>
      </div>
      <div class="slider-nav">
        <button id="reviews_slider_left" class="slider-nav-item"><img src="/wp-content/themes/newwave/img/icons/arrow_left.png" alt="" class="slider-nav-arrow"></button>
        <button id="reviews_slider_right" class="slider-nav-item"><img src="/wp-content/themes/newwave/img/icons/arrow_right.png" alt="" class="slider-nav-arrow"></button>
      </div>
    </div>
  </div>
  <div class="reviews-wrapper">
    <div class="reviews-container">
      <div class="review-card">
        <div class="score-container">
          <img src="/wp-content/themes/newwave/img/icons/quote_icon.png" alt="" class="quote-icon">
          <img src="/wp-content/themes/newwave/img/icons/score_icon.png" alt="" class="score-icon">
        </div>
        <div class="review-content">
          <p class="review-text">
            Невероятный тур, наполненный впечатлениями, которые я буду хранить всю жизнь. Трансфер был безупречен, а жилье на Пхукете просто идеальное. С наилучшими рекомендациями!
          </p>
        </div>
        <div class="author-wrapper">
          <div class="author-data-container">
            <span class="author-name">Olivia M. (Австралия)</span>
            <span class="author-date">11 июля, 2023</span>
          </div>
        </div>
      </div>
      <div class="review-card">
        <div class="score-container">
          <img src="/wp-content/themes/newwave/img/icons/quote_icon.png" alt="" class="quote-icon">
          <img src="/wp-content/themes/newwave/img/icons/score_icon.png" alt="" class="score-icon">
        </div>
        <div class="review-content">
          <p class="review-text">
            Невероятный опыт. Тур был уникальным и наполненным эмоциями, трансфер и жилье - просто на высшем уровне. Отдых был незабываемым, спасибо!
          </p>
        </div>
        <div class="author-wrapper">
          <div class="author-data-container">
            <span class="author-name">Mike and Sofia J. (США)</span>
            <span class="author-date">5 июня, 2023</span>
          </div>
        </div>
      </div>
      <div class="review-card">
        <div class="score-container">
          <img src="/wp-content/themes/newwave/img/icons/quote_icon.png" alt="" class="quote-icon">
          <img src="/wp-content/themes/newwave/img/icons/score_icon.png" alt="" class="score-icon">
        </div>
        <div class="review-content">
          <p class="review-text">
            Просто великолепно! Я никогда не забуду этого тура. Были сделаны все возможное, чтобы предоставить мне незабываемые впечатления. Жилье и трансфер были также хорошо организованы. Рекомендую всем!
          </p>
        </div>
        <div class="author-wrapper">
          <div class="author-data-container">
            <span class="author-name">Алексей И. (Казахстан)</span>
            <span class="author-date">26 мая, 2023</span>
          </div>
        </div>
      </div>
      <div class="review-card">
        <div class="score-container">
          <img src="/wp-content/themes/newwave/img/icons/quote_icon.png" alt="" class="quote-icon">
          <img src="/wp-content/themes/newwave/img/icons/score_icon.png" alt="" class="score-icon">
        </div>
        <div class="review-content">
          <p class="review-text">
            Удивлен профессионализмом и вниманием к деталям. Мы просто наслаждались своим туром, получили массу незабываемых эмоций. Трансфер и жилье также были на высшем уровне. Спасибо за незабываемый отдых!
          </p>
        </div>
        <div class="author-wrapper">
          <div class="author-data-container">
            <span class="author-name">Владимир и Ксения Д. (Россия)</span>
            <span class="author-date">29 апреля, 2023</span>
          </div>
        </div>
      </div>
      <div class="review-card">
        <div class="score-container">
          <img src="/wp-content/themes/newwave/img/icons/quote_icon.png" alt="" class="quote-icon">
          <img src="/wp-content/themes/newwave/img/icons/score_icon.png" alt="" class="score-icon">
        </div>
        <div class="review-content">
          <p class="review-text">
            Очень благодарен за такой уникальный тур и необыкновенные эмоции. Трансфер был организован идеально, а жилье на Пхукете очень комфортное. Обязательно порекомендую!
          </p>
        </div>
        <div class="author-wrapper">
          <div class="author-data-container">
            <span class="author-name">Somsak P. (Тайланд)</span>
            <span class="author-date">18 апреля, 2023</span>
          </div>
        </div>
      </div>
      <div class="review-card">
        <div class="score-container">
          <img src="/wp-content/themes/newwave/img/icons/quote_icon.png" alt="" class="quote-icon">
          <img src="/wp-content/themes/newwave/img/icons/score_icon.png" alt="" class="score-icon">
        </div>
        <div class="review-content">
          <p class="review-text">
          Благодаря организации уникального тура, я испытала такие эмоции, которые долго останутся со мной. Трансфер был организован безупречно, а жилье на Пхукете было комфортным и уютным. Самые теплые рекомендации!
          </p>
        </div>
        <div class="author-wrapper">
          <div class="author-data-container">
            <span class="author-name">Екатерина и Сергей С. (Россия)</span>
            <span class="author-date">3 апреля, 2023</span>
          </div>
        </div>
      </div>
      <div class="review-card">
        <div class="score-container">
          <img src="/wp-content/themes/newwave/img/icons/quote_icon.png" alt="" class="quote-icon">
          <img src="/wp-content/themes/newwave/img/icons/score_icon.png" alt="" class="score-icon">
        </div>
        <div class="review-content">
          <p class="review-text">
            Мое пребывание на Пхукете было просто волшебным. Уникальный тур, куча эмоций, отлично организованный трансфер и прекрасное жилье. Обязательно воспользуюсь ещё раз!
          </p>
        </div>
        <div class="author-wrapper">
          <div class="author-data-container">
            <span class="author-name">Nguyen T. (Вьетнам)</span>
            <span class="author-date">25 марта, 2023</span>
          </div>
        </div>
      </div>
      <div class="review-card">
        <div class="score-container">
          <img src="/wp-content/themes/newwave/img/icons/quote_icon.png" alt="" class="quote-icon">
          <img src="/wp-content/themes/newwave/img/icons/score_icon.png" alt="" class="score-icon">
        </div>
        <div class="review-content">
          <p class="review-text">
            Сердечное спасибо за незабываемый отдых. Тур был полон уникальных впечатлений, а трансфер и жилье на Пхукете были безупречно организованы. Непременно рекомендую!
          </p>
        </div>
        <div class="author-wrapper">
          <div class="author-data-container">
            <span class="author-name">Lily D. (Австралия)</span>
            <span class="author-date">23 марта, 2023</span>
          </div>
        </div>
      </div>
      <div class="review-card">
        <div class="score-container">
          <img src="/wp-content/themes/newwave/img/icons/quote_icon.png" alt="" class="quote-icon">
          <img src="/wp-content/themes/newwave/img/icons/score_icon.png" alt="" class="score-icon">
        </div>
        <div class="review-content">
          <p class="review-text">
            Спасибо за отличные услуги. Весь процесс, от выбора тура до организации трансфера и выбора жилья на Пхукете, был безупречно организован. Все мероприятия были уникальными и полными эмоций. Я обязательно обращусь еще раз!
          </p>
        </div>
        <div class="author-wrapper">
          <div class="author-data-container">
            <span class="author-name">Мария и Владимир В. (Россия)</span>
            <span class="author-date">12 марта, 2023</span>
          </div>
        </div>
      </div>
      <div class="review-card">
        <div class="score-container">
          <img src="/wp-content/themes/newwave/img/icons/quote_icon.png" alt="" class="quote-icon">
          <img src="/wp-content/themes/newwave/img/icons/score_icon.png" alt="" class="score-icon">
        </div>
        <div class="review-content">
          <p class="review-text">
            Моя поездка на Пхукет была настолько волшебной. Были предоставлены уникальные туры, наполненные эмоциями. Трансфер и жилье были организованы на высоком уровне. Без сомнения рекомендую их своим друзьям!
          </p>
        </div>
        <div class="author-wrapper">
          <div class="author-data-container">
            <span class="author-name">Наталья Р. (Беларусь)</span>
            <span class="author-date">3 марта, 2023</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
get_footer();
?>