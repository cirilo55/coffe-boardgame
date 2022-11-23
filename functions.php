<?php

function dev_registrando_taxonomia()
{
    register_taxonomy(
        'paises',
        'destinos',
        array(
            'labels' => array('name' => 'categorias'),
            'hierarchical' => true
        )
    );
}

add_action('init', 'dev_registrando_taxonomia');


function dev_registrando_post_customizado()
{
    register_post_type('destinos',
        array(
            'labels' => array('name' => 'Jogos'),
            'public' => true,
            'menu_position' => 0,
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_icon' => 'dashicons-admin-site'
        )
    );
}
add_action('init', 'dev_registrando_post_customizado_banner');
add_action('init', 'dev_registrando_post_customizado');

function dev_adicionando_recursos_ao_tema()
{
    add_theme_support('custom-logo', array(
        'height'      => 36,
        'width'       => 16,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'dev_adicionando_recursos_ao_tema');

function dev_registrando_menu()
{
    register_nav_menu(
        'menu-navegacao pulse',
        'Menu navegação'
    );
}

add_action('init', 'dev_registrando_menu');

function dev_registrando_post_customizado_banner()
{
    register_post_type(
        'banners',
        array(
            'labels' => array('name' => 'Principal'),
            'public' => true,
            'menu_position' => 1,
            'menu_icon' => 'dashicons-format-image',
            'supports' => array('title', 'thumbnail')
        )
    );
}

add_action('init', 'dev_registrando_post_customizado_banner');

function dev_registrando_metabox()
{
    add_meta_box(
        'ai_registrando_metabox',
        'Texto para a home',
        'ai_funcao_callback',
        'banners'
    );
}

add_action('add_meta_boxes', 'dev_registrando_metabox');

function ai_funcao_callback($post)
{

    $texto_home_1 = get_post_meta($post->ID, '_texto_home_1', true);
    $texto_home_2 = get_post_meta($post->ID, '_texto_home_2', true);
    $texto_endereco = get_post_meta($post->ID, '_texto_endereco', true);
    $texto_celular = get_post_meta($post->ID, '_texto_celular', true);
    $texto_email = get_post_meta($post->ID, '_texto_email', true);
    $texto_youtube = get_post_meta($post->ID, '_texto_youtube', true);
    $texto_instagram = get_post_meta($post->ID, '_texto_instagram', true);
    $texto_facebook = get_post_meta($post->ID, '_texto_facebook', true);

    $googlemaps = get_post_meta($post->ID, '_texto_googlemaps', true);

    ?>
    <label for="texto_home_1">Texto 1</label>
    <input type="text" name="texto_home_1" style="width: 100%" value="<?= $texto_home_1 ?>"/>
    <br>
    <br>
    <label for="texto_home_2">Texto 2</label>
    <input type="text" name="texto_home_2" style="width: 100%" value="<?= $texto_home_2 ?>"/>
    
    <br>
    <br>
    <label for="texto_endereco">Endereço</label>
    <input type="text" name="texto_endereco" style="width: 100%" value="<?= $texto_endereco ?>"/>

    <br>
    <br>
    <label for="texto_celular">Celular</label>
    <input type="text" name="texto_celular" style="width: 100%" value="<?= $texto_celular ?>"/>

    <br>
    <br>
    <label for="texto_email">Email</label>
    <input type="email" name="texto_email" style="width: 100%" value="<?= $texto_email?>"/>

    <br>
    <br>
    <label for="texto_youtube">Youtube Link: </label>
    <input type="text" name="texto_youtube" style="width: 100%" value="<?= $texto_youtube ?>"/>

    <br>
    <br>
    <label for="texto_instagram">Instagram Link: </label>
    <input type="text" name="texto_instagram" style="width: 100%" value="<?= $texto_instagram ?>"/>

    <br>
    <br>
    <label for="texto_facebook">Facebook Link:</label>
    <input type="text" name="texto_facebook" style="width: 100%" value="<?= $texto_facebook ?>"/>


    <?php
}

function dev_salvando_dados_metabox($post_id)
{
    foreach ($_POST as $key => $value) {
        if ($key !== 'texto_home_1' && $key !== 'texto_home_2' && $key !== 'texto_endereco' && $key !== 'texto_celular' && $key !== 'texto_email' && $key !== 'texto_youtube' && $key !== 'texto_instagram'  && $key !== 'texto_facebook' && $key !== 'texto_googlemaps' )  {
            continue;
        }

        update_post_meta(
            $post_id,
            '_' . $key,
            $_POST[$key]
        );
    }
}

add_action('save_post', 'dev_salvando_dados_metabox');

function pegandoTextosParaBanner()
{

    $args = array(
        'post_type' => 'banners',
        'post_status' => 'publish',
        'posts_per_page' => 1
    );

    $query = new WP_Query($args);
    if ($query->have_posts()):
        while ($query->have_posts()): $query->the_post();
            $texto1 = get_post_meta(get_the_ID(), '_texto_home_1', true);
            $texto2 = get_post_meta(get_the_ID(), '_texto_home_2', true);
            return (array(
                'texto_1' => $texto1,
                'texto_2' => $texto2
            ));
        endwhile;
    endif;
}

function dev_adicionando_scripts()
{

    $textosBanner = pegandoTextosParaBanner();

    if (is_front_page()) {
        wp_enqueue_script('typed-js', get_template_directory_uri() . '/js/typed.min.js', array(), false, true);
        // wp_enqueue_script('texto-banner-js', get_template_directory_uri() . '/js/texto-banner.js', array('typed-js'), false, true);
        // wp_localize_script('texto-banner-js', 'data', $textosBanner);
    }
}

add_action('wp_enqueue_scripts', 'dev_adicionando_scripts');