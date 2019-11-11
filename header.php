<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vr
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<?php wp_head(); ?>
<!-- <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i&display=swap&subset=cyrillic" rel="stylesheet"> -->
<link rel="stylesheet" href="/modules/css/swiper.min.css">
<style>
    html, body {
      position: relative;
      height: 100%;
    }
    body {
      background: #eee;
      font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
      font-size: 14px;
      color:#000;
      margin: 0;
      padding: 0;
    }
    .swiper-container {
      width: 100%;
      height: 100%;
    }
    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
      /* Center slide text vertically */
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -webkit-align-items: center;
      align-items: center;
    }
  </style>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
<div class="first-screen">
	<header id="masthead" class="site-header">
		<div class="site-branding">
		<?php
            $vr_logotype = get_template_directory_uri() . "/img/veronica_logo.svg";
            if ( ! empty( $vr_logotype ) ) {
                if ( is_front_page() && is_home() && ! is_paged() ) {
                    echo '<div class="site-logotype"><img src="' . $vr_logotype . '" alt="' . get_bloginfo('name') . '"></div>';
                } else {
                    echo '<div class="site-logotype"><a href="'. esc_url( home_url( '/' ) ) .'"><img src="' . $vr_logotype . '" alt="' . get_bloginfo('name') . '"></a></div>';
                }
            }
			?>
			<div class="site-worktime"><span class="boldtext">9:00 - 19:00</span> Пн-Вс</div>
		</div>
		
		<!-- navigation -->		
		<nav id="site-navigation" class="main-navigation">
		<div class="toggle-container">	
		<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'vr' ); ?></button>
		</div>	
		<div class="overlay" id="overlay">
		<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
			<div class="overlay-contacts">
				<span class="time">
					<span class="small-title">Время работы</span> 
					<span class="boldtext">9:00 - 20:00</span> 
					Пн-Вс
			</span>
			<div class="phone-block">
			<span class="small-title">Салон красоты</span> 
			<a class="phone" href="tel:+380635273171">098 523-56-00</a>
		</div>
			<div class="phone-block second">
			<span class="small-title">Учебный центр</span> 
			<a class="phone" href="tel:+380635273171">096 731-90-48</a>
		</div>
<div class="socials">
				<i class="instagram"></i>
				<i class="facebook"></i>
				<i class="youtube"></i>
			</div>
			
		</div>
		</div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

<?php if (is_home( )):?>
	<div class="slider-container">
		<div class="slide-image">
			<figure class="image-container">
				<img class="image-mask img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/_src/slide.jpg" width="754" height="596">
				<i class="image-back"></i>
			</figure>
		</div>
		<div class="slide-intent">
			<h2 class="intent-title">Салон красоты&nbsp; <br/><span class="smaller">&nbsp;в Борисполе</span></h2>
		</div>
	</div>
<div class="slogan">С вами будут работать профессионалы, которые знают, как добиться отличных результатов</div>
<ul class="tips">
<li class="tips-item">Только кечественные 
расходные материалы</li>
<li class="tips-item">Адекватные цены</li>
<li class="tips-item">Специалисты с опытом
работы от 3 лет</li>
<li class="tips-item">Более 100 видов 
услуг</li>
</ul>
<div class="offer">
<a class="offer-item"  href="/about">Больше о нас</a>
<a class="offer-item accent" href="#popup">Записаться</a>
</div>

<?php elseif( is_post_type_archive('study') ):?>
<div class="slider-container">
		<div class="slide-image">
			<figure class="image-container">
				<img class="image-mask img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/_src/slide.jpg" width="754" height="596">
				<i class="image-back"></i>
			</figure>
		</div>
		<div class="slide-intent">
			<h2 class="intent-title">Учебный центр&nbsp; <br/><span class="smaller">&nbsp;салона красоты Вероника +</span></h2>
		</div>
	</div>
<div class="slogan">С вами будут работать профессионалы, которые знают, как добиться отличных результатов</div>
<ul class="tips">
<li class="tips-item">Только кечественные 
расходные материалы</li>
<li class="tips-item">Адекватные цены</li>
<li class="tips-item">Специалисты с опытом
работы от 3 лет</li>
<li class="tips-item">Более 100 видов 
услуг</li>
</ul>
<div class="offer">
<a class="offer-item"  href="/about">Больше о нас</a>
<a class="offer-item accent" href="#popup">Записаться</a>
</div>
			<?php endif;?>
</div>

	<div id="content" class="site-content">
