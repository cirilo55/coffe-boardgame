<?php
$estiloPagina = 'home.css';
require_once 'header.php';

$args = array(
        'post_type' => 'banners',
        'post_status' => 'publish',
        'posts_per_page' => 1
);
?>
<main>
<?php
$query = new WP_Query($args);
if($query->have_posts()):
    while($query->have_posts()): $query->the_post();
    ?>

        <div class="imagem-banner">
            <?php the_post_thumbnail(); ?>
        </div>
    <?php
    endwhile;
endif;
?>

<div>
    <?php
            while (have_posts()): the_post();
                the_post_thumbnail('post-thumbnail',array('class' => 'imagem-post'));
                echo '<div class="conteudo container-dev">';
                the_title('<h2>','</h2>');
                the_content();
                echo'</div>';
            endwhile;
    ?>
</div>
</main>

<?php
require_once 'footer.php';
