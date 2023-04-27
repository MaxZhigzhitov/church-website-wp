<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package holy-trinity-parish-website
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

	<?php
		wp_head();
	?>

	<style>
		body{
			background-image: url(https://images.unsplash.com/photo-1470252649378-9c29740c9fa8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80);
			background-repeat: no-repeat;
			background-size: cover;
			backdrop-filter: blur(5px);
			font-family: "Open Sans Regular", sans-serif;
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
			overflow: hidden;
			padding: 0;
			margin: 0;
		}
		h1{font-family: "Open Sans Bold", sans-serif;}
		.error-404{
			background-color: #fff;
			border-radius: 12px;
			box-shadow: 0px 4px 12px rgba(0,0,0, 0.15);
			padding: 1.2em;
			text-align: center;
			transform: translateY(-50%);
			max-width: 650px;
		}
		.textbox{
			margin-bottom: 1.2em;
		}
		
	</style>
	
</head>



<body>
	<main id="primary" class="site-main">
	
		<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Ой! Эта страница не может быть найдена!', 'parish' ); ?></h1>
			</header><!-- .page-header -->
	
			<div class="page-content">
				<div class="textbox">
					<p>
						<?php _e("Страница, которую Вы пытаетесь загрузить, не существует. Проверьте правильность URL-адреса нужной Вам страницы", 'parish'); ?>
					</p>
				</div>
				<a class="cta-button" href="<?php echo home_url(); ?>"><?php _e('На главную', 'parish'); ?></a>
	
	
			</div><!-- .page-content -->
		</section><!-- .error-404 -->
	
	</main><!-- #main -->
</body>
