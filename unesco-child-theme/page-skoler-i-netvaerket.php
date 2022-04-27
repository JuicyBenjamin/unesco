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
<section id="primary" class="content-area">
	<div class="knapContainer"></div>
		<section id="materiale-container">
		<p class="loading">Henter indhold</p>
		</section>

    <script>
      document.addEventListener("DOMContentLoaded", loadJSON);

      const url = "https://unesco-asp.dk/wp-json/wp/v2/pages?slug=skoler-i-netvaerket/"

      async function loadJSON() {
			  const JSONData = await fetch(url);
        skole = await JSONData.json();
        console.log(skole[0])
        document.querySelector("#materiale-container").innerHTML = skole[0].content.rendered
      }
    </script>
</section>
<?php
get_footer();