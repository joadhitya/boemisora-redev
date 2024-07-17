// Page Preloader
jQuery(document).ready(function($) {
	function preloader() {
		var preloader = document.getElementById("preloader");
		preloader.style.opacity = "0";
		preloader.setAttribute("aria-busy", "false");
		document.getElementById("page").style.opacity = "1";
	}
	window.onload = preloader;
})
