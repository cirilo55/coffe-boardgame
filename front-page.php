<?php
$estiloPagina = 'home.css';
require_once 'header.php';

$args = array(
        'post_type' => 'banners',
        'post_status' => 'publish',
        'posts_per_page' => 1
);
?>
<?php
$query = new WP_Query($args);
if($query->have_posts()):
    while($query->have_posts()): $query->the_post();
    $texto = get_post_meta(get_the_ID(), '_texto_home_1', true);
    $textobtn = get_post_meta(get_the_ID(), '_texto_home_2', true);

    ?>
    <main>
        <div class="imagem-banner">
            <?php the_post_thumbnail(); ?>
        </div>

        <div class="ban-container">
        <div class="texto-banner-dinamico">

            <span id="texto-banner">
                <?=$texto?>
            
            </span>

            <a href="">
            <button><?=$textobtn?></button>
            </a>

        </div>
        </div>

    <?php
    endwhile;
endif;
?>

    <section class='section-img'>
            <div class="sobre-container">
                
            <div class="sobre-item">
            <!-- <img src="<?=get_template_directory_uri()?>/public/images/boardgames.jpg" alt="boardgames" > -->
            
            <!-- <div class='sobre-text'> -->
            <h1>Conheça nosso acervo</h1>
            <h2>Escolha de um acervo com mais de 100 jogos,
                 equanto degusta um café profissional.
                 Lorem Ipsum ry's standard dummy text ever since has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem
    
                </h2>
            <!-- </div> -->
            </div>


            <div class="sobre-item">
                  <img src="<?=get_template_directory_uri()?>/public/images/boardgames.jpg" alt="boardgames" >
                  <a class="produtos-btn" href="#">Visualizar acervo</a>
            </div>

            </div>
    </section>


    <section class="produtos">
        <div class="produtos-container">

            <div class="produtos-item">
                <div class='produtos-img'>
                <img src="<?=get_template_directory_uri()?>/public/images/dice-turq.png" alt="">
                </div>
                <h2 class="produtos-paulista">Bebidas Quentes</h2>
				<p>As condições climáticas não eram as melhores nessa primeira escolha e, entre 1800 e 1850, tentou-se o cultivo noutras regiões: o João Alberto Castelo Branco trouxe mudas do Pará</p>
            </div>

            <div class="produtos-item">
                <div class='produtos-img'>
                <img src="<?=get_template_directory_uri()?>/public/images/dice-yellow.png" alt="">

                </div>
                <h2 class="produtos-carioca">Acervo de jogos</h2>
				<p>As condições climáticas não eram as melhores nessa primeira escolha e, entre 1800 e 1850, tentou-se o cultivo noutras regiões: o João Alberto Castelo Branco trouxe mudas do Pará</p>
            </div>

            <div class="produtos-item">
            <div class='produtos-img'>
            <img src="<?=get_template_directory_uri()?>/public/images/dice-brown.png" alt="">

            </div>

                <h2 class="produtos-mineiro">Lugar Aconchegante</h2>
				<p>As condições climáticas não eram as melhores nessa primeira escolha e, entre 1800 e 1850, tentou-se o cultivo noutras regiões: o João Alberto Castelo Branco trouxe mudas do Pará</p>
            </div>
        </div>

        <a class="produtos-btn" href="#">Saiba Mais</a>
    </section>


<?php
require_once 'footer.php';
