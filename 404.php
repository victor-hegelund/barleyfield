<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

	<div <?php generate_do_attr( 'content' ); ?>>
		<main style="text-align:center;" <?php generate_do_attr( 'main' ); ?>>
			<img width="120px" src="https://barleyfield.victorhegelund.dk/wp-content/uploads/404.svg" alt="404">
			<h1>Siden findes ikke</h1>
			<h2 class="h3">Skal vi hjælpe dig til forsiden?</h2>
			<p class="pil-link"><a href="/">Gå til forsiden</a></p>
		</main>
	</div>

	<?php
	/**
	 * generate_after_primary_content_area hook.
	 *
	 * @since 2.0
	 */
	do_action( 'generate_after_primary_content_area' );

	generate_construct_sidebars();

	get_footer();
