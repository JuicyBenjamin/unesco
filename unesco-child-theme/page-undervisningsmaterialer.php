<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();
?>
<template>
	<article>
  	<img class="billede" src="" alt="" />
  	<h2></h2>
  	<p class="beskrivelse"></p>
	</article>
</template>
<section id="primary" class="content-area">
	<main id="main" class="site-main">
		<section id="materiale-container">
		<p>Min egen tekst på tema</p>
		</section>
	</main>
	<script>
		const url = "https://vinterfjell.dk/kea/09_cms/unesco/wp-json/wp/v2/posts?categories=36&_embed";

		document.addEventListener("DOMContentLoaded", start);
		let skoletrin;
		let filter = "alle";

		function start() {
			const filterKnapper = document.querySelectorAll("div button");
			filterKnapper.forEach((knap) => knap.addEventListener("click", filtrerskoletrin));
			loadJSON();
		}

		function filtrerskoletrin() {
			filter = this.dataset.kategori;
			document.querySelector(".valgt").classList.remove("valgt");
			this.classList.add("valgt");
			visskoletrin();
		}

		async function loadJSON() {
			const JSONData = await fetch(url);
			skoletrin = await JSONData.json();
			console.log(skoletrin);
			visskoletrin();
		}

		function visskoletrin() {
			const main = document.querySelector("main");
			const template = document.querySelector("template").content;
			main.textContent = "";
			skoletrin.forEach((kategorier) => {
				//if (filter == kategorier.kategori || filter == "alle") {
				console.log("Vi hopper ind i loopet for hver af posts")
				const klon = template.cloneNode(true);
				klon.querySelector("h2").textContent = kategorier.title.rendered;
				klon.querySelector(".beskrivelse").innerHTML = kategorier.excerpt.rendered;
				klon.querySelector(".billede").src = kategorier._embedded['wp:featuredmedia'][0].link;
				klon.querySelector(".billede").alt = kategorier.alttag;
				// 	klon
				// 		.querySelector("article")
				// 		.addEventListener("click", () => visOpskrift(kategorier));
				 	main.appendChild(klon);
				// }
			//};
		})};

		// const visOpskrift = (opskrift) => {
		// 	console.log(`Dette er den opskrift der blev klikket på ${opskrift.id}`);
		// 	location.href = `opskrift.html?id=${opskrift._id}`;
		// };

	</script>
</section>

<style>
	#main {
		display: grid;
		grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
	}
</style>
<?php
get_footer();