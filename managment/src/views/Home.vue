<template>
	<div>
	  <!-- Site Description -->
	  <div class="header-cta">
		<div class="container">
		  <div class="row">
			<div class="entry-content">
			  <p><span class="start-text"><b>From THE MARCH 7, 2014</b></span></p>
			  <h4 class="entry-title"><a href="#">Organizing World class events</a></h4>
			  <h5><span><b>Schrodinger confirms that Germany international ...</b></span></h5>
			</div>
		  </div>
		</div>
	  </div>
  
	  <!-- Main Slider -->
	  <div class="header-bg">
		<div id="preloader">
		  <div class="preloader"></div>
		</div>
		<div class="main-slider" id="main-slider">
		  <ul class="slides">
			<li><img src="/assets/frontend/images/demo/bg-slide-01.jpg" alt="Slide 1" /></li>
			<li><img src="/assets/frontend/images/demo/bg-slide-02.jpg" alt="Slide 2" /></li>
		  </ul>
		</div>
	  </div>
	</div>


	<footer></footer>
  </template>
  
  <script setup>
  import { onMounted, nextTick, watch } from 'vue'
  import { useRoute } from 'vue-router'
  import imagesLoaded from 'imagesloaded'
  import { loadScript, loadStyle } from '@/utils/loadExternal'
  
  const route = useRoute()
  
  const initSlider = async () => {
	await nextTick()
  
	const slider = document.querySelector('.main-slider')
	if (!slider) {
	  console.warn('Slider element not found')
	  return
	}
  
	imagesLoaded(slider, () => {
	  if (typeof $ === 'undefined' || typeof $.fn.flexslider === 'undefined') {
		console.warn('jQuery or Flexslider not loaded')
		return
	  }
  
	  $('.main-slider').flexslider({
		noCSS: true,
		touch: false,
		controlNav: false,
		directionNav: false,
		animation: 'fade',
		start: function () {
		  $('#preloader').addClass('ready')
		}
	  })
  
	  const container = $('.header-bg')
	  function centerImage() {
		const imageWidth = container.find('img').width()
		const widthFix = imageWidth / 2
		container.find('img').css('margin-left', -widthFix)
	  }
  
	  $(window).on('load resize', centerImage)
	})
  }
  
  onMounted(async () => {
	// Load CSS
	await loadStyle('/assets/frontend/css/bootstrap.css')
	await loadStyle('/assets/frontend/css/flexslider.css')
	await loadStyle('/assets/frontend/css/style.css')
  
	// Load JS
	await loadScript('/assets/frontend/js/jquery-2.1.0.min.js')
	window.$ = window.jQuery = window.jQuery || $
  
	await loadScript('/assets/frontend/js/jquery.flexslider.js')
	await loadScript('/assets/frontend/js/main.js')
  
	// Initialize slider
	setTimeout(() => {
	  initSlider()
	}, 300) // slight delay
  })
  
  watch(route, async () => {
	await nextTick()
	initSlider()
  })
  </script>
  