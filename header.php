<?php
/**
 * The template for displaying the header.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>

	<!-- Schema data -->
	<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "LiquorStore",
  "name": "Barley Field",
  "logo": "https://barleyfield.victorhegelund.dk/wp-content/uploads/barleyfield-logo-positiv@300x.png",
  "image": "https://barleyfield.victorhegelund.dk/wp-content/uploads/brygmestre-mikrobryggeri-farum.png",
  "@id": "",
  "url": "https://barleyfield.victorhegelund.dk",
  "email": "info@barleyfieldbeer.dk",
  "priceRange": "$$$",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Bygmarken 19b",
    "addressLocality": "Farum",
    "postalCode": "3520",
    "addressCountry": "DK"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": 55.8206612,
    "longitude": 12.3686961
  }  
}
</script>
<!-- Schema data slut -->

</head>

<body <?php body_class(); ?> <?php generate_do_microdata( 'body' ); ?>>
	<?php
	/**
	 * wp_body_open hook.
	 *
	 * @since 2.3
	 */
	do_action( 'wp_body_open' ); // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound -- core WP hook.

	/**
	 * generate_before_header hook.
	 *
	 * @since 0.1
	 *
	 * @hooked generate_do_skip_to_content_link - 2
	 * @hooked generate_top_bar - 5
	 * @hooked generate_add_navigation_before_header - 5
	 */
	do_action( 'generate_before_header' );

	/**
	 * generate_header hook.
	 *
	 * @since 1.3.42
	 *
	 * @hooked generate_construct_header - 10
	 */
	do_action( 'generate_header' );

	/**
	 * generate_after_header hook.
	 *
	 * @since 0.1
	 *
	 * @hooked generate_featured_page_header - 10
	 */
	do_action( 'generate_after_header' );
	?>

<!------------------------- VORES KODE ------------------------->
	<div class="splash">
		<div class="splash-color">
			<div class="splash-inner">
				<span class="splash-grafisk-tekst grafisk-tekst theme-color"></span>
				<div class="splash-indhold"></div>
				<span class="splash-microcopy h3"></span>
			</div>
		</div>
	</div>

	<script>
		let pageData;

		async function loadPageJSON() {
            let aktuelSide = "<?php echo get_the_ID() ?>";
            console.log("loadJSON");
            console.log(aktuelSide);
            const pageJSONData = await fetch("https://barleyfield.victorhegelund.dk/wp-json/wp/v2/pages/" + aktuelSide);
            
            console.log(pageJSONData);
            
            pageData = await pageJSONData.json();
            console.log("pageData:", pageData);

            if (pageData.farve !== ""){
                document.documentElement.style.setProperty('--theme-color', 'var(--' + pageData.farve + ')');
            }

			if (pageData.overskrift_h1 !== ""){
                visSplach();
            } else{
				console.log("ELSE animations");
				animations();
			}
        }

		function visSplach (){
			console.log("visSplach");
			let splashH1Tag = document.createElement('h1');
			splashH1Tag.innerHTML = pageData.overskrift_h1;
			document.querySelector(".splash-inner").prepend(splashH1Tag);

			document.querySelector(".splash-inner").classList.add("splash-inner-padding");

			document.querySelector(".splash-grafisk-tekst").textContent = pageData.grafisk_tekst;
			document.querySelector(".splash-indhold").innerHTML = pageData.indhold;
			document.querySelector(".splash-microcopy").textContent = pageData.microcopy;
			if (pageData.billede !== false){
				document.querySelector(".splash").style.cssText += "background-image: url(" + pageData.billede.guid + ")";
			};
			console.log("SPLACH animations");
			animations();
		}
	</script>
<!------------------------- IKKE VORES KODE ------------------------->


	<div <?php generate_do_attr( 'page' ); ?>>
		<?php
		/**
		 * generate_inside_site_container hook.
		 *
		 * @since 2.4
		 */
		do_action( 'generate_inside_site_container' );
		?>
		
		<div <?php generate_do_attr( 'site-content' ); ?>>
			<?php
			/**
			 * generate_inside_container hook.
			 *
			 * @since 0.1
			 */
			do_action( 'generate_inside_container' );
