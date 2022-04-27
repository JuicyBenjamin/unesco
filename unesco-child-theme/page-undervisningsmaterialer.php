<head>
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/unesco.css">
</head>

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
	<div class="knapContainer"></div>
		<section id="materiale-container">
		<p class="loading">Henter indhold</p>
		</section>
	<script>

		document.addEventListener("DOMContentLoaded", loadJSON);

		const url = "https://vinterfjell.dk/kea/09_cms/unesco/wp-json/wp/v2/posts?categories=36&_embed";
		const catUrl = "https://vinterfjell.dk/kea/09_cms/unesco/wp-json/wp/v2/categories";
		let skoletrin;
		let knapKategori;
		let filter = "alle";
		let skoletrinSomKanFiltreres = [];
		const urlParams = new URLSearchParams(window.location.search);
		const id = urlParams.get("id");
		if (id != null) {
			filter = id;
		}

		async function loadJSON() {
			const JSONData = await fetch(url);
			const catData = await fetch(catUrl);
			skoletrin = await JSONData.json();
			knapKategori = await catData.json();

			// Tilføjer kategorierne til array'en skoletrinSomKanFiltreres. Udelukker kategorien "Undervisningsmaterialer" som har id af 36.
			skoletrin.forEach((post) => {
				post.categories.forEach((category) => {
					if (!skoletrinSomKanFiltreres.includes(category) && category != 36){
						skoletrinSomKanFiltreres.push(category)
						}
				})
			});
			console.log(skoletrin);
			tilfojKnapper();
			visSkoletrin();
		}

		function tilfojKnapper() {
			let knapContainer = document.querySelector(".knapContainer");
			knapContainer.innerHTML += '<button class="valgt filter" data-kategori="36">Alle</button>'
			skoletrinSomKanFiltreres.forEach((knap) => {
				knapKategori.forEach((kategori) => {
					if(knap == kategori.id) {
						knapContainer.innerHTML += `<button class="filter" data-kategori="${kategori.id}">${kategori.name}</button>`;
					}
				})
				const btnEvent = () => {
					document.querySelectorAll(".knapContainer button").forEach(btn => {
						btn.addEventListener("click", filtrerSkoletrin)
				})}
				btnEvent()
			})
			return
		}

		function filtrerSkoletrin() {
			filter = this.dataset.kategori;
			document.querySelector(".valgt").classList.remove("valgt");
			this.classList.add("valgt");
			visSkoletrin();
		}

		function visSkoletrin() {
			const main = document.querySelector("#materiale-container");
			const template = document.querySelector("template").content;
			main.textContent = "";
			skoletrin.forEach((kategorier) => {
				if (kategorier.categories.includes(parseInt(filter)) || filter == "alle") {
					console.log(kategorier.categories)
					const klon = template.cloneNode(true);
					klon.querySelector("h2").textContent = kategorier.title.rendered;
					klon.querySelector(".beskrivelse").innerHTML = kategorier.excerpt.rendered;
					klon.querySelector(".billede").src = kategorier._embedded['wp:featuredmedia'][0].link;
					klon.querySelector("article").addEventListener("click", () => visArtikel(kategorier));
					main.appendChild(klon);
				};
			})
			return
		};

		const visArtikel = (artikel) => {
			console.log(artikel);
			location.href = artikel.link;
		};

	</script>
</section>

<?php
get_footer();