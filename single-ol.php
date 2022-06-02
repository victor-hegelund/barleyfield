<?php
/**
 * The Template for displaying all single posts.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

	<div <?php generate_do_attr( 'content' ); ?>>
		<main <?php generate_do_attr( 'main' ); ?>>
			<!-- <?php
			/**
			 * generate_before_main_content hook.
			 *
			 * @since 0.1
			 */
			do_action( 'generate_before_main_content' );

			if ( generate_has_default_loop() ) {
				while ( have_posts() ) :

					the_post();

					generate_do_template_part( 'single' );

				endwhile;
			}

			/**
			 * generate_after_main_content hook.
			 *
			 * @since 0.1
			 */
			do_action( 'generate_after_main_content' );
			?> -->

<!------------------------- VORES KODE ------------------------->

			<style>
				.dmodel {
					height: 60vh;
				}

					:not(:defined) > * {
					display: none;
				}

				model-viewer {
					width: 100%;
					height: 100%;
					background-color: var(--hvid);
				}

				.progress-bar {
					display: block;
					width: 33%;
					height: 10%;
					max-height: 2%;
					position: absolute;
					left: 50%;
					top: 50%;
					transform: translate3d(-50%, -50%, 0);
					border-radius: 25px;
					box-shadow: 0px 3px 10px 3px rgba(0, 0, 0, 0.5),
						0px 0px 5px 1px rgba(0, 0, 0, 0.6);
					border: 1px solid rgba(255, 255, 255, 0.9);
					background-color: rgba(0, 0, 0, 0.5);
				}

				.progress-bar.hide {
					visibility: hidden;
					transition: visibility 0.3s;
				}

				.update-bar {
					background-color: rgba(255, 255, 255, 0.9);
					width: 0%;
					height: 100%;
					border-radius: 25px;
					float: left;
					transition: width 0.3s;
				}

				#ar-button {
					background-image: url(https://barleyfield.victorhegelund.dk/wp-content/uploads/ar_icon.png);
					background-repeat: no-repeat;
					background-size: 20px 20px;
					background-position: 12px 50%;
					background-color: #fff;
					position: absolute;
					left: 50%;
					transform: translateX(-50%);
					white-space: nowrap;
					bottom: 16px;
					padding: 0px 16px 0px 40px;
					font-family: Roboto Regular, Helvetica Neue, sans-serif;
					font-size: 14px;
					color: #4285f4;
					height: 36px;
					line-height: 36px;
					border-radius: 18px;
					border: 1px solid #dadce0;
				}

				#ar-button:active {
					background-color: #e8eaed;
				}

				#ar-button:focus {
					outline: none;
				}

				#ar-button:focus-visible {
					outline: 1px solid #4285f4;
				}

				@keyframes circle {
					from {
						transform: translateX(-50%) rotate(0deg) translateX(50px) rotate(0deg);
					}
					to {
						transform: translateX(-50%) rotate(360deg) translateX(50px) rotate(-360deg);
					}
				}

				@keyframes elongate {
					from {
						transform: translateX(100px);
					}
					to {
						transform: translateX(-100px);
					}
				}

				model-viewer > #ar-prompt {
					position: absolute;
					left: 50%;
					bottom: 60px;
					animation: elongate 2s infinite ease-in-out alternate;
					display: none;
				}

				model-viewer[ar-status="session-started"] > #ar-prompt {
					display: block;
				}

				model-viewer > #ar-prompt > img {
					animation: circle 4s linear infinite;
				}

				.one-container .container{
					background-color: transparent;
				}

				.baggrund{
					background-color: var(--lysegraa);
					position: fixed;
					top: 0;
					left: 0;
					height: 100vh;
					width: 100vw;
					z-index: -1;
				}

				h1, .h3{
					margin-bottom: 0;
					line-height: normal;
				}

				.h3{
					color: var(--beer);
					margin-bottom: 0.4rem;
				}

				.olType{
					color: var(--brand-graa)
				}

				.olNo{
					margin-top: 3rem;
				}

				.olEgenskaber{
					display: grid;
					grid-template-columns: 1fr 1fr;
					grid-column-gap: 4rem;
					grid-row-gap: 1rem;
					margin-top: 4rem;
				}

				.pil-link{
					position: sticky;
					top: 2rem;
					z-index: 3;
					margin-top: 2rem;
				}

				@media (min-width: 768px) {
					.dmodel {
						height: 100vh;
					}
					.inside-article{
						display: grid;
						grid-template-columns: 50% 50%;
					}

					.dmodel{
						position: sticky;
						top: 0px;
					}

					.one-container .site-content {
						padding-top: 0;
					}

					#ollen{
						padding: 2rem 4rem;
					}

					.baggrund{
						display: grid;
						grid-template-columns: 50% 50%;
						background-color: transparent;
					}

					.col-baggrund-moerkegraa{
						background-color: var(--lysegraa);
					}
				}


			</style>

			<!-- OPTIONAL: The :focus-visible polyfill removes the focus ring for some input types -->
    <script src="https://unpkg.com/focus-visible@5.0.2/dist/focus-visible.js" defer></script>

			<div class="baggrund">
				<div class="col-baggrund"></div>
				<div class="col-baggrund col-baggrund-moerkegraa"></div>
			</div>
			<p class="pil-link pil-link-tilbage"><a href="/vores-ol#main">Tilbage</a></p>
			<div class="inside-article">
				<div class="dmodel">
					<model-viewer bounds="tight" enable-pan ar ar-modes="webxr scene-viewer quick-look" camera-controls poster="https://barleyfield.victorhegelund.dk/wp-content/uploads/poster-ol.png" shadow-intensity="1" min-camera-orbit="auto 45deg auto" max-camera-orbit="auto 135deg auto" auto-rotate rotation-per-second="-200%">
						<div class="progress-bar hide" slot="progress-bar">
							<div class="update-bar"></div>
						</div>
						<button slot="ar-button" id="ar-button">
							Se i virkeligheden
						</button>
						<div id="ar-prompt">
							<img src="https://barleyfield.victorhegelund.dk/wp-content/uploads/ar_hand_prompt.png" alt="hånd">
						</div>
					</model-viewer>
				</div>
				<section id="ollen">
					<p class="olNo h3"></p>
					<h1></h1>
					<p class="olType h3" href=""></p>
					<div class="olEgenskaber">
						<div>
							<figure class="svg-icon-lille">
								<img src="https://barleyfield.victorhegelund.dk/wp-content/uploads/beer-humle-1.svg" alt="Special øl humle">
							</figure>
							<h2 class="h3">Humle</h2>
							<p class="olHumle"></p>
						</div>
						<div>
							<figure class="svg-icon-lille">
								<img src="https://barleyfield.victorhegelund.dk/wp-content/uploads/beer-apparat.svg" alt="Ølbrygning icon">
							</figure>
							<h2 class="h3">Ingredienser</h2>
							<p class="olIngredienser"></p>
						</div>
						<div>
							<figure class="svg-icon-lille">
								<img src="https://barleyfield.victorhegelund.dk/wp-content/uploads/beer-malt.svg" alt="Malt icon">
							</figure>
							<h2 class="h3">Malt</h2>
							<p class="olMalt"></p>
						</div>
						<div>
							<figure class="svg-icon-lille">
								<img src="https://barleyfield.victorhegelund.dk/wp-content/uploads/beer-cl.svg" alt="Målebære icon">
							</figure>
							<h2 class="h3">Indhold</h2>
							<p class="olCl"></p>
						</div>
						<div>
							<figure class="svg-icon-lille">
								<img src="https://barleyfield.victorhegelund.dk/wp-content/uploads/beer-ol-flaske.svg" alt="flaske icon">
							</figure>
							<h2 class="h3">Tappet</h2>
							<p class="olTappet"></p>
						</div>
						<div>
							<figure class="svg-icon-lille">
								<img src="https://barleyfield.victorhegelund.dk/wp-content/uploads/beer-draabe.svg" alt="Håndbrygget øl dråbe">
							</figure>
							<h2 class="h3">Procent</h2>
							<p class="olVol"></p>
						</div>
					</div>
					<h2 class="h3">Beskrivelse</h2>
					<p class="olBeskrivelse"></p>
				</section>
			</div>

			<script>
				// Handles loading the events for <model-viewer>'s slotted progress bar
				const onProgress = (event) => {
				const progressBar = event.target.querySelector('.progress-bar');
				const updatingBar = event.target.querySelector('.update-bar');
				updatingBar.style.width = `${event.detail.totalProgress * 100}%`;
				if (event.detail.totalProgress === 1) {
					progressBar.classList.add('hide');
				} else {
					progressBar.classList.remove('hide');
				}
				};
				document.querySelector('model-viewer').addEventListener('progress', onProgress);
			</script>
    		<!-- Loads <model-viewer> for browsers: -->
    		<script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>

			<script>
		let ol;
		let olType;
		let olTyper;
		let olHumle;
		let olHumler;
		let olMalt;
		let olMalter;
		let olIngrediens;
		let olIngredienser;
        let aktuelOl = "<?php echo get_the_ID() ?>";
        document.addEventListener("DOMContentLoaded", loadJSON)

        async function loadJSON() {
			console.log("loadJSON")
            const olJSONData = await fetch("https://barleyfield.victorhegelund.dk/wp-json/wp/v2/ol/" + aktuelOl);
            ol = await olJSONData.json();
            console.log("Øl:", ol);
            
            visOl();
        }

        function visOl() {
			document.querySelector("model-viewer").poster = ol.produktbillede.guid;
            document.querySelector("h1").textContent = ol.title.rendered;
            document.querySelector("model-viewer").src = ol.tred_fil;
            document.querySelector(".olBeskrivelse").innerHTML = ol.beskrivelse.replace(/\r|\t/g, "<br>");
			document.querySelector(".olNo").textContent = "#" + ol.no;
			document.querySelector(".olCl").textContent = ol.cl + " cl";
			document.querySelector(".olTappet").textContent = ol.tappet;
			document.querySelector(".olVol").textContent = ol.vol.replace(".",",") + "%";
			document.querySelector(".olType").textContent = ol.ol_type.map(olT => olT.name);
			document.querySelector(".olHumle").textContent = ol.humle.map(olH => olH.name).join(" | ");
			document.querySelector(".olMalt").textContent = ol.malt.map(olM => olM.name).join(" | ");
			document.querySelector(".olIngredienser").textContent = ol.ingredienser.map(olI => olI.name).join(" | ");
        }    
			</script>




<!------------------------- IKKE VORES KODE ------------------------->
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
