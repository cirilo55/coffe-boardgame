<?php
$estiloPagina = 'jogos.css';
require_once 'header.php';
?>
    <form action="#" class="container-dev formulario-pesquisa-paises">
        <h2>Conheça nossos Jogos</h2>
    </form>
<?php


$args = array(
    'post_type' => 'destinos',
    'tax_query' => !empty($_GET['paises']) ? $paisSelecionado : ''
);
$query = new WP_Query($args);
if ($query->have_posts()):
    echo '<main class="page-destinos">';
    echo '<ul class="lista-destinos container-alura">';
    while ($query->have_posts()): $query->the_post();
        echo '<li class="col-md-3 destinos" >';
        the_post_thumbnail();
        the_title('<p class="titulo-destino">', '</p>');
        the_content();
        echo '</li>';
    endwhile;
    echo '</ul>';
    echo '</main>';
endif;
require_once 'footer.php';