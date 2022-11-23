<?php
                $args = array(
                    'post_type' => 'banners',
                    'post_status' => 'publish',
                    'posts_per_page' => 1
                );
            
                $query = new WP_Query($args);      
                if ($query->have_posts()):
                    while ($query->have_posts()): $query->the_post();

                        $textoEndereco = get_post_meta(get_the_ID(), '_texto_endereco', true);
                        $textoTelefone = get_post_meta(get_the_ID(), '_texto_celular', true);
                        $textoEmail = get_post_meta(get_the_ID(), '_texto_email', true);

                        $linkytb = get_post_meta(get_the_ID(), '_texto_youtube', true);
                        $linkInstagram = get_post_meta(get_the_ID(), '_texto_instagram', true);
                        $linkfb = get_post_meta(get_the_ID(), '_texto_facebook', true);
                        $googlemaps = get_post_meta(get_the_ID(), '_texto_googlemaps', true);

                        $arr = (array(
                            'endereco' => $textoEndereco,
                            'telefone' => $textoTelefone,
                            'email' => $textoEmail,
                            'youtube' => $linkytb,
                            'instagram' => $linkInstagram,
                            'facebook' => $linkfb,
                            'googlemaps' => $googlemaps
                        ));
                    endwhile;
                endif;
?>


<footer>
    <div class='footer-up'>
        <div class="container-flex">

            <div class="enderecos">

                    <h1>Endereço</h1>
                    <div class="underline-animation">
                        <?= ($arr['endereco']) ? $arr['endereco'] : 'Favor Cadastrar No Painel Admin' ?>
                    </div>

                    <h1>Telefone</h1>
                    <div>
                        <?= ($arr['telefone']) ? $arr['telefone'] : 'Favor Cadastrar No Painel Admin' ?>
                    </div>

                    <!-- <h1>Email</h1>
                    <div>
                        // ($arr['email']) ? $arr['email'] : 'Favor Cadastrar No Painel Admin' 
                    </div> -->
                    
                    <div class="container-flex social">

                        <?if($arr['instagram']){?>
                        <a href="<?=$arr['instagram']?>">
                            <div class='circle pulse'>
                            <div class='instagram-img' href=""></div>
                            
                        </div>
                        </a>
                        <?}?>

                        <?if($arr['youtube'] != ''){?>
                        <a href="<?=$arr['youtube']?>">
                        <div class='circle pulse'>
                            <div class='ytb-img' href=""></div>
                        </div>
                        </a>
                        <?}?>

                        <?if($arr['facebook'] != ''){?>
                        <a href="<?=$arr['facebook']?>">
                        <div class='circle pulse'>
                            <div class='fb-img' href=""></div>
                        </div>
                        </a>
                        <?}?>

                    </div>

            </div>

        </div>
    </div>

    <div class="footer-bottom">


    </div>
    <div class='footer-bottom2'>
            Wordpress &copy; Made by Cid - <?= date("Y") ?> 
    </div>

 
</footer>   
</body>
<?php wp_footer(); ?>
</html>
