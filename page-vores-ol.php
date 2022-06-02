<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<!-- VORES KODE -->
    <script>
		document.addEventListener("DOMContentLoaded", loadPageJSON);
	</script>
<!-- IKKE VORES KODE -->

	<div <?php generate_do_attr( 'content' ); ?>>
		<main <?php generate_do_attr( 'main' ); ?>>
        
<!------------------------- VORES KODE ------------------------->
            <style>
                .alle-ol{
                    display: grid;
                    grid-template-columns: 1fr;
                    padding-top: 10rem;
                }

                #ol-grid{
                    display: grid;
                    grid-template-columns: 1fr 1fr;
                    column-gap: 2rem;
                    row-gap: 9rem;
                }

                .ol-grid-col{
                    width: 100%;
                    height: 0;
                    padding-top: 100%;
                    background-color: var(--lysegraa);
                    filter: drop-shadow(0 3px 6px rgba(0, 0, 0, 0.16));
                    cursor: pointer;
                    --hoverMoveTop: 0;
                    --hoverMoveBottom: 0;
                }

                .ol-grid-col:hover{
                    --hoverMoveTop: -20px;
                    --hoverMoveBottom: 20px;
                }

                .olImg{
                    margin-top: var(--hoverMoveTop);
                    margin-bottom: var(--hoverMoveBottom);
                    max-width: 28%;
                    transition: 0.3s;
                }

                .inner-ol-grid-col{
                    margin-top: -133%;
                    text-align: center;
                    padding: 1rem;
                }

                #filtrering nav h2{
                    display: inline;
                    margin: 0;
                }

                #filtrering nav {
                    overflow-x: auto;
                    white-space: nowrap;
                    background-color: var(--brand-graa);
                    color: var(--hvid);
                    position: fixed;
                    z-index: 2;
                    right: 0;
                    left: 0;
                    bottom: 0;
                    padding: 2rem;
                    display: inline-flex;
                }

                #filtrering nav a{
                    cursor: pointer;
                    margin: auto 1rem;
                    color: var(--hvid); 
                }

                #filtrering nav a:hover{
                    color: var(--beer);
                }

                #filtrering nav a:last-child{
                    padding-right: 2rem;
                }

                #filtrering nav a.valgt-ol{
                    font-weight: 700;
                    color: var(--beer);
                }

                .olTitel{
                    font-family: var(--displayOne);
                    margin: 0;
                    letter-spacing:0;
                    font-size: 3rem;
                }

                .olType::after {
                content: "→";
                margin-left: 1rem;
                margin-top: 2px;
                display: inline-table;
                }

                .xoo-wsc-basket {
                    bottom: 100px;
                }

                @media (min-width: 768px) {
                   .alle-ol{
                        grid-template-columns: 1fr 4fr;
                        grid-column-gap: 2rem;
                    }

                    #ol-grid{
                        grid-template-columns: 1fr 1fr 1fr;
                    }

                    #filtrering nav{
                        right: auto;
                        left: auto;
                        bottom: auto;
                        position: sticky;
                        display: grid;
                        top: 2rem;
                        background-color: transparent;
                        padding: 0;
                        color: var(--brand-graa);
                    }

                    #filtrering nav a{
                        display: block;
                        color: var(--brand-graa);
                        margin: 0.2rem 0;
                    }
                }
                

            </style>

            <section class="wp-block-group">
                <div class="wp-block-group__inner-container">
                    <h2>Bliv klogere på hver enkel øl</h2>
                    <p>Klik dig ind på vores forskellige øl og læs mere om hvad de hver især indeholder. <br> Får du lyst til at smage, kan du altid tilmelde dig Barley Fields <a href="/vare/ol-abonnement">øl abonnement</a> eller finde dem hos vores <a href="/forhandlere">forhandlere</a>.</p>
                    <div class="inside-article alle-ol">
                        <aside id="filtrering">
                            <nav>
                                <h2>Sortering</h2>
                                <a data-kategori="alle" class="valgt-ol">Alle øl</a>
                                <a data-kategori="ale">Ale</a>
                                <a data-kategori="cider">Cider</a>
                                <a data-kategori="hvedeol">Hvedeøl</a>
                                <a data-kategori="ipa">IPA</a>
                                <a data-kategori="pilsner">Pilsner</a>
                                <a data-kategori="porter">Porter</a>
                            </nav>
                        </aside>
                        <div id="ol-grid"></div>
                    </div>
			    </div>
            </section>
			
			<template>
				<article class="ol-grid-col fade-op">
                    <div class="inner-ol-grid-col">
                        <img loading="lazy" class="olImg" src="" alt="">
                        <h3 class="olTitel"></h3>
                        <span class="olType theme-color h5"></span>
                    </div>
				</article>
			</template>

	<script>
    let oller;
    let filterOl = "alle";
    const filterKnapper = document.querySelectorAll("#filtrering nav a");

    document.addEventListener("DOMContentLoaded", loadJSON)

    async function loadJSON() {
        const olJSONData = await fetch("https://barleyfield.victorhegelund.dk/wp-json/wp/v2/ol?per_page=100");
        oller = await olJSONData.json();
        console.log(oller);
        visOller();
        opretKnapper();
    }

    function opretKnapper(){
        filterKnapper.forEach(knap => knap.addEventListener("click", filterOller));
    }

    function filterOller() {
            filterOl = this.dataset.kategori;
            console.log("filterOl" + filterOl);
            document.querySelector(".valgt-ol").classList.remove("valgt-ol")
            this.classList.add("valgt-ol");
            
            // Scroll til top
            document.querySelector("#main").scrollIntoView();
            
            visOller();
        }

    //funktion der viser øl i liste view
    function visOller() {
        console.log("visOller");
        console.log("filterOl: " + filterOl);

        const dest = document.querySelector("#ol-grid"); // container til articles
        const template = document.querySelector("template").content; // select indhold af html skabelon (article)
        dest.textContent = "";
        oller.forEach(ol => {
            if (filterOl == "alle" || ol.ol_type.map(olTy => olTy.slug) == filterOl){
            const klon = template.cloneNode(true);
            klon.querySelector(".olTitel").textContent = ol.title.rendered;
            klon.querySelector(".olImg").src = ol.thumbnail.guid;
            klon.querySelector(".olType").textContent = ol.ol_type.map(olT => olT.name);
            klon.querySelector(".ol-grid-col").addEventListener("click", () => visDetaljer(ol))
            dest.appendChild(klon);
            }
        })
        animations()
    }

    function visDetaljer(ol) {
        location.href = ol.link;
    }

    </script>
<!------------------------- IKKE VORES KODE ------------------------->

			<?php
			/**
			 * generate_before_main_content hook.
			 *
			 * @since 0.1
			 */
			do_action( 'generate_before_main_content' );

			if ( generate_has_default_loop() ) {
				while ( have_posts() ) :

					the_post();

					generate_do_template_part( 'page' );

				endwhile;
			}

			/**
			 * generate_after_main_content hook.
			 *
			 * @since 0.1
			 */
			do_action( 'generate_after_main_content' );
			?>

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
