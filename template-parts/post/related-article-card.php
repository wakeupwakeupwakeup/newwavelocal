<a href="<?php the_permalink(); ?>">
        <div class="related-card-wrapper" id="article-<?php the_ID() ?>">
            <?php 
                if (has_post_thumbnail()) {
                    $thumbnail_attributes = array(
                    'class' => 'related-card-img',
                    'alt' => '',
                    );
                    the_post_thumbnail('related-article-card-thumbnail', $thumbnail_attributes);
                }
            ?>
            <div class="related-card-description-container">
                <!-- <span class="category-text">Culture</span> -->
                <?php
                    the_title( '<h3 class="related-card-title">', '</h3>' );
                ?>
                <p class="text-s">
                <?php
                    $short_desc = get_post_custom_values('short_description', get_the_ID());
                    echo $short_desc[0];
                ?>
                </p>
            </div>
        </div>
      </a>
