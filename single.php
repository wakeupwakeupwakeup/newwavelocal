<?php
if (in_category('services')) {
    include('single_service.php');
} else {
    include('single_article.php');
}
?>