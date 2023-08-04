$(document).ready(function() {

    updateServices('nature');
    updateMoodTexts('#51da06', 'nature');
  
    $('.slider-container').slick(getServicesSliderSettings(3));
  
    $('.reviews-container').slick(getReviewsSliderSettings());
  
    $('.services-container').slick(getPagesSliderSettings());
  
    $('.related-articles-container').slick(getRelatedArticlesSliderSettings());
  
    //$(".services-item").click(function() {
    //window.location = $(this).find("a").attr("href"); 
    //return false;
    //});
  
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
  
    function updateServices(cur_mood) {
      var slider_container = $('.slider-container');
      slider_container.fadeOut('fast');
      $.ajax({
          type: 'POST', // Use POST method to send data
          url: "<?php echo admin_url)'admin-ajax.php'); ?>", // Use WordPress AJAX endpoint
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