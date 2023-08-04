<?php
/**
 * Template part for displaying services.
 */
 // the_permalink();
?>
<a href="<?php the_permalink(); ?>">
  <div class="slider-card" id="service-<?php the_ID() ?>">
      <?php 
      if (has_post_thumbnail()) {
        $thumbnail_attributes = array(
          'class' => 'card-img',
          'alt' => '',
        );
        the_post_thumbnail('service-card-thumbnail', $thumbnail_attributes);
      }
      ?>
      <div class="card-info">
      <div class="card-title-container">
      <?php
          the_title( '<h4 class="card-title">', '</h4>' );
      ?>
      </div>
      <div class="card-price-container">
        <span class="price-before">От</span>
        <span class="card-price">
          <?php
            $min_price_array = get_post_custom_values('tour_price', get_the_ID());
            if (count($min_price_array) > 0) {
              echo "$" . $min_price_array[0];
            } else {
              echo "?";
            }
          ?>
      </span>
        <span class="price-after">Ценовой диапазон</span>
      </div>
      <div class="card-addinfo-container">
        <div class="card-duration-container">
          <img src="/wp-content/themes/newwave/img/icons/duration_icon.png" alt="" class="duration-icon"  width="16px" height="15px">
          <span class="card-duration">
          <?php
            $duration_array = get_post_custom_values('tour_duration', get_the_ID());
            if ($duration_array[0] > 1) {
              echo $duration_array[0] . " дней";
            } else {
              echo "1 день";
            }
          ?>
          </span>
        </div>
        <div class="card-options-container">
          <?php
          $options_array = get_field('services_included');
          foreach ($options_array as &$value) {
            echo "
              <div class='card-option'>
              <img src='/wp-content/themes/newwave/img/icons/tick_icon.png' alt='' class='option-icon' width='11px' height='12px'>
              <span class='option-name'>" . $value . "</span>
            </div>
            ";
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</a>